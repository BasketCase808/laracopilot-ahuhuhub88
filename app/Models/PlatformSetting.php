<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlatformSetting extends Model
{
    protected $fillable = [
        'platform_name',
        'platform_fee_percentage',
        'stripe_mode',
        'auto_approve_merchants',
        'require_verification'
    ];
    
    protected $casts = [
        'platform_fee_percentage' => 'decimal:2',
        'auto_approve_merchants' => 'boolean',
        'require_verification' => 'boolean'
    ];
}