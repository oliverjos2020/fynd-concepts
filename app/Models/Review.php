<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'artisan_id', 'rating', 'review'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function artisan()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
