@extends('index_dup')

@php($isAdmin = true)

@section('title', 'Employees')
@section('page-title', 'Employees')
@section('page-subtitle', 'CRUD data karyawan')

@section('content')
    <div class="card">
        <div class="card-header align-items-center">
            <div class="card-title">
                <h3 class="fw-bold mb-0">Data Karyawan</h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ route('admin.employees.create') }}" class="btn btn-primary">Tambah Karyawan</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-row-dashed table-row-gray-300 align-middle">
                    <thead>
                        <tr class="text-muted">
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Departemen</th>
                            <th>Status</th>
                            <th>Token</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employees as $employee)
                            <tr>
                                <td class="fw-semibold">{{ $employee->name }}</td>
                                <td>{{ $employee->nip }}</td>
                                <td>{{ $employee->department }}</td>
                                <td>
                                    <span class="badge {{ $employee->is_active ? 'badge-light-success' : 'badge-light-danger' }}">
                                        {{ $employee->is_active ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </td>
                                <td class="text-muted">{{ $employee->token }}</td>
                                <td class="text-end">
                                    <a href="{{ route('admin.employees.edit', $employee) }}" class="btn btn-sm btn-light-primary">Edit</a>
                                    <form method="POST" action="{{ route('admin.employees.destroy', $employee) }}" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light-danger" onclick="return confirm('Hapus karyawan ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada data karyawan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
