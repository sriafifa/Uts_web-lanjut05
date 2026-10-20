@extends('app')

@section('title', 'Detail Departemen')

@section('content')
<div class="page-header">
    <div>
        <h1>Detail Departemen</h1>
        <p>Informasi departemen dan daftar pegawai.</p>
    </div>
    <a href="{{ route('departments.index') }}" class="btn btn-secondary">
        Kembali
    </a>
</div>

<div class="card">
    <h2>{{ $department->name }}</h2>
    <p>Total Pegawai: {{ $department->employees->count() }}</p>

    <h3>Daftar Pegawai</h3>

    @forelse ($department->employees as $employee)
        <div class="table-row">
            <strong>{{ $employee->name }}</strong>
            <span>{{ $employee->position }}</span>
        </div>
    @empty
        <p>Belum ada pegawai pada departemen ini.</p>
    @endforelse

    <div style="margin-top: 20px;">
        <a href="{{ route('departments.edit', $department) }}" class="btn btn-primary">
            Edit Departemen
        </a>
    </div>
</div>
@endsection