@extends('index_dup')

@section('title', 'Admin Login')
@section('page-title', 'Login Admin')
@section('page-subtitle', 'Masuk untuk kelola jadwal')

@section('content')
    <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center min-h-400px">
        <div class="card w-100 w-lg-500px">
            <div class="card-body p-10">
                <div class="text-center mb-8">
                    <h2 class="fw-bold">Admin Login</h2>
                    <div class="text-muted">Gunakan akun admin yang terdaftar.</div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.submit') }}" class="d-flex flex-column gap-5">
                    @csrf
                    <div>
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required />
                    </div>
                    <div>
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required />
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection
