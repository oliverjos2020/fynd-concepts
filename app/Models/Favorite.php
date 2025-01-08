<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'artisan_id'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    

    // public function photos(){
    //     return $this->hasMany(User::class, 'artisan_id');
    //     // return $this->hasMany(Photo::class);
    // }
}
