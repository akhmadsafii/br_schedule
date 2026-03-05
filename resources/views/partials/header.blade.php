<header>
    <div>
        <div class="eyebrow">Concept Overview</div>
        <h1>Konsep Sistem Jadwal Shift</h1>
        <p class="lead">
            Ringkasan kebutuhan sistem jadwal dengan dua sisi utama: publik untuk karyawan dan
            dashboard admin untuk pengelolaan, finalisasi, serta laporan.
        </p>
    </div>
    <div class="status">
        <div class="pill">Status</div>
        <div>
            <strong>{{ $isFinal ? 'FINAL' : 'DRAFT' }}</strong>
            {{ $isFinal ? 'menutup akses edit untuk karyawan dan API update.' : 'masih bisa diedit sebelum finalisasi.' }}
        </div>
        <div>Periode: {{ $monthLabel }}</div>
    </div>
</header>
