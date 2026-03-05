@extends('layouts.admin')

@section('title', 'Admin Jadwal')
@section('page-title', 'Admin Dashboard')
@section('page-subtitle', 'Monitoring, finalisasi, dan export')

@section('content')
    <div class="d-flex flex-column gap-5">
        <div class="row g-4 g-xl-6">
            <div class="col-md-3">
                <div class="stat-tile">
                    <div class="d-flex align-items-center gap-3">
                        <div class="symbol symbol-45px">
                            <div class="symbol-label bg-light-primary">
                                <i class="ki-outline ki-profile-user fs-2 text-primary"></i>
                            </div>
                        </div>
                        <div>
                            <div class="text-muted fw-semibold">Total Karyawan</div>
                            <div class="fs-2 fw-bold">{{ $totalEmployees }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-tile">
                    <div class="d-flex align-items-center gap-3">
                        <div class="symbol symbol-45px">
                            <div class="symbol-label bg-light-success">
                                <i class="ki-outline ki-check fs-2 text-success"></i>
                            </div>
                        </div>
                        <div>
                            <div class="text-muted fw-semibold">Sudah Isi</div>
                            <div class="fs-2 fw-bold">{{ $scheduledEmployees }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-tile">
                    <div class="d-flex align-items-center gap-3">
                        <div class="symbol symbol-45px">
                            <div class="symbol-label bg-light-warning">
                                <i class="ki-outline ki-time fs-2 text-warning"></i>
                            </div>
                        </div>
                        <div>
                            <div class="text-muted fw-semibold">Belum Isi</div>
                            <div class="fs-2 fw-bold">{{ $pendingEmployees }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-tile">
                    <div class="d-flex align-items-center gap-3">
                        <div class="symbol symbol-45px">
                            <div class="symbol-label bg-light-danger">
                                <i class="ki-outline ki-lock-2 fs-2 text-danger"></i>
                            </div>
                        </div>
                        <div>
                            <div class="text-muted fw-semibold">Status Bulan</div>
                            <div class="fs-2 fw-bold">{{ $isFinal ? 'FINAL' : 'DRAFT' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-soft">
            <div class="card-body d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                <div>
                    <h3 class="fw-bold mb-1">Periode {{ $monthLabel }}</h3>
                    <div class="text-muted">Kelola jadwal dan finalisasi bulan berjalan.</div>
                </div>
                <div class="mobile-stack">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-light">Logout</button>
                    </form>
                    <a href="{{ route('admin.export') }}" class="btn btn-light-primary">Export Excel</a>
                    <button class="btn btn-primary">Finalize Bulan</button>
                </div>
            </div>
        </div>

        @include('partials.metronic.schedule-table', [
            'editable' => $editable,
        ])
    </div>
@endsection
