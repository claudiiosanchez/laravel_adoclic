<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Entity;
use App\Models\Category;
use App\Exceptions\ApiException;

class ApiService
{
    
    public function fetchData()
    {
        try{
            $response = Http::get(env('API'));
            if ($response->status()==200) {
                $categories = Category::pluck('category')->toArray();
                $filteredData = collect($response->json()['entries'])->whereIn('Category',$categories);
                return $filteredData;
            }
            throw new ApiException();
            //return null;
        }catch(\Exception $e)
        {
            throw new ApiException();
        }
    }

    public function save($data)
    {
        //$data = $this->fetchData();
        if($data)
        {
            $data->each(function ($item) {
                $entity = new Entity();
                $entity->api = $item['API'];
                $entity->description = $item['Description'];
                $entity->link = $item['Link'];
                $entity->category_id =  Category::where('category',$item['Category'])->value('id');
                $entity->save();
            });
        }
    }
}