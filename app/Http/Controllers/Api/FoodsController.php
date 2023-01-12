<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodResource;
use App\Models\foods;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
class FoodsController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {

        $foods = FoodResource::collection(foods::get()); // return all data
        return $this->apiResponse($foods, 'ok', 200);
    }

    public function show($id)
    {

        $foods = foods::find($id); // return one column of data

        if ($foods) {
            return $this->apiResponse(new FoodResource($foods), 'ok', 200);
        }

        return $this->apiResponse(null, 'The food  Not Found', 404);


    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:foods|max:255',
            'price' => 'required:foods',
            'quantity' => 'required:foods',
            'image' => 'required:foods',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }
        $foods = foods::create($request->all());

        if ($foods) {
            return $this->apiResponse(new FoodResource($foods), 'The food added ', 201);
        }

        return $this->apiResponse(null, 'The food Not Save', 400);
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:foods|max:255',
            'price' => 'required:foods',
            'quantity' => 'required:foods',
            'image' => 'required:foods',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }
        $foods = foods::find($id);

        if (!$foods) {
            return $this->apiResponse(null, 'The post Not Found', 404);
        }

        $foods->update($request->all());

        if ($foods) {
            return $this->apiResponse(new PostResource($foods), 'The post update', 201);
        }

    }
    public function sendImage(Request $request)
    {
        $image=new ImgUpload;
        if($request->hasfile('image'))
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('public/img/',$filename);
            $image->image=$filename;
        }
        else
        {
            return $request;
            $image->image='';
        }
        $image->save();
        return response()->json(['response'=>['code'=>'200','message'=>'image uploaded successfull']]);
    }
}
