@extends('layouts.main')

@section('content')
  <h3 class="mb-2">Daftar Produk</h3>

  @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="card">
    <div class="card-header">
      <div class="float-end">
        <a href="{{ route('products.create') }}" class="btn btn-primary">Tambah Produk</a>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Harga</th>
            <th scope="col">Kategori</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @if ($products->count() == 0)
            <tr>
              <td colspan="5" class="text-center py-5">Tidak ada produk</td>
            </tr>
          @else
            @foreach ($products as $i => $product)
              <tr>
                <th scope="row" class="align-middle">{{ $i+1 }}</th>
                <td class="align-middle">{{ $product->name }}</td>
                <td class="align-middle">{{ 'Rp ' . number_format($product->price, 0, ',', '.') }}</td>
                <td class="align-middle">{{ $product->category }}</td>
                <td class="align-middle">
                  <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-info">Detail</a>
                  <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                  <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Kamu yakin ingin menghapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                  </form>
                </td>
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
      {{ $products->links() }}
    </div>
  </div>
@endsection