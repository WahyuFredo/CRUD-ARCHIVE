@extends('layout.template')
<!-- START FORM -->
@section('konten') 

<form action='{{ url('archive') }}' method='post'>
@csrf 
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href='{{ url('archive') }}' class="btn btn-secondary"><< kembali</a>
    <div class="mb-3 row">
        <label for="code" class="col-sm-2 col-form-label">Code</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name='code' value="{{ Session::get('code') }}" id="code">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="title" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='title' value="{{ Session::get('title') }}" id="title">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="category" class="col-sm-2 col-form-label">Category</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='category' value="{{ Session::get('category') }}" id="category">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="category" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
    </div>
</div>
</form>
<!-- AKHIR FORM -->
@endsection