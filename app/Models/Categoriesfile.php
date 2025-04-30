<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoriesfile extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];
    protected $with = ['folder'];
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['folder'] ?? false, function ($query, $folder) {
            return $query->whereHas('folder', function ($query) use ($folder) {
                $query->where('slug', $folder);
            });
        });
    }
    public function folder()
    {
        return $this->belongsTo(Folder::class, 'id_folder');
    }
    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
