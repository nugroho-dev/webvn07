<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Categoriesfaq extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];
    public function faq()
    {
        return $this->hasMany(Faq::class);
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
