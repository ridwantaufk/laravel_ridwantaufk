@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Rumah Sakit</h1>
        <form action="{{ route('rumah-sakit.store') }}" method="POST">
            @include('rumah_sakit.form')
        </form>
    </div>
@endsection
