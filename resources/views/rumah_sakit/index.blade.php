@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Data Rumah Sakit</h1>
        <a href="{{ route('rumah-sakit.create') }}" class="btn btn-primary mb-3">+ Tambah RS</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rumahSakits as $rs)
                    <tr>
                        <td>{{ $rs->nama }}</td>
                        <td>{{ $rs->alamat }}</td>
                        <td>{{ $rs->email }}</td>
                        <td>{{ $rs->telepon }}</td>
                        <td>
                            <a href="{{ route('rumah-sakit.edit', $rs->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('rumah-sakit.destroy', $rs->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin hapus?')"
                                    class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
