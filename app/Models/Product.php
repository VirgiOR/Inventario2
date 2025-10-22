<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'sku',
        'barcode',
        'price',
        'category_id',
    ];

    //Relación uno a muchos inversa
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //Relación uno a muchos
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
    //Relación polimórfica
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

}
