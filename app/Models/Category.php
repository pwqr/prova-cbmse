<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst(strtolower($value));
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
