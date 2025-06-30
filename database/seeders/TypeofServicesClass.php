<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TypeofServices;

class TypeofServicesClass extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeofServices::insert([
            [
                'service_name' => 'Hanya Cuci',
                'price' => 5000,
                'description' => 'Regular',
            ],
            [
                'service_name' => 'Hanya Gosok',
                'price' => 4000,
                'description' => 'Regular',
            ],
            [
                'service_name' => 'Hanya Cuci & Gosok',
                'price' => 8000,
                'description' => 'Regular',
            ],
            
        ]);
    }
}
