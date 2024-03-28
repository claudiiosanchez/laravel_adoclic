<?php

namespace Tests\Unit;

use App\Models\Entity;
use Tests\TestCase;
use App\Services\ApiService;

class EntityTest extends TestCase
{
    public function test_create_new_model_instance()
    {
        $model = new Entity();
        $this->assertInstanceOf(Entity::class, $model);
    }

    public function test_save_model_to_database()
    {
        $model = new Entity();
        $model->api = 'api-test';
        $model->description = 'description-test';
        $model->link = 'link-test';
        $model->category_id = 1;
        $model->save();
        $this->assertDatabaseHas('entities', [
            'api' =>'api-test'
        ]);
    }
    
    public function test_not_save_model_to_database()
    {
        $model = new Entity();
        $model->api = 'api-test';
        $model->description = 'description-test';
        $model->link = '';
        $model->category_id = 1;

        $this->assertFalse($model->save());
    }
}
