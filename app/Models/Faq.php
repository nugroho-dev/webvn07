<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];
    protected $with = ['categoriesfaq'];
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('question', 'like', '%' . $search . '%')
                ->orWhere('answer', 'like', '%' . $search . '%');
        });
        $query->when($filters['view'] ?? false, function ($query, $categoriesfaq) {
            return $query->whereHas('categoriesfaq', function ($query) use ($categoriesfaq) {
                $query->where('slug', $categoriesfaq);
            });
        });
    }
    
    public function categoriesfaq()
    {
        return $this->belongsTo(Categoriesfaq::class, 'categoryfaq_id');
    }
    
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'question'
            ]
        ];
    }
}
