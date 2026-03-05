@extends('layouts.public')

@section('title', 'Jadwal Karyawan')
@section('page-title', 'Jadwal Karyawan')
@section('page-subtitle', 'Akses publik via token')

@section('content')
    <div class="d-flex flex-column gap-5">
        @if (!$token)
            <div class="card card-soft card-hero">
                <div class="card-body">
                    <div class="fw-semibold mb-2">Token belum diisi</div>
                    <div class="text-muted">Tambahkan parameter <strong>?token=</strong> pada URL untuk melihat jadwal.</div>
                </div>
            </div>
        @elseif (!$publicEmployee)
            <div class="card card-soft">
                <div class="card-body">
                    <div class="fw-semibold mb-2">Token tidak ditemukan</div>
                    <div class="text-muted">Pastikan link yang digunakan valid.</div>
                </div>
            </div>
        @else
            <div class="card card-soft card-hero">
                <div class="card-body d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-4">
                    <div>
                        <h3 class="fw-bold mb-1">{{ $publicEmployee->name }}</h3>
                        <div class="text-muted">NIP: {{ $publicEmployee->nip }}</div>
                        <div class="text-muted">Departemen: {{ $publicEmployee->department }}</div>
                    </div>
                    <div class="mobile-stack align-items-center">
                        <span class="badge {{ $isFinal ? 'badge-light-danger' : 'badge-light-success' }}">
                            {{ $isFinal ? 'FINALIZED' : 'DRAFT' }}
                        </span>
                        <span class="badge badge-light-primary">{{ $monthLabel }}</span>
                    </div>
                </div>
            </div>
        @endif

        @include('partials.metronic.schedule-table', [
            'editable' => $editable,
        ])
    </div>
@endsection
