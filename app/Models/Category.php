<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'user_id',
      
    ];  
    protected $guard = 'id';
    
    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function user()
    {
        return $this->belongsToMany(App\Models\User::class,'user_id');
    }


}
