<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'slug',
        'icon_url'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
