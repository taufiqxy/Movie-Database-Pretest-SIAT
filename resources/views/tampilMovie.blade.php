@extends('layout.movieLayout')
@section('title','Tampil Movie')
@section('menuTampil','active')

@section('content')
<div class="container text-center mt-3 p-4 bg-white">
<h1 class="mb-3">Data Mahasiswa</h1>
<div class="row">
<div class="col-sm-8 col-md-6 m-auto">
<ol class="list-group">

{{--
@forelse ($mahasiswa as $val)
<li class="list-group-item">{{$val}}</li>
@empty
<div class="alert alert-dark d-inline-block">Belum ada data!</div>
@endforelse
--}}

</ol>
</div>
</div>
</div>
@endsection
