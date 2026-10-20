
@extends('app')

@section('title', 'Tambah Departemen')

@section('heading', 'Tambah Departemen')

@section('content')
<style>
    .department-create {
        max-width: 900px;
        margin: 0 auto;
        padding: 10px 0 30px;
        color: #1e293b;
    }

    .department-create * {
        box-sizing: border-box;
    }

    .department-create .form-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        flex-wrap: wrap;
        margin-bottom: 24px;
    }

    .department-create .heading-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .department-create .heading-icon {
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

    .department-create h1 {
        margin: 0 0 6px;
        font-size: 25px;
        font-weight: 700;
        color: #172554;
    }

    .department-create .subtitle {
        margin: 0;
        color: #64748b;
        font-size: 14px;
    }

    .department-create .form-card {
        background: #fff;
        border: 1px solid #e5eaf2;
        border-radius: 18px;
        box-shadow: 0 8px 28px rgba(15, 23, 42, .05);
        overflow: hidden;
    }

    .department-create .card-heading {
        padding: 23px 28px;
        border-bottom: 1px solid #edf0f5;
        background: #fcfdff;
    }

    .department-create .card-heading h2 {
        margin: 0 0 6px;
        font-size: 18px;
        font-weight: 700;
        color: #1e293b;
    }

    .department-create .card-heading p {
        margin: 0;
        color: #64748b;
        font-size: 13px;
    }

    .department-create .form-body {
        padding: 28px;
    }

    .department-create .form-group {
        display: flex;
        flex-direction: column;
        gap: 9px;
    }

    .department-create label {
        font-size: 14px;
        font-weight: 600;
        color: #334155;
    }

    .department-create .required {
        color: #ef4444;
    }

    .department-create input,
    .department-create textarea {
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

    .department-create input:focus,
    .department-create textarea:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, .12);
    }

    .department-create input::placeholder,
    .department-create textarea::placeholder {
        color: #94a3b8;
    }

    .department-create .error {
        color: #dc2626;
        font-size: 12px;
    }

    .department-create .form-footer {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        padding: 20px 28px;
        border-top: 1px solid #edf0f5;
        background: #fcfdff;
    }

    .department-create .action-btn {
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

    .department-create .btn-back {
        background: #eef2f7;
        color: #475569;
    }

    .department-create .btn-back:hover {
        background: #e2e8f0;
    }

    .department-create .btn-save {
        background: #2563eb;
        color: #fff;
    }

    .department-create .btn-save:hover {
        background: #1d4ed8;
        transform: translateY(-1px);
    }
</style>

<div class="department-create">
    <div class="form-heading">
        <div class="heading-info">
            <div class="heading-icon">▤</div>
            <div>
                <h1>Tambah Departemen</h1>
                <p class="subtitle">
                    Kelola unit atau departemen baru di perusahaan.
                </p>
            </div>
        </div>

        <a href="{{ route('departments.index') }}"
           class="action-btn btn-back">
            ← Kembali
        </a>
    </div>

    @if ($errors->any())
        <div style="margin-bottom:20px;padding:14px 18px;border-radius:10px;background:#fef2f2;color:#b91c1c;font-size:13px;">
            Periksa kembali data yang kamu masukkan.
        </div>
    @endif

    <div class="form-card">
        <div class="card-heading">
            <h2>Informasi Departemen</h2>
            <p>Masukkan nama departemen yang akan ditambahkan.</p>
        </div>

        <form method="POST" action="{{ route('departments.store') }}">
            @csrf

            <div class="form-body">
                <div class="form-group">
                    <label for="name">
                        Nama Departemen <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Contoh: IT, HR, Finance"
                        maxlength="255"
                        required
                    >

                    @error('name')
                        <small class="error">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-footer">
                <a href="{{ route('departments.index') }}"
                   class="action-btn btn-back">
                    Batal
                </a>

                <button class="action-btn btn-save" type="submit">
                    ✓ Simpan Departemen
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
