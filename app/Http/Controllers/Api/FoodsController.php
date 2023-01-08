<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\foods;
use Illuminate\Http\Request;

class FoodsController extends Controller
{   use ApiResponseTrait;
    public function index(){
        $foods = foods::get();
        $msg = ["ok"];
        return $this->apiResponse($foods,'ok',200);

    }
}
