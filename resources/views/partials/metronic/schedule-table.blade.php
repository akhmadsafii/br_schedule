<div class="card card-soft">
    <div class="card-header align-items-center">
        <div class="card-title">
            <h3 class="fw-bold mb-0">Jadwal Bulan {{ $monthLabel }}</h3>
        </div>
        <div class="card-toolbar">
            <span class="badge {{ $isFinal ? 'badge-light-danger' : 'badge-light-success' }}">
                {{ $isFinal ? 'FINAL' : 'DRAFT' }}
            </span>
        </div>
    </div>
    <div class="card-body">
        <div class="schedule-grid">
            <table class="table table-row-dashed table-row-gray-300 align-middle fs-7 table-slim">
                <thead>
                    <tr class="text-muted">
                        <th class="min-w-150px sticky-col header">Nama</th>
                        @forelse ($days as $day)
                            <th class="text-center">{{ $day }}</th>
                        @empty
                            <th class="text-center">-</th>
                        @endforelse
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $employee)
                        <tr>
                            <td class="fw-semibold text-gray-800 sticky-col">{{ $employee->name }}</td>
                            @forelse ($days as $day)
                                @php
                                    $date = $month
                                        ? \Carbon\Carbon::create($month->year, $month->month, $day)->toDateString()
                                        : null;
                                    $shift = $date && isset($scheduleMap[$employee->id][$date])
                                        ? $scheduleMap[$employee->id][$date]
                                        : null;
                                @endphp
                                <td class="text-center">
                                    <select class="form-select form-select-sm form-select-solid" {{ $editable ? '' : 'disabled' }}>
                                        <option value="">-</option>
                                        @foreach ($shifts as $shiftOption)
                                            <option value="{{ $shiftOption->id }}" @selected($shift && $shift->id === $shiftOption->id)>
                                                {{ $shiftOption->code }} - {{ $shiftOption->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            @empty
                                <td class="text-center">-</td>
                            @endforelse
                        </tr>
                    @empty
                        <tr>
                            <td class="fw-semibold text-gray-800 sticky-col">Belum ada karyawan</td>
                            @forelse ($days as $day)
                                <td class="text-center">-</td>
                            @empty
                                <td class="text-center">-</td>
                            @endforelse
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex flex-wrap gap-2 mt-5">
            @forelse ($shifts as $shift)
                @php
                    $count = $monthTotals[$shift->id] ?? 0;
                @endphp
                <span class="badge badge-light-secondary">
                    {{ $shift->name }}: {{ $count }}
                </span>
            @empty
                <span class="badge badge-light-secondary">Belum ada shift</span>
            @endforelse
        </div>
    </div>
</div>
