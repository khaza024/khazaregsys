<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cpd extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'province_id',
        'regency_id',
        'district_id',
        'village_id',
        'name',
        'gender',
        'place_of_birth',
        'date_of_birth',
        'tk',
        'abk',
        'note_abk',
        'year',
        'father',
        'mother',
        'email',
        'telp',
        'address',
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

    public function docCpd()
    {
        return $this->hasOne(DocCpd::class, 'cpd_id');
    }
}
