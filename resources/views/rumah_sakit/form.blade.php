@csrf
<div class="mb-3">
    <label for="nama" class="form-label">Nama Rumah Sakit</label>
    <input type="text" name="nama" class="form-control" value="{{ old('nama', $rs->nama ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea name="alamat" class="form-control" required>{{ old('alamat', $rs->alamat ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $rs->email ?? '') }}">
</div>
<div class="mb-3">
    <label for="telepon" class="form-label">Telepon</label>
    <input type="text" name="telepon" class="form-control" value="{{ old('telepon', $rs->telepon ?? '') }}">
</div>
<button type="submit" class="btn btn-success">Simpan</button>
