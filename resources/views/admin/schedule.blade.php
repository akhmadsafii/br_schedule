@extends('index_dup')

@php($isAdmin = true)

@section('title', 'Admin Jadwal')
@section('page-title', 'Admin Dashboard')
@section('page-subtitle', 'Monitoring, finalisasi, dan export')

@section('content')
    <div class="d-flex flex-column gap-5">
        <div class="row g-5 g-xl-8">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="text-muted fw-semibold">Total Karyawan</div>
                        <div class="fs-2 fw-bold">{{ $totalEmployees }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="text-muted fw-semibold">Sudah Isi</div>
                        <div class="fs-2 fw-bold">{{ $scheduledEmployees }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="text-muted fw-semibold">Belum Isi</div>
                        <div class="fs-2 fw-bold">{{ $pendingEmployees }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="text-muted fw-semibold">Status Bulan</div>
                        <div class="fs-2 fw-bold">{{ $isFinal ? 'FINAL' : 'DRAFT' }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                <div>
                    <h3 class="fw-bold mb-1">Periode {{ $monthLabel }}</h3>
                    <div class="text-muted">Kelola jadwal dan finalisasi bulan berjalan.</div>
                </div>
                <div class="d-flex gap-2">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-light">Logout</button>
                    </form>
                    <button class="btn btn-light-primary">Export Excel</button>
                    <button class="btn btn-primary">Finalize Bulan</button>
                </div>
            </div>
        </div>

        @include('partials.metronic.schedule-table', [
            'editable' => $editable,
        ])
    </div>
@endsection
