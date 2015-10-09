<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
    
        return view('ecomm.admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();

        $categories = Category::all();
      
        //  $categories = array();
        //  foreach(Category::all() as $category){
        //    $categories[$category->id] = $category->name;
        // }

        return view('ecomm.admin.products.create', compact('products'), compact('categories'));
                    // ->with('products', $products)
                    // ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'category_id' => 'required|integer',
            'title'=> 'required|min:4',
            'description' => 'required',
            'price' => 'required',
            'image'=>'required|image|mimes:jpeg,jpg,png',
            'availability'=>'integer',
            ]);
        $product = new Product;

      // upload the image //
        $file = $request->file('image');
        $request->file('photo');
        $destination_path = 'uploads/images/';
        $filename = $file->getClientOriginalName();
        $file->move($destination_path, $filename);

      // save image data into database //
        $product->image = $destination_path . $filename;
        $product->category_id = $request->input('category_id');
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->save();

        return redirect('admin/products');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categories = Category::all();
        
        $products = Product::find($id);

        //  $categories = array();
        //  foreach(Category::all() as $category){
        //    $categories[$category->id] = $category->name;
        // }

        return view('ecomm.admin.products.edit', compact('products'), compact('categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         $this->validate($request, [
            'category_id' => 'required|integer',
            'title'=> 'required|min:4',
            'description' => 'required',
            'price' => 'required',
            'image'=>'required|image|mimes:jpeg,jpg,png',
            'availability'=>'integer',
            ]);
        $product = Product::find($id);
        
      // upload the image //
        $file = $request->file('image');
        $request->file('photo');
        $destination_path = 'uploads/images/';
        $filename = $file->getClientOriginalName();
        $file->move($destination_path, $filename);

      // save image data into database //
        $product->image = $destination_path . $filename;
        $product->category_id = $request->input('category_id');
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->save();

        return redirect('admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $products = Product::find($id);
        $products->delete();

        return redirect()->back();
    }
}
