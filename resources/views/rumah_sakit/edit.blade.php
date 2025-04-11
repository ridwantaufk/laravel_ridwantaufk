@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Rumah Sakit</h1>
        <form action="{{ route('rumah-sakit.update', $rs->id) }}" method="POST">
            @method('PUT')
            @include('rumah_sakit.form', ['rs' => $rs])
        </form>
    </div>
@endsection
