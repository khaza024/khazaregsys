<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'image',
        'title',
        'slug',
        'body'
    ];

    public function scopeSearch($query, string $search = '')
    {
        $query->where('title', 'like', "%{$search}%");
    }

    public function getExcerpt()
    {
        return Str::limit(strip_tags($this->body), 150);
    }

    public function getThumbnailUrl()
    {
        $isUrl = str_contains($this->image, 'http');

        return ($isUrl) ? $this->image : Storage::disk('public')->url($this->image);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($program) {
            if ($program->image) {
                Storage::delete($program->image);
            }
        });

        static::updating(function ($program) {
            if ($program->isDirty('image')) {
                $oldImage = $program->getOriginal('image');
                if ($oldImage) {
                    Storage::delete($oldImage);
                }
            }
        });
    }
}
