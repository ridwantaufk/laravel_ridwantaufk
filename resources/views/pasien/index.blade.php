@extends('layouts.app')

@section('content')
    <div class="container">
        <h4>Data Pasien</h4>

        <div class="mb-3">
            <a href="{{ route('pasien.create') }}" class="btn btn-primary">+ Tambah Pasien</a>
        </div>

        <div class="mb-3">
            <label for="filter_rs">Filter Rumah Sakit:</label>
            <select id="filter_rs" class="form-control" name="rumah_sakit_id">
                <option value="">-- Semua Rumah Sakit --</option>
                @foreach ($rumahSakits as $rs)
                    <option value="{{ $rs->id }}" {{ $filterRs == $rs->id ? 'selected' : '' }}>
                        {{ $rs->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div id="pasienTable">
            @include('pasien.table')
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#filter_rs').on('change', function() {
                let rsId = $(this).val();
                $.get("{{ route('pasien.index') }}", {
                    rumah_sakit_id: rsId
                }, function(data) {
                    $('#pasienTable').html(data);
                });
            });

            $(document).on('click', '.btn-delete', function() {
                if (!confirm('Yakin ingin menghapus?')) return;

                let id = $(this).data('id');
                $.ajax({
                    url: '/pasien/' + id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(res) {
                        $('#filter_rs').trigger('change');
                    }
                });
            });
        });
    </script>
@endsection
