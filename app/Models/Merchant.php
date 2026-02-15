<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Merchant extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'merchant_id',
        'business_name',
        'business_email',
        'business_phone',
        'business_url',
        'contact_name',
        'contact_email',
        'address_line1',
        'address_line2',
        'city',
        'state',
        'postal_code',
        'country',
        'business_type',
        'industry',
        'status'
    ];
    
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
    
    public function stripeAccount()
    {
        return $this->hasOne(StripeAccount::class);
    }
    
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}