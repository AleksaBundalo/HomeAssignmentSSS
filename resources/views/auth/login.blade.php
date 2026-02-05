@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <div class="card shadow-lg border-secondary">
            <div class="card-header border-bottom border-secondary py-3 text-center" style="background-color: #1f1f1f;">
                <h4 class="mb-0 fw-bold" style="color: #bb86fc;">🎙️ Access the Lab</h4>
            </div>
            <div class="card-body p-4 bg-dark">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label text-muted small">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="artist@vinylverse.com"  required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-muted small">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                    </div>
                    <button type="submit" class="btn btn-studio-neon w-100 py-2 mb-3">Sign in</button>
                    <div class="text-center">
                        <a href="{{ route('register') }}" class="text-info small text-decoration-none">New critic? Register here.</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection