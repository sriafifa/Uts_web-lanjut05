@extends('app')

@section('title', 'Edit Pegawai')

@section('content')
<div class="page-header">
    <div>
        <h1>Edit Pegawai</h1>
        <p>Perbarui informasi pegawai.</p>
    </div>
    <a href="{{ route('employees.index') }}" class="btn btn-secondary">
        Kembali
    </a>
</div>

<div class="card">
    <form action="{{ route('employees.update', $employee) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama Pegawai</label>
            <input type="text" id="name" name="name"
                   value="{{ old('name', $employee->name) }}" required>
            @error('name') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="department_id">Departemen</label>
            <select id="department_id" name="department_id" required>
                <option value="">Pilih Departemen</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}"
                        @selected(old('department_id', $employee->department_id) == $department->id)>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
            @error('department_id') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="position">Jabatan</label>
            <input type="text" id="position" name="position"
                   value="{{ old('position', $employee->position) }}" required>
            @error('position') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="salary">Gaji (Rp)</label>
            <input type="number" id="salary" name="salary" min="1" step="0.01"
                   value="{{ old('salary', $employee->salary) }}" required>
            @error('salary') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="joined_at">Tanggal Masuk</label>
            <input type="date" id="joined_at" name="joined_at"
                   value="{{ old('joined_at', $employee->joined_at?->format('Y-m-d')) }}" required>
            @error('joined_at') <small class="error">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection