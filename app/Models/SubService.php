<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubService extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_id',
        'subservice',
        'slug'
    ];
    // public function services(){
    //     return $this->belongsTo(Service::class);
    // }
    public function services()
{
    return $this->belongsTo(Service::class, 'service_id');
}
}
