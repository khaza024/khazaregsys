<?php

namespace App\Filament\Pages;

use Log;
use App\Models\Cpd;
use App\Models\DocCpd;
use App\Models\Regency;
use App\Models\Village;
use Twilio\Rest\Client;
use App\Models\District;
use App\Models\Province;
use Filament\Forms\Form;
use Filament\Pages\Page;
use App\Models\SchoolYear;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Illuminate\Support\Facades\Blade;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Concerns\InteractsWithForms;

class RegistrationForm extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationGroup = null;

    protected static ?int $navigationSort = null;

    protected static string $view = 'filament.pages.registration-form';

    protected static string $layout = 'filament::components.layout.base';

    protected ?string $heading = '';

    protected static ?string $title = 'Form Pendaftaran Peserta Didik Baru';

    public static function shouldRegisterNavigation(): bool
    {
        // Hide from navigation
        return false;
    }

    // CPD Fields
    public $name, $gender, $place_of_birth, $date_of_birth, $tk, $abk = false, $note_abk = 'Tidak ABK';
    public $province_id, $regency_id, $district_id, $village_id, $address;
    public $father, $mother, $telp, $email;

    // Document CPD Fields
    public $card_identity_father, $card_identity_mother, $card_family, $card_born;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make()
                    ->schema([
                        Step::make('Biodata Anak')
                            ->schema([
                                Group::make()
                                    ->schema([
                                        Group::make()->schema([
                                            TextInput::make('name')
                                                ->label('Nama Lengkap')
                                                ->required()
                                                ->maxLength(255),
                                            Select::make('gender')
                                                ->label('Jenis Kelamin')
                                                ->options([
                                                    'Laki-laki' => 'Laki-laki',
                                                    'Perempuan' => 'Perempuan',
                                                ])
                                                ->required(),
                                            TextInput::make('place_of_birth')
                                                ->label('Tempat Lahir')
                                                ->required(),
                                            DatePicker::make('date_of_birth')
                                                ->label('Tanggal Lahir')
                                                ->required()
                                                ->native(false)
                                                ->displayFormat('d/m/Y'),
                                        ])->columns(2),
                                        Radio::make('abk')
                                            ->label('Apakah Anak Berkebutuhan Khusus?')
                                            ->boolean()
                                            ->inline(),
                                        Group::make()->schema([
                                            TextInput::make('tk')
                                                ->label('Asal TK')
                                                ->required(),
                                            TextInput::make('note_abk')
                                                ->label('Keterangan / Jenis ABK'),
                                        ])->columns(2),
                                    ]),
                            ]),
                        Step::make('Tempat Tinggal')
                            ->schema([
                                Group::make()
                                    ->schema([
                                        Group::make()->schema([
                                            Select::make('province_id')
                                                ->label('Provinsi')
                                                ->options(Province::all()->pluck('name', 'id'))
                                                ->reactive()
                                                ->required()
                                                ->afterStateUpdated(fn (callable $set) => $set('regency_id', null)),
                                            Select::make('regency_id')
                                                ->label('Kabupaten / Kota')
                                                ->options(function (callable $get) {
                                                    $provinceId = $get('province_id');
                                                    if ($provinceId) {
                                                        return Regency::where('province_id', $provinceId)->pluck('name', 'id');
                                                    }
                                                    return [];
                                                })
                                                ->reactive()
                                                ->required()
                                                ->afterStateUpdated(fn (callable $set) => $set('district_id', null)),
                                            Select::make('district_id')
                                                ->label('Kecamatan')
                                                ->options(function (callable $get) {
                                                    $regencyId = $get('regency_id');
                                                    if ($regencyId) {
                                                        return District::where('regency_id', $regencyId)->pluck('name', 'id');
                                                    }
                                                    return [];
                                                })
                                                ->reactive()
                                                ->required()
                                                ->afterStateUpdated(fn (callable $set) => $set('village_id', null)),
                                            Select::make('village_id')
                                                ->label('Desa / Kelurahan')
                                                ->options(function (callable $get) {
                                                    $districtId = $get('district_id');
                                                    if ($districtId) {
                                                        return Village::where('district_id', $districtId)->pluck('name', 'id');
                                                    }
                                                    return [];
                                                })
                                                ->reactive()
                                                ->required(),
                                        ])->columns(2),
                                        Textarea::make('address')
                                            ->label('Alamat')
                                            ->required()
                                            ->maxLength(255),
                                    ]),
                            ]),
                        Step::make('Orang Tua')
                            ->schema([
                                Group::make()
                                    ->schema([
                                        TextInput::make('father')
                                            ->label('Nama Ayah')
                                            ->required()
                                            ->maxLength(255),
                                        TextInput::make('mother')
                                            ->label('Nama Ibu')
                                            ->required()
                                            ->maxLength(255),
                                        TextInput::make('telp')
                                            ->label('No Hp')
                                            ->required()
                                            ->tel()
                                            ->maxLength(15)
                                            ->minLength(10)
                                            ->rule('regex:/^[0-9\-]+$/'),
                                        TextInput::make('email')
                                            ->label('Email')
                                            ->email()
                                            ->required()
                                            ->maxLength(255),
                                    ])
                                    ->columns(2),
                            ]),
                        Step::make('Berkas')
                            ->schema([
                                TextInput::make('card_identity_father')
                                    ->label('Kartu Identitas Ayah')
                                    ->type('file')
                                    ->required(),
                                TextInput::make('card_identity_mother')
                                    ->label('Kartu Identitas Ibu')
                                    ->type('file')
                                    ->required(),
                                TextInput::make('card_family')
                                    ->label('Kartu Keluarga')
                                    ->type('file')
                                    ->required(),
                                TextInput::make('card_born')
                                    ->label('Akte Kelahiran')
                                    ->type('file')
                                    ->required(),
                            ]),
                    ])
                    ->previousAction(
                        fn (Action $action) => $action->label('Sebelumnya')
                    )
                    ->nextAction(
                        fn (Action $action) => $action->label('Selanjutnya')
                    )
                    ->submitAction(new HtmlString(Blade::render(<<<BLADE
                    <x-filament::button
                        type="submit"
                        size="sm"
                    >
                        Submit
                    </x-filament::button>
                BLADE))),
            ]);
    }

    public function submit()
    {

        $data = $this->form->getState();

        $nameCpd = strtolower(str_replace(' ', '-', $data['name']));
        $fileNameCif = 'card_identity_father_' . $nameCpd . '_' . strtolower(str_replace(' ', '-', $data['card_identity_father']->getClientOriginalName()));
        $fileNameCim = 'card_identity_mother_' . $nameCpd . '_' . strtolower(str_replace(' ', '-', $data['card_identity_mother']->getClientOriginalName()));
        $fileNameCf = 'card_family_' . $nameCpd . '_' . strtolower(str_replace(' ', '-', $data['card_family']->getClientOriginalName()));
        $fileNameCb = 'card_born_' . $nameCpd . '_' . strtolower(str_replace(' ', '-', $data['card_born']->getClientOriginalName()));
        $directory = 'public/doc-cpds/students_' . $nameCpd;

        // Document Card Identity Father
        $pathCif = 'doc-cpds/students_' . $nameCpd . '/' . $fileNameCif;
        $data['card_identity_father'] ? $data['card_identity_father']->storeAs($directory, $fileNameCif) : null;

        // Document Card Identity Mother
        $pathCim = 'doc-cpds/students_' . $nameCpd . '/' . $fileNameCim;
        $data['card_identity_mother'] ? $data['card_identity_mother']->storeAs($directory, $fileNameCim) : null;

        // Document Card Family
        $pathCf = 'doc-cpds/students_' . $nameCpd . '/' . $fileNameCf;
        $data['card_family'] ? $data['card_family']->storeAs($directory, $fileNameCf) : null;

        // Document Card Born
        $pathCb = 'doc-cpds/students_' . $nameCpd . '/' . $fileNameCb;
        $data['card_born'] ? $data['card_born']->storeAs($directory, $fileNameCb) : null;

        // dd([
        //     $data,
        //     $directory,
        //     $fileNameCb,
        //     $fileNameCf,
        //     $fileNameCim,
        //     $fileNameCif,
        //     $pathCb,
        //     $pathCf,
        //     $pathCim,
        //     $pathCif,
        // ]);

        $year = SchoolYear::where('active', true)->first()->name;

        $cpd = Cpd::create([
            'province_id' => $data['province_id'],
            'regency_id' => $data['regency_id'],
            'district_id' => $data['district_id'],
            'village_id' => $data['village_id'],
            'name' => $data['name'],
            'gender' => $data['gender'],
            'place_of_birth' => $data['place_of_birth'],
            'date_of_birth' => $data['date_of_birth'],
            'tk' => $data['tk'],
            'abk' => $data['abk'],
            'note_abk' => $data['note_abk'],
            'year' => $year,
            'father' => $data['father'],
            'mother' => $data['mother'],
            'email' => $data['email'],
            'telp' => $data['telp'],
            'address' => $data['address'],
        ]);

        DocCpd::create([
            'cpd_id' => $cpd->id,
            'card_identity_father' => $pathCif,
            'card_identity_mother' => $pathCim,
            'card_family' => $pathCf,
            'card_born' => $pathCb,
        ]);

        $this->sendWhatsAppToPanitia($data);

        session()->flash('message', 'Pendaftaran berhasil!');
        return redirect()->route('pendaftaran.sukses');
    }

    protected function sendWhatsAppToPanitia($data)
    {
        $accountSid = '';
        $authToken = '';
        $twilioNumber = 'whatsapp:+14155238886';

        $panitiaNumber = 'whatsapp:+6282122013099';

        $client = new Client($accountSid, $authToken);
        
        $message = "Dear,\n";
        $message .= "Panitia PPDB Khaza.\n\n";
        $message .= "Telah diterima pendaftaran calon peserta didik baru:\n\n";
        $message .= "Nama: " . $data['name'] . "\n";
        $message .= "Asal TK: " . $data['tk'] . "\n";
        $message .= "No. HP Orang Tua: " . $data['telp'] . "\n\n";
        $message .= "Regards,\n\n";
        $message .= "Khazaregsys.";

        try {
            // Kirim pesan WhatsApp menggunakan Twilio
            $client->messages->create(
                $panitiaNumber,
                [
                    'from' => $twilioNumber,
                    'body' => $message,
                ]
            );
            // Log jika diperlukan
            // \Log::info("Pesan WhatsApp ke panitia terkirim: $message");
        } catch (\Exception $e) {
            // Tangani jika terjadi kesalahan saat pengiriman
            // \Log::error("Gagal mengirim pesan WhatsApp ke panitia: " . $e->getMessage());
        }
    }
}
