<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Clockwork\Storage\Search;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spsops extends Model
{

    use HasFactory, Sluggable;
    //protected $fillable = ['title', 'excerpt', 'body'];
    protected $guarded = ['id'];
    protected $with = ['categoriesps'];
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        });
        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('categoriesps', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });
    }

    public function categoriesps()
    {
        return $this->belongsTo(Categoriesps::class, 'categorysp_id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
