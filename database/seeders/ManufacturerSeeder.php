<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //inserting new columns to table called departments
        DB::table(table: 'manufacturers')->insert([
            'name' => 'Toyota Motor Corporation',
            'address' => 'HQ, Kyoto District, Tokyo, Japan',
            'phone' => '+1 800 233 8232',
        ]);

        DB::table(table: 'manufacturers')->insert([
            'name' => 'Mazda',
            'address' => '3-1 Shinchi, Fuchu-cho, Aki-gun, Hiroshima 730-8670, Japan',
            'phone' => '+1 800 237 2334',
        ]);

        DB::table(table: 'manufacturers')->insert([
            'name' => 'Honda',
            'address' => '2-1-1 Minami-Aoyama, Minato-ku, Tokyo 107-8556, Japan',
            'phone' => '+1 800 644 6632',
        ]);
    }
}
