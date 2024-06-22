<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\Manufacturer;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Ensure manufacturers are created first
        $this->call(ManufacturerSeeder::class);

        // Retrieve manufacturers to assign to cars
        $toyota = Manufacturer::where('name', 'Toyota Motor Corporation')->first();
        $mazda = Manufacturer::where('name', 'Mazda')->first();
        $honda = Manufacturer::where('name', 'Honda')->first();

        Car::create([
            'model' => 'Camry',
            'year' => '2010',
            'salesperson_email' => 'joe@carozza.com',
            'manufacturer_id' => $toyota->id,
        ]);

        Car::create([
            'model' => 'Hilux',
            'year' => '2020',
            'salesperson_email' => 'mary@carozza.com',
            'manufacturer_id' => $toyota->id,
        ]);

        Car::create([
            'model' => 'Mazda 3',
            'year' => '2004',
            'salesperson_email' => 'joe@carozza.com',
            'manufacturer_id' => $mazda->id,
        ]);

        Car::create([
            'model' => 'Civic',
            'year' => '2023',
            'salesperson_email' => 'john@carozza.com',
            'manufacturer_id' => $honda->id,
        ]);
    }
}
