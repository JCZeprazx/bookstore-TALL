<?php

namespace Database\Seeders;

use App\Models\Shipping;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shipping::create([
            'shipping_method' => 'JNE',
            'cost_shipping' => '11000'
        ]);
        Shipping::create([
            'shipping_method' => 'JNT',
            'cost_shipping' => '12000'
        ]);
    }
}
