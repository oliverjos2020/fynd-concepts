<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentPlans extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'duration', 'amount', 'payment_type'];
}
