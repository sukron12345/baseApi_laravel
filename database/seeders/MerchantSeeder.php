<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Merchant;
use App\Models\User;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();
        Merchant::create([
            'name' => 'Merchant Vivo Cabang Surabaya',
            'user_id' => $user->id,
        ]);
    }
}
