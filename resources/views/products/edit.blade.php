@extends('layouts.main')

@section('content')
  <h1>Edit Produk</h1>
  <a href="{{ route('products.index') }}" class="btn btn-secondary"><< Kembali</a><hr>

  <form action="{{ route('products.update', $product->id) }}" class="mb-5" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="name" class="form-label">Nama Produk</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" id="name" placeholder="Nama Produk">
      @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $product->slug }}" id="slug" placeholder="Slug">
      @error('slug')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Harga</label>
      <div class="input-group">
        <span class="input-group-text">Rp</span>
        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}" id="price" placeholder="Harga">
      </div>
      @error('price')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="category" class="form-label">Kategori</label>
      <select class="form-select @error('category') is-invalid @enderror" name="category" id="category">
        <option selected value="" disabled>Pilih kategori</option>
        <option value="Digital Printing" @if($product->category == 'Digital Printing') selected @endif>Digital Printing</option>
        <option value="Spanduk" @if($product->category == 'Spanduk') selected @endif>Spanduk</option>
        <option value="Poster" @if($product->category == 'Poster') selected @endif>Poster</option>
      </select>
      @error('category')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Gambar Produk</label>
      <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ $product->image }}" id="image">
      @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
      <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid img-thumbnail mt-2" style="max-height: 200px" alt="Gambar {{ $product->name }}">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Deskripsi Produk</label>
      <input type="hidden" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $product->description }}" id="description" placeholder="Deskripsi">
      <trix-editor input="description"></trix-editor>
      @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Update Produk</button>
  </form>
@endsection