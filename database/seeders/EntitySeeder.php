<?php

namespace Database\Seeders;

use App\Services\ApiService;
use Illuminate\Database\Seeder;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $service_api = new ApiService();
        $service_api->save($service_api->fetchData());
    }
}
