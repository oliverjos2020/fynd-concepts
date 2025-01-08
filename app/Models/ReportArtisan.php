<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportArtisan extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'artisan_id', 'message'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
