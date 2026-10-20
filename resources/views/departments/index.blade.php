
@extends('app')

@section('title', 'Data Departemen')
@section('heading', 'Data Departemen')

@section('content')
<div class="panel">
    <div class="topbar">
        <div>
            <h2>Daftar Departemen</h2>
            <p class="muted">Kelola departemen yang ada di perusahaan.</p>
        </div>
        <a class="btn" href="{{ route('departments.create') }}">+ Tambah Departemen</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Departemen</th>
                <th>Jumlah Pegawai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($departments as $department)
                <tr>
                    <td>{{ $departments->firstItem() + $loop->index }}</td>
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->employees_count }}</td>
                    <td>
                        <div class="actions">
                            <a class="btn btn-secondary"
                               href="{{ route('departments.edit', $department) }}">Edit</a>
                            <form method="POST"
                                  action="{{ route('departments.destroy', $department) }}"
                                  onsubmit="return confirm('Yakin ingin menghapus departemen ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada data departemen.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top:20px">{{ $departments->links() }}</div>
</div>
@endsection
