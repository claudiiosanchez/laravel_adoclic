<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entity;
use App\Models\Category;
use App\Http\Resources\ApiResource;

class ApiController extends Controller
{
    public function getAPIsByCategory($category)
    {
        $id = Category::where('category',$category)->value('id');
        $resutls = Entity::with('category')->where('category_id', $id)->get();
        return response()->json(['success' => true, 'data' => ApiResource::collection($resutls)]);
    
    }
}
