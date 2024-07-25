<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocCpd extends Model
{
    use HasFactory;

    protected $fillable = [
        'cpd_id',
        'card_identity_father',
        'card_identity_mother',
        'card_family',
        'card_born',
    ];

    public function cpd()
    {
        return $this->belongsTo(Cpd::class, 'cpd_id');
    }
}
