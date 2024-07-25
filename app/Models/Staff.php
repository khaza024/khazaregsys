<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Staff extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'province_id',
        'regency_id',
        'district_id',
        'village_id',
        'nip',
        'name',
        'gender',
        'place_of_birth',
        'date_of_birth',
        'email',
        'telp',
        'address',
        'graduate',
        'position',
        'image',
    ];

    public function provinces()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function regencies()
    {
        return $this->belongsTo(Regency::class, 'regency_id');
    }

    public function districts()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function villages()
    {
        return $this->belongsTo(Village::class, 'village_id');
    }

    public function getThumbnailUrl()
    {
        $isUrl = str_contains($this->image, 'http');

        return ($isUrl) ? $this->image : Storage::disk('public')->url($this->image);
    }
}
