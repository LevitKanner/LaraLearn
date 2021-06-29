<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function likedby(User $user) {
        return $this->likes->contains('user_id', $user->id);
    }

    public function createdby(User $user) {
        return $this->user->id === $user->id;
    }
}
