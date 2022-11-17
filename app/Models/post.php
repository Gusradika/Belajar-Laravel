<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'judul', 'slug', 'excerpt', 'body'];
    protected $guarded = ['id'];

    // relation Eloquent
    public function category()
    {
        return $this->belongsTo(category::class);
    }
}