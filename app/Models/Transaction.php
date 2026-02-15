<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'merchant_id',
        'transaction_id',
        'stripe_charge_id',
        'customer_email',
        'amount',
        'currency',
        'platform_fee',
        'merchant_payout',
        'status',
        'description',
        'metadata'
    ];
    
    protected $casts = [
        'amount' => 'decimal:2',
        'platform_fee' => 'decimal:2',
        'merchant_payout' => 'decimal:2',
        'metadata' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
    
    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}