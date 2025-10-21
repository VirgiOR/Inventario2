<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'voucher_type',
        'serie',
        'correlative',
        'date',
        'customer_id',
        'total',
        'observation',
    ];

     //Relacion uno a muchos inversa
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    
    //Relacion muchos a muchos polimórfica
    public function products() 
    {
        return $this->morphToMany(Product::class, 'productable')
                    ->withPivot('quantity', 'price', 'subtotal')
                    ->withTimestamps();
    }
}
