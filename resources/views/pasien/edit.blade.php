@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Pasien</h1>
        <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
            @method('PUT')
            @include('pasien.form', ['pasien' => $pasien, 'rumahSakits' => $rumahSakits])
        </form>
    </div>
@endsection
