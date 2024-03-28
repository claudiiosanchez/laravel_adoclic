<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use App\Services\ApiService;
use App\Models\Entity;

class ApiTest extends TestCase
{
    public function test_create_new_model_instance()
    {
        $service = new ApiService();
        $this->assertInstanceOf(ApiService::class, $service);
    }

    public function test_fetch_data_returns_correct_structure()
    {
       
        $service = new ApiService();
        $response = $service->fetchData();

        $this->assertArrayHasKey('API', $response[0]);
        $this->assertArrayHasKey('Description', $response[0]);
        $this->assertArrayHasKey('Auth', $response[0]);
        $this->assertArrayHasKey('HTTPS', $response[0]);
        $this->assertArrayHasKey('Cors', $response[0]);
        $this->assertArrayHasKey('Link', $response[0]);
        $this->assertArrayHasKey('Category', $response[0]);

    }
    
    public function test_fetch_data_returns_correct_structure_and_save_database()
    {
        
        $service = new ApiService();
        $response = $service->fetchData();

        $this->assertArrayHasKey('API', $response[0]);
        $this->assertArrayHasKey('Description', $response[0]);
        $this->assertArrayHasKey('Auth', $response[0]);
        $this->assertArrayHasKey('HTTPS', $response[0]);
        $this->assertArrayHasKey('Cors', $response[0]);
        $this->assertArrayHasKey('Link', $response[0]);
        $this->assertArrayHasKey('Category', $response[0]);
        Entity::truncate();
        $service->save($response);
       
        $this->assertDatabaseHas('entities', [
            'api' =>$response[0]["API"]
        ]);
    }

    public function test_getrest_api_by_category_fetch_data_returns_correct_structure()
    {
        $controller = new ApiController(); 
        $response = $controller->getAPIsByCategory('Animals');

        $this->assertInstanceOf(JsonResponse::class, $response); 
        $responseData = json_decode($response->getContent(), true);

        $this->assertTrue($responseData['success']);
        $this->assertArrayHasKey('data', $responseData); 
        $this->assertIsArray($responseData['data']); 

        foreach ($responseData['data'] as $entityData) {
            $this->assertArrayHasKey('api', $entityData);
            $this->assertArrayHasKey('description', $entityData);
            $this->assertArrayHasKey('link', $entityData);
            $this->assertArrayHasKey('category', $entityData);
            $this->assertArrayHasKey('id', $entityData['category']);
            $this->assertArrayHasKey('category', $entityData['category']);
        }
    }
}
