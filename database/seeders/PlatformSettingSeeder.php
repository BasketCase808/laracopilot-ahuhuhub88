<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlatformSetting;

class PlatformSettingSeeder extends Seeder
{
    public function run()
    {
        PlatformSetting::create([
            'platform_name' => 'Stripe Connect Platform',
            'platform_fee_percentage' => 2.50,
            'stripe_mode' => 'test',
            'auto_approve_merchants' => false,
            'require_verification' => true
        ]);
    }
}