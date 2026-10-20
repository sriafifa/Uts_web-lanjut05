
@extends('app')

@section('title', 'Tambah Pegawai')

@section('content')
<style>
    .employee-create {
        max-width: 1050px;
        margin: 0 auto;
        padding: 10px 0 30px;
        color: #1e293b;
    }

    .employee-create * {
        box-sizing: border-box;
    }

    .employee-create .form-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        margin-bottom: 24px;
        flex-wrap: wrap;
    }

    .employee-create .heading-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .employee-create .heading-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 54px;
        height: 54px;
        border-radius: 16px;
        background: #eaf1ff;
        color: #2563eb;
        font-size: 25px;
    }

    .employee-create h1 {
        margin: 0 0 6px;
        font-size: 25px;
        font-weight: 700;
        color: #172554;
    }

    .employee-create .subtitle {
        margin: 0;
        color: #64748b;
        font-size: 14px;
    }

    .employee-create .form-card {
        background: #fff;
        border: 1px solid #e5eaf2;
        border-radius: 18px;
        box-shadow: 0 8px 28px rgba(15, 23, 42, .05);
        overflow: hidden;
    }

    .employee-create .card-heading {
        padding: 23px 28px;
        border-bottom: 1px solid #edf0f5;
        background: #fcfdff;
    }

    .employee-create .card-heading h2 {
        margin: 0 0 6px;
        font-size: 18px;
        font-weight: 700;
        color: #1e293b;
    }

    .employee-create .card-heading p {
        margin: 0;
        color: #64748b;
        font-size: 13px;
    }

    .employee-create .form-body {
        padding: 28px;
    }

    .employee-create .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 23px 24px;
    }

    .employee-create .form-group {
        display: flex;
        flex-direction: column;
        gap: 9px;
        min-width: 0;
        margin: 0;
    }

    .employee-create .form-group.full {
        grid-column: 1 / -1;
    }

    .employee-create label {
        font-size: 14px;
        font-weight: 600;
        color: #334155;
    }

    .employee-create .required {
        color: #ef4444;
    }

    .employee-create input,
    .employee-create select {
        width: 100%;
        min-height: 47px;
        padding: 12px 14px;
        border: 1px solid #dbe2ec;
        border-radius: 10px;
        background: #fff;
        color: #1e293b;
        font-family: inherit;
        font-size: 14px;
        outline: none;
        transition: border-color .2s, box-shadow .2s;
    }

    .employee-create input:focus,
    .employee-create select:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, .12);
    }

    .employee-create input::placeholder {
        color: #94a3b8;
    }

    .employee-create .error {
        color: #dc2626;
        font-size: 12px;
    }

    .employee-create .form-footer {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        padding: 20px 28px;
        border-top: 1px solid #edf0f5;
        background: #fcfdff;
    }

    .employee-create .action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-height: 43px;
        padding: 11px 19px;
        border: none;
        border-radius: 10px;
        text-decoration: none;
        font-family: inherit;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: .2s;
    }

    .employee-create .btn-back {
        background: #eef2f7;
        color: #475569;
    }

    .employee-create .btn-back:hover {
        background: #e2e8f0;
    }

    .employee-create .btn-save {
        background: #2563eb;
        color: #fff;
    }

    .employee-create .btn-save:hover {
        background: #1d4ed8;
        transform: translateY(-1px);
    }

    @media (max-width: 650px) {
        .employee-create .form-grid {
            grid-template-columns: 1fr;
        }

        .employee-create .form-group.full {
            grid-column: auto;
        }

        .employee-create .form-body,
        .employee-create .card-heading {
            padding: 20px;
        }

        .employee-create .form-footer {
            padding: 18px 20px;
        }
    }
</style>

<div class="employee-create">
    <div class="form-heading">
        <div class="heading-info">
            <div class="heading-icon">♙</div>
            <div>
                <h1>Tambah Pegawai</h1>
                <p class="subtitle">
                    Tambahkan data pegawai baru ke dalam sistem SIMPEG.
                </p>
            </div>
        </div>

        <a href="{{ route('employees.index') }}"
           class="action-btn btn-back">
            ← Kembali
        </a>
    </div>

    @if ($errors->any())
        <div style="margin-bottom:20px;padding:14px 18px;border-radius:10px;background:#fef2f2;color:#b91c1c;font-size:13px;">
            Periksa kembali data yang kamu masukkan. Ada kolom yang belum sesuai.
        </div>
    @endif

    <div class="form-card">
        <div class="card-heading">
            <h2>Informasi Pegawai</h2>
            <p>Lengkapi informasi berikut dengan benar.</p>
        </div>

        <form action="{{ route('employees.store') }}" method="POST">
            @csrf

            <div class="form-body">
                <div class="form-grid">
                    <div class="form-group full">
                        <label for="name">
                            Nama Lengkap <span class="required">*</span>
                        </label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Masukkan nama lengkap pegawai"
                            autocomplete="name"
                            required
                        >
                        @error('name')
                            <small class="error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="department_id">
                            Departemen <span class="required">*</span>
                        </label>
                        <select id="department_id" name="department_id" required>
                            <option value="">Pilih departemen</option>
                            @foreach ($departments as $department)
                                <option
                                    value="{{ $department->id }}"
                                    @selected(old('department_id') == $department->id)
                                >
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('department_id')
                            <small class="error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="position">
                            Jabatan <span class="required">*</span>
                        </label>
                        <input
                            type="text"
                            id="position"
                            name="position"
                            value="{{ old('position') }}"
                            placeholder="Contoh: Staf Administrasi"
                            required
                        >
                        @error('position')
                            <small class="error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="salary">
                            Gaji per Bulan (Rp) <span class="required">*</span>
                        </label>
                        <input
                            type="number"
                            id="salary"
                            name="salary"
                            min="1"
                            step="0.01"
                            value="{{ old('salary') }}"
                            placeholder="Contoh: 5000000"
                            required
                        >
                        @error('salary')
                            <small class="error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="joined_at">
                            Tanggal Masuk <span class="required">*</span>
                        </label>
                        <input
                            type="date"
                            id="joined_at"
                            name="joined_at"
                            value="{{ old('joined_at') }}"
                            required
                        >
                        @error('joined_at')
                            <small class="error">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-footer">
                <a href="{{ route('employees.index') }}"
                   class="action-btn btn-back">
                    Batal
                </a>

                <button type="submit" class="action-btn btn-save">
                    ✓ Simpan Pegawai
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
