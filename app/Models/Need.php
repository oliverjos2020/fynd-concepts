<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Need extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'need'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
