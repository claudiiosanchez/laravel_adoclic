<?php

namespace Tests\Unit;

use App\Models\Category;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    public function test_create_new_model_instance()
    {
        $model = new Category();
        $this->assertInstanceOf(Category::class, $model);
    }

    public function test_save_model_to_database()
    {
        $model = new Category();
        $model->category = 'Claudio';
        $model->save();

        $this->assertDatabaseHas('categories', [
            'category' =>'Claudio'
        ]);
    }

    public function test_not_save_model_to_database()
    {
        $model = new Category();
        $model->category = '';

        $this->assertFalse($model->save());
    }
}
