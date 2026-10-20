
@extends('app')

@section('title', 'Edit Departemen')
@section('heading', 'Edit Departemen')

@section('content')
<div class="panel" style="max-width:700px">
    <h2>Ubah Data Departemen</h2>

    <form method="POST" action="{{ route('departments.update', $department) }}">
        @csrf
        @method('PUT')

        <label for="name">Nama Departemen</label>
        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name', $department->name) }}"
            required
            maxlength="255"
        >

        <button class="btn" type="submit">Simpan Perubahan</button>
        <a class="btn btn-secondary" href="{{ route('departments.index') }}">Batal</a>
    </form>
</div>
@endsection
