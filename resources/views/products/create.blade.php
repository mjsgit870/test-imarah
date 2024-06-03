@extends('layouts.main')

@section('content')
  <h1>Tambah Produk</h1><hr>
  <form action="{{ route('products.store') }}" class="mb-5" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Nama Produk</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="name" placeholder="Nama Produk">
      @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}" id="slug" placeholder="Slug">
      @error('slug')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Harga</label>
      <div class="input-group">
        <span class="input-group-text">Rp</span>
        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" id="price" placeholder="Harga">
      </div>
      @error('price')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="category" class="form-label">Kategori</label>
      <select class="form-select @error('category') is-invalid @enderror" name="category" id="category">
        <option selected value="" disabled>Pilih kategori</option>
        <option value="Digital Printing" @if(old('category') == 'Digital Printing') selected @endif>Digital Printing</option>
        <option value="Spanduk" @if(old('category') == 'Spanduk') selected @endif>Spanduk</option>
        <option value="Poster" @if(old('category') == 'Poster') selected @endif>Poster</option>
      </select>
      @error('category')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Gambar Produk</label>
      <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" id="image">
      @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Deskripsi Produk</label>
      <input type="hidden" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" id="description" placeholder="Deskripsi">
      <trix-editor input="description"></trix-editor>
      @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Tambah Produk</button>
  </form>
@endsection