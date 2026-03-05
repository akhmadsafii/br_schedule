<section>
    <div class="section-title"><span></span><strong>Mockup Jadwal (Spreadsheet)</strong></div>
    <div class="schedule-wrap">
        <div class="schedule-head">
            <div class="schedule-title">Jadwal Bulan {{ $monthLabel }}</div>
            <div class="schedule-badge {{ $isFinal ? 'final' : '' }}">
                {{ $isFinal ? 'FINALIZED' : 'DRAFT' }}
            </div>
        </div>
        <div style="overflow-x: auto;">
            <table class="schedule-table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        @forelse ($days as $day)
                            <th>{{ $day }}</th>
                        @empty
                            <th>-</th>
                        @endforelse
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $employee)
                        <tr>
                            <td class="name">{{ $employee->name }}</td>
                            @forelse ($days as $day)
                                @php
                                    $date = $month
                                        ? \Carbon\Carbon::create($month->year, $month->month, $day)->toDateString()
                                        : null;
                                    $shift = $date && isset($scheduleMap[$employee->id][$date])
                                        ? $scheduleMap[$employee->id][$date]
                                        : null;
                                @endphp
                                <td>
                                    <select class="shift-select" {{ $isFinal ? 'disabled' : '' }}>
                                        <option value="">-</option>
                                        @foreach ($shifts as $shiftOption)
                                            <option value="{{ $shiftOption->id }}" @selected($shift && $shift->id === $shiftOption->id)>
                                                {{ $shiftOption->code }} - {{ $shiftOption->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            @empty
                                <td>-</td>
                            @endforelse
                        </tr>
                    @empty
                        <tr>
                            <td class="name">Belum ada karyawan</td>
                            @forelse ($days as $day)
                                <td>-</td>
                            @empty
                                <td>-</td>
                            @endforelse
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="schedule-footer">
            @forelse ($shifts as $shift)
                @php
                    $count = $monthTotals[$shift->id] ?? 0;
                @endphp
                <span class="shift-pill" style="border-color: {{ $shift->color ?? '#253446' }};">
                    {{ $shift->name }}: {{ $count }}
                </span>
            @empty
                <span class="shift-pill">Belum ada shift</span>
            @endforelse
        </div>
    </div>
</section>
