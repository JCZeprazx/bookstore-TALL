<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::create([
            'payment_method' => 'BCA',
            'payment_info' => '12345678'
        ]);
        Payment::create([
            'payment_method' => 'Dana',
            'payment_info' => '081234567890'
        ]);
    }
}
