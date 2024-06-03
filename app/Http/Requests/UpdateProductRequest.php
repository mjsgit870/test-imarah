<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
      'slug' => 'unique:products,slug,' . $this->product->id,
      'price' => 'numeric',
      'category' => 'in:Digital Printing,Spanduk,Poster',
      'image' => 'image|mimes:png,jpg,jpeg|max:1024',
    ];
  }

  public function attributes()
  {
    return [
      'slug' => 'Slug',
      'price' => 'Harga',
      'category' => 'Kategori',
      'image' => 'Gambar',
    ];
  }
}
