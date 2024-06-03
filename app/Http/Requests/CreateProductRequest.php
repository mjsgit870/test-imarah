<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'name' => 'required',
      'slug' => 'required|unique:products,slug',
      'price' => 'required|numeric',
      'category' => 'required|in:Digital Printing,Spanduk,Poster',
      'image' => 'required:image|mimes:png,jpg,jpeg|max:1024',
      'description' => 'required'
    ];
  }

  public function attributes()
  {
    return [
      'name' => 'Nama Produk',
      'slug' => 'Slug',
      'price' => 'Harga',
      'category' => 'Kategori',
      'image' => 'Gambar',
      'description' => 'Deskripsi'
    ];
  }
}
