<style>
header{
    background-color: #0d6efd;
    padding: 10px;
    text-align: center;
}
h3{
    color: snow
}
</style>
@extends('layout.template')
<!-- START DATA -->
@section('konten') 
<header>
    <h3>ARSIP</h3>
</header>   
<div class="my-3 p-3 bg-body rounded shadow-sm text-center">
    <!-- HEADER -->
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="{{ url('archive') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>
    
    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">
        <a href='{{ url('archive/create') }}' class="btn btn-primary">+ Tambah Data</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">Kode</th>
                <th class="col-md-4">Judul</th>
                <th class="col-md-2">Kategori</th>
                <th class="col-md-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = $data->firstItem() ?>
            @foreach ($data as $item)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $item->code }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->category }}</td>
                <td>
                    <a href='{{ url('archive/'.$item->code.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                    <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{ url('archive/'.$item->code) }}" method="post">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                    </form>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
    {{ $data->withQueryString()->links() }}
</div>
<!-- AKHIR DATA -->
@endsection
    