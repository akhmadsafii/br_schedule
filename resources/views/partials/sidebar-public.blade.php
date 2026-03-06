@php
	$sidebarEmployees = $sidebarEmployees ?? $employees ?? collect();
	$selectedEmployeeId = $publicEmployee->id ?? null;
@endphp

<div class="d-flex flex-column gap-6 flex-grow-1 p-4 p-lg-6" id="kt_sidebar_secondary_wrapper">
	<div class="d-flex align-items-center justify-content-between">
		<div>
			<div class="fs-5 fw-semibold">Daftar Karyawan</div>
			<div class="text-muted fs-7">Pilih untuk lihat jadwal</div>
		</div>
		<span class="badge badge-light-primary">{{ $sidebarEmployees->count() }}</span>
	</div>
	<div class="position-relative" id="kt_sidebar_secondary_search">
		<div class="d-flex align-items-center position-absolute translate-middle-y top-50 start-0 ms-3">
			<i class="ki-outline ki-magnifier text-gray-600 fs-3"></i>
		</div>
		<input type="text" class="form-control form-control-solid border ps-10" placeholder="Cari nama atau NIP..." name="employee" id="kt_sidebar_employee_search" />
	</div>
	<div class="hover-scroll-y" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_footer, #kt_sidebar_secondary_search" data-kt-scroll-wrappers="#kt_sidebar_secondary_wrapper" data-kt-scroll-offset="0px">
		<div class="d-flex flex-column flex-grow-1 gap-1" id="kt_sidebar_employee_list">
			@forelse ($sidebarEmployees as $employee)
				@php
					$isActive = $selectedEmployeeId === $employee->id;
					$employeeUrl = request()->fullUrlWithQuery(['token' => $employee->token]);
					$initial = strtoupper(substr($employee->name ?? '', 0, 1));
				@endphp
				<a href="{{ $employeeUrl }}" class="d-flex align-items-center p-3 gap-3 border border-transparent rounded {{ $isActive ? 'bg-light-primary border-primary' : 'bg-hover-light-primary border-hover-primary-clarity' }}" data-employee-name="{{ strtolower($employee->name ?? '') }}" data-employee-nip="{{ strtolower($employee->nip ?? '') }}">
					<div class="symbol symbol-40px symbol-circle">
						@if (!empty($employee->photo))
							<img src="{{ asset($employee->photo) }}" alt="{{ $employee->name }}" />
						@else
							<span class="symbol-label bg-light-primary text-primary fw-semibold">{{ $initial }}</span>
						@endif
					</div>
					<div class="d-flex flex-column">
						<div class="text-gray-900 fs-6 fw-semibold">{{ $employee->name }}</div>
						<div class="text-gray-600 fs-8">NIP: {{ $employee->nip }}</div>
					</div>
					@if ($isActive)
						<span class="ms-auto text-primary" aria-label="Dipilih">
							<i class="ki-outline ki-check-circle fs-2"></i>
						</span>
					@endif
				</a>
			@empty
				<div class="text-muted fs-7 px-3 py-2">Belum ada data karyawan.</div>
			@endforelse
		</div>
	</div>
</div>
