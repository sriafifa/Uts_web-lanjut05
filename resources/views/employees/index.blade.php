@extends('app')

@section('title', 'Data Pegawai')

@section('content')
<div class="page-header">
    <div>
        <h1>Data Pegawai</h1>
        <p>Kelola seluruh data pegawai perusahaan.</p>
    </div>
    <a href="{{ route('employees.create') }}" class="btn btn-primary">
        + Tambah Pegawai
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Pegawai</th>
                    <th>Departemen</th>
                    <th>Jabatan</th>
                    <th>Gaji</th>
                    <th>Tanggal Masuk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employees as $employee)
                    <tr>
                        <td>{{ $employees->firstItem() + $loop->index }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->department->name }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>Rp {{ number_format((float) $employee->salary, 0, ',', '.') }}</td>
                        <td>{{ $employee->joined_at->format('d-m-Y') }}</td>
                        <td>
                            <a href="{{ route('employees.show', $employee) }}">Detail</a> |
                            <a href="{{ route('employees.edit', $employee) }}">Edit</a>

                            <form action="{{ route('employees.destroy', $employee) }}"
                                  method="POST"
                                  style="display:inline"
                                  onsubmit="return confirm('Yakin ingin menghapus pegawai ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-link">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Belum ada data pegawai.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top: 20px;">
        {{ $employees->links() }}
    </div>
</div>
@endsection