@extends('layouts.public')

@section('title', 'Jadwal Karyawan')
@section('page-title', 'Jadwal Karyawan')
@section('page-subtitle', 'Akses publik via token')

@section('content')
    <div class="d-flex flex-column gap-3">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-2">
            <div>
                <div class="fw-semibold">
                    @if ($publicEmployee)
                        {{ $publicEmployee->name }}
                        <span class="text-muted fs-7">(NIP {{ $publicEmployee->nip }})</span>
                    @else
                        Jadwal Karyawan
                    @endif
                </div>
                <div class="text-muted fs-7">
                    @if (!$token)
                        Tambahkan <strong>?token=</strong> untuk edit jadwal pribadi.
                    @elseif ($tokenInvalid)
                        Token tidak ditemukan, mode lihat saja.
                    @elseif ($publicEmployee)
                        {{ $publicEmployee->department }}
                    @endif
                </div>
            </div>
            <div class="d-flex flex-wrap align-items-center gap-2">
                <span class="badge {{ $isFinal ? 'badge-light-danger' : 'badge-light-success' }}">
                    {{ $isFinal ? 'FINAL' : 'DRAFT' }}
                </span>
                <span class="badge badge-light-primary">{{ $monthLabel }}</span>
            </div>
        </div>

        <div class="d-flex flex-wrap gap-3 text-muted fs-7">
            <span>Total: <strong class="text-gray-900">{{ $totalEmployees }}</strong></span>
            <span>Sudah Isi: <strong class="text-gray-900">{{ $scheduledEmployees }}</strong></span>
            <span>Belum Isi: <strong class="text-gray-900">{{ $pendingEmployees }}</strong></span>
        </div>

        @php
            $years = $availableMonths->pluck('year')->unique()->sortDesc()->values();
            $monthsForYear = $availableMonths
                ->where('year', $selectedYear)
                ->pluck('month')
                ->unique()
                ->sort()
                ->values();
        @endphp

        <form method="GET" class="d-flex flex-wrap align-items-end gap-2">
            @if ($token)
                <input type="hidden" name="token" value="{{ $token }}" />
            @endif
            <div>
                <label class="form-label text-muted fs-7 mb-1">Tahun</label>
                <select name="year" class="form-select form-select-sm form-select-solid" onchange="this.form.submit()">
                    <option value="">Pilih Tahun</option>
                    @foreach ($years as $year)
                        <option value="{{ $year }}" {{ (string) $selectedYear == (string) $year ? 'selected' : '' }}>{{ $year }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="form-label text-muted fs-7 mb-1">Bulan</label>
                <select name="month" class="form-select form-select-sm form-select-solid" onchange="this.form.submit()">
                    <option value="">Pilih Bulan</option>
                    @foreach ($monthsForYear as $monthValue)
                        <option value="{{ $monthValue }}" {{ (string) $selectedMonth == (string) $monthValue ? 'selected' : '' }}>{{ $monthValue }}</option>
                    @endforeach
                </select>
            </div>
            <noscript>
                <button type="submit" class="btn btn-sm btn-light-primary">Terapkan</button>
            </noscript>
        </form>

        @include('partials.metronic.schedule-table', [
            'editable' => $editable,
        ])
    </div>
@endsection
