<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    public function index()
    {
        return view('products.index', [
            'products' => Product::latest()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();
        $file = $request->file('image');
        $image = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = 'image';
        $file->move(public_path('/image'), $image);
        $product = new Product();
        $product->image = $image;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return back()->withSuccess('product created !!!!');
    }
    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        return view('products.edit', ['product' => $product]);
    }
    public function update(Request $request)
    {
        $id = $request->edit_id;
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mines:jpeg,jpg,png,gif|max:10000000'
        ]);
        $result = product::where('id', $id)->update([
            'name'=>$request->name,
            'description'=>$request->description
        ]);
        if($result){
            return redirect()->back();
        }
    }
    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();
        $product->delete();
        return back()->withSuccess('product deleted !!!!');
    }
    public function show($id)
    {
        $product = Product::where('id', $id)->first();
        return view('products.show', ['product' => $product]);
    }
}
