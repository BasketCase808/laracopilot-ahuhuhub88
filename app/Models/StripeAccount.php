<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StripeAccount extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'merchant_id',
        'stripe_account_id',
        'publishable_key',
        'secret_key',
        'account_type',
        'status',
        'capabilities',
        'charges_enabled',
        'payouts_enabled',
        'verification_status',
        'verified_at',
        'revoked_at'
    ];
    
    protected $casts = [
        'capabilities' => 'array',
        'verification_status' => 'array',
        'charges_enabled' => 'boolean',
        'payouts_enabled' => 'boolean',
        'verified_at' => 'datetime',
        'revoked_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
    
    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}