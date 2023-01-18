<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentMethod = [
            [
                'name' => 'Bank Transfer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paypal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        PaymentMethod::insert($paymentMethod);
    }
}
