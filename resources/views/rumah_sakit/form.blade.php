@csrf
@php
    $fields = [
        [
            'name' => 'nama',
            'type' => 'text',
            'label' => 'Nama Rumah Sakit',
            'icon' => 'bi-hospital text-info',
            'placeholder' => 'Masukkan nama rumah sakit',
        ],
        [
            'name' => 'alamat',
            'type' => 'textarea',
            'label' => 'Alamat',
            'icon' => 'bi-geo-alt-fill text-danger',
            'placeholder' => 'Masukkan alamat lengkap',
        ],
        [
            'name' => 'email',
            'type' => 'email',
            'label' => 'Email',
            'icon' => 'bi-envelope-fill text-warning',
            'placeholder' => 'contoh: info@rumahsakit.id',
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
            $value = old($field['name'], $rs->{$field['name']} ?? '');
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
</div>
