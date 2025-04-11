@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Pasien</h1>
        <form action="{{ route('pasien.store') }}" method="POST">
            @include('pasien.form', ['rumahSakits' => $rumahSakits])
        </form>
    </div>
@endsection
