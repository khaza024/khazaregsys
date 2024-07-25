<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'text_color',
        'bg_color',
    ];
    
    public function activities()
    {
        return $this->belongsToMany(Activity::class);
    }

    public function information()
    {
        return $this->belongsToMany(Information::class);
    }
}
