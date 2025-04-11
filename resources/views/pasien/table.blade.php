<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Pasien</th>
            <th>Alamat</th>
            <th>No Telpon</th>
            <th>Rumah Sakit</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($data as $pasien)
            <tr>
                <td>{{ $pasien->nama }}</td>
                <td>{{ $pasien->alamat }}</td>
                <td>{{ $pasien->telepon }}</td>
                <td>{{ $pasien->rumahSakit->nama ?? '-' }}</td>
                <td>
                    <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $pasien->id }}">Hapus</button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Data kosong</td>
            </tr>
        @endforelse
    </tbody>
</table>
