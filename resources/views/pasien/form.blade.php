@csrf
@php
    $fields = [
        [
            'name' => 'nama',
            'type' => 'text',
            'label' => 'Nama Pasien',
            'icon' => 'bi-person-fill text-primary',
            'placeholder' => 'Masukkan nama pasien',
        ],
        [
            'name' => 'alamat',
            'type' => 'textarea',
            'label' => 'Alamat',
            'icon' => 'bi-geo-alt-fill text-danger',
            'placeholder' => 'Masukkan alamat lengkap',
        ],
        [
            'name' => 'telepon',
            'type' => 'text',
            'label' => 'Telepon',
            'icon' => 'bi-telephone-fill text-success',
            'placeholder' => 'contoh: 08123456789',
        ],
    ];
@endphp

<div class="row">
    @foreach ($fields as $field)
        @php
            $value = old($field['name'], $pasien->{$field['name']} ?? '');
        @endphp

        <div class="col-12 mb-4 floating-group">
            <i class="bi {{ $field['icon'] }} floating-icon"></i>

            @if ($field['type'] === 'textarea')
                <textarea id="{{ $field['name'] }}" name="{{ $field['name'] }}" class="form-control floating-input" placeholder=" "
                    rows="1" required>{{ $value }}</textarea>
                <label for="{{ $field['name'] }}" class="textarea-floatinglabel">
                    {{ $field['label'] }} <span class="text-danger">*</span>
                </label>
            @else
                <input type="{{ $field['type'] }}" id="{{ $field['name'] }}" name="{{ $field['name'] }}"
                    value="{{ $value }}" class="form-control floating-input" placeholder=" " required
                    @if ($field['name'] === 'telepon') oninput="this.value = this.value.replace(/[^0-9]/g, '')" @endif>
                <label for="{{ $field['name'] }}" class="floating-label">
                    {{ $field['label'] }} <span class="text-danger">*</span>
                </label>
            @endif

            @error($field['name'])
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>
    @endforeach

    {{-- Dropdown Rumah Sakit --}}
    <div class="col-12 mb-4 floating-group">
        <i class="bi bi-hospital floating-icon text-info"></i>
        <select name="rumah_sakit_id" id="rumah_sakit_id" class="form-select floating-input" required>
            <option value="" disabled
                {{ old('rumah_sakit_id', $pasien->rumah_sakit_id ?? '') === null ? 'selected' : '' }}>
                -- Pilih Rumah Sakit --
            </option>
            @foreach ($rumahSakits as $rs)
                <option value="{{ $rs->id }}"
                    {{ old('rumah_sakit_id', $pasien->rumah_sakit_id ?? '') == $rs->id ? 'selected' : '' }}>
                    {{ $rs->nama }}
                </option>
            @endforeach
        </select>
        <label for="rumah_sakit_id" class="floating-label">
            Rumah Sakit <span class="text-danger">*</span>
        </label>
        @error('rumah_sakit_id')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-success shadow rounded-pill px-4">
            <i class="bi bi-check-circle me-1"></i> Simpan Data
        </button>
    </div>
</div>
