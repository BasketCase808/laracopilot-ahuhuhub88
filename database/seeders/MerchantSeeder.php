<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Merchant;

class MerchantSeeder extends Seeder
{
    public function run()
    {
        Merchant::factory()->count(20)->create();
    }
}