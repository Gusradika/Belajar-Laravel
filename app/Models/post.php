<?php

namespace App\Models;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['category_id', 'judul', 'slug', 'excerpt', 'body', 'user_id'];
    protected $guarded = ['id'];
    protected $with = ['category', 'User'];

    // relation Eloquent
    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    // Filter Search
    public function scopeFilter($query, array $filters)
    {
        // Category apa. dan cari namanya
        // Method 1 : Cara Search Ternary Operation
        // if (isset($filters['search']) ? $filters['search'] : false) {
        //     $query->where('judul', 'like', '%' . $filters['search'] . '%')
        //         ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        // }

        // if (isset($filters['category']) ? $filters['category'] : false) {
        //     $category = $filters['category'];
        //     $query->whereHas('category', function ($query) use ($category) {
        //         $query->where('slug', $category);
        //     });
        // }

        // Cara 2 Menggunakan Method Laravel When
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('judul', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when($filters['User'] ?? false, function ($query, $author) {
            return $query->whereHas('User', function ($query) use ($author) {
                $query->where('username', $author);
            });
        });
    }

    // ini dari resource mengambil slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // ini dari composer require library -> sluggable
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
}