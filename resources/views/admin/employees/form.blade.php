@extends('index_dup')

@php($isAdmin = true)

@section('title', 'Form Karyawan')
@section('page-title', $employee->exists ? 'Edit Karyawan' : 'Tambah Karyawan')
@section('page-subtitle', 'Kelola data karyawan')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3 class="fw-bold mb-0">{{ $employee->exists ? 'Edit' : 'Tambah' }} Karyawan</h3>
            </div>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ $employee->exists ? route('admin.employees.update', $employee) : route('admin.employees.store') }}" class="d-flex flex-column gap-5">
                @csrf
                @if ($employee->exists)
                    @method('PUT')
                @endif

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $employee->name) }}" required />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">NIP</label>
                        <input type="text" name="nip" class="form-control" value="{{ old('nip', $employee->nip) }}" required />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Departemen</label>
                        <input type="text" name="department" class="form-control" value="{{ old('department', $employee->department) }}" required />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Token</label>
                        <input type="text" name="token" class="form-control" value="{{ old('token', $employee->token) }}" {{ $employee->exists ? 'required' : '' }} />
                        <div class="form-text">Kosongkan saat create untuk auto-generate.</div>
                    </div>
                </div>

                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ old('is_active', $employee->is_active) ? 'checked' : '' }} />
                    <label class="form-check-label">Aktif</label>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('admin.employees.index') }}" class="btn btn-light">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
