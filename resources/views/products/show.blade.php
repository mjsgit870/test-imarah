@extends('layouts.main')

@section('content')
  <h1>Edit Produk</h1>
  <div class="mb-3">
    <a href="{{ route('products.index') }}" class="btn btn-secondary"><< Kembali</a>
    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info">Edit</a>
    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Kamu yakin ingin menghapus?')">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Hapus</button>
    </form>
  </div>

  <div class="card">
    <div class="card-body">
      <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid img-thumbnail" style="max-height: 200px" alt="Gambar {{ $product->name }}">

      <table class="table table-borderless" style="width: unset;">
        <tr>
          <td>Nama Produk</td>
          <td>:</td>
          <td>{{ $product->name }}</td>
        </tr>
        <tr>
          <td>Harga</td>
          <td>:</td>
          <td>{{ 'Rp ' . number_format($product->price, 0, ',', '.') }}</td>
        </tr>
        <tr>
          <td>Kategori</td>
          <td>:</td>
          <td>{{ $product->category }}</td>
        </tr>
        <tr>
          <td>Deskripsi</td>
          <td>:</td>
          <td>{!! $product->description !!}</td>
        </tr>
      </table>
    </div>
  </div>
@endsection