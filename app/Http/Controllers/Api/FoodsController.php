<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodResource;
use App\Models\foods;
use Illuminate\Http\Request;

class FoodsController extends Controller
{   use ApiResponseTrait;

    public function index(){

        $foods = FoodResource::collection(foods::get());
        return $this->apiResponse($foods,'ok',200);
    }

    public function show($id){

        $foods = new FoodResource(foods::find($id));

        if($foods){
            return $this->apiResponse($foods,'ok',200);
        }

        return $this->apiResponse(null,'The post Not Found',404);


    }
}
