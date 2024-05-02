<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        $products=Product::all();

        return response()->json($products);





    }

    public function filter(){
        $category=request()->get('Category');
        $products=Product::where(['Category'=>$category])->get();


        if ($products->isEmpty()){
            $notdisplay=false;
            abort(404);

        }
        else{
            $notdisplay=true;
            return response()->json($products);
        }

    }

    public function store(){
        request()->validate([
            'ProductName'=>'required',
            'ProductDescription'=>'required',
            'ProductPrice'=>'required',
            'ProductPicture'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Category'=>'required',
        ]);
        $ProductName=request()->get('ProductName');
        $ProductDescription=request()->get('ProductDescription');
        $BrandName=request()->get('BrandName');
        $ProductPrice=request()->get('ProductPrice');
        $Category=request()->get('Category');
        $picturePath = request()->file('ProductPicture')->store('pictures', 'public');

        $product=Product::create([
            'ProductName'=>$ProductName,
            'ProductDescription'=>$ProductDescription,
            'BrandName'=>$BrandName,
            'ProductPrice'=>$ProductPrice,
            'ProductPicture'=>$picturePath,
            'Category'=>$Category,

        ]);

        return response()->json($product,201);
    }

    public function show($id){
        $products=Product::find($id);

        return response()->json($products,200);

    }
    public function destroy($id)
    {

        $products=Product::find($id);
        $products->delete();

       return response(null,204);

    }

    public function update($id)
    {

        $products=Product::find($id);
        $products->update(request()->all());
        return response()->json($products);

    }
}
