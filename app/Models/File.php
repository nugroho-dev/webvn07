<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];
    protected $with = ['folder', 'categoriesfile'];
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        });
        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('categoriesfile', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });
        $query->when(
            $filters['folder'] ?? false,
            fn ($query, $folder) =>
            $query->whereHas(
                'folder',
                fn ($query) =>
                $query->where('slug', $folder)


            )
        );
    }
    public function folder()
    {
        return $this->belongsTo(Folder::class, 'id_folder');
    }
    public function categoriesfile()
    {
        return $this->belongsTo(Categoriesfile::class, 'id_categoriesfile');
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
