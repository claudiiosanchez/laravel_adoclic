<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category'];

    public function save(array $options = [])
    {
        if (isset($this->attributes['category']) && is_string($this->attributes['category']) && trim($this->attributes['category']) !== '') {
            return parent::save($options);
        }
        return false;
    }

    public function entities()
    {
        return $this->hasMany(Entity::class);
    }
}
