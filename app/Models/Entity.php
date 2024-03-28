<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    protected $fillable = ['api','description','link','category_id'];
    
    public function save(array $options = [])
    {
        if (isset($this->attributes['api']) && is_string($this->attributes['api']) && trim($this->attributes['api']) !== '' &&
            isset($this->attributes['description']) && is_string($this->attributes['description']) && trim($this->attributes['description']) !== '' &&
            isset($this->attributes['link']) && is_string($this->attributes['link']) && trim($this->attributes['link']) !== '' &&
            is_int($this->attributes['category_id']) && $this->attributes['category_id'] !== 0) 
        {
            return parent::save($options);
        }
        return false;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
