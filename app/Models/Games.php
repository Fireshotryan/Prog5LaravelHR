<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'game_id'); // Specify the correct foreign key name here
    }
    public function tags()
{
    return $this->belongsToMany(Tag::class, 'game_tag');
}

    
}
