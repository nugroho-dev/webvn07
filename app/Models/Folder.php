<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];
    public function categoriesfiles()
    {
        return $this->hasMany(Categoriesfile::class);
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
