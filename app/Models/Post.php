<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'category_id',
        'user_id',
    ];  
    protected $guard = 'id';

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function user()
    {
        return $this->belongsTo(App\Models\User::class,'user_id'); 
    }
}
