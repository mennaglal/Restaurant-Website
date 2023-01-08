<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'total_price',
        'checkout_name',
        'checkout_address',
        'checkout_city',
        'checkout_name_card',
        'checkout_number_card',
        'status',
    ];
    public function food()
    {

        return $this->belongsToMany(foods::class);
    }
}
