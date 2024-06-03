<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $products = \App\Models\Product::paginate(1);

    return view('products.index', compact('products'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('products.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CreateProductRequest $request)
  {
    try {
      $image_name = time() .'_'. $request->image->hashName();
      $image = Storage::putFileAs('products', $request->image, $image_name);

      $product = new \App\Models\Product();
      $product->name = $request->name;
      $product->slug = Str::slug($request->slug);
      $product->price = $request->price;
      $product->category = $request->category;
      $product->description = $request->description;
      $product->image = $image;
      $product->save();
    } catch (\Throwable $th) {
      return back()->with('error', $th->getMessage());
    }

    return redirect()->route('products.index')->with('success', 'Produk berhasil ditambah');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function show(Product $product)
  {
    return view('products.show', compact('product'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function edit(Product $product)
  {
    return view('products.edit', compact('product'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateProductRequest $request, Product $product)
  {
    try {
      $product->name = $request->name;
      $product->slug = Str::slug($request->slug);
      $product->price = $request->price;
      $product->category = $request->category;
      $product->description = $request->description;

      if ($request->image) {
        $image_name = time() .'_'. $request->image->hashName();
        $image = Storage::putFileAs('products', $request->image, $image_name);
        $product->image = $image;
      }

      $product->save();
    } catch (\Throwable $th) {
      return back()->with('error', $th->getMessage());
    }

    return redirect()->route('products.index')->with('success', 'Produk berhasil diubah');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function destroy(Product $product)
  {
    Storage::disk('public')->delete($product->image);
    $product->delete();

    return redirect()->route('products.index');
  }
}
