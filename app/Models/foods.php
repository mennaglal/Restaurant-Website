<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foods extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'description',
        'price',
        'quantity',
        'category_id',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\categories','category_id','id');
    }
}
