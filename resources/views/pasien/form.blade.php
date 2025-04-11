@csrf
<div class="mb-3">
    <label for="nama_pasien" class="form-label">Nama Pasien</label>
    <input type="text" name="nama_pasien" class="form-control"
        value="{{ old('nama_pasien', $pasien->nama_pasien ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea name="alamat" class="form-control" required>{{ old('alamat', $pasien->alamat ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label for="no_telpon" class="form-label">No Telpon</label>
    <input type="text" name="no_telpon" class="form-control"
        value="{{ old('no_telpon', $pasien->no_telpon ?? '') }}">
</div>
<div class="mb-3">
    <label for="rumah_sakit_id" class="form-label">Rumah Sakit</label>
    <select name="rumah_sakit_id" class="form-select" required>
        <option value="">-- Pilih Rumah Sakit --</option>
        @foreach ($rumahSakits as $rs)
            <option value="{{ $rs->id }}"
                {{ old('rumah_sakit_id', $pasien->rumah_sakit_id ?? '') == $rs->id ? 'selected' : '' }}>
                {{ $rs->nama }}
            </option>
        @endforeach
    </select>
</div>
<button type="submit" class="btn btn-success">Simpan</button>
