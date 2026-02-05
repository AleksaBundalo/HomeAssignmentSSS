@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <div class="card shadow-lg border-secondary">
            <div class="card-header border-bottom border-secondary py-3 text-center" style="background-color: #1f1f1f;">
                <h4 class="mb-0 fw-bold" style="color: #bb86fc;">🎙️ Join the Lab</h4>
            </div>
            <div class="card-body p-4 bg-dark">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label text-muted small">Username</label>
                        <input type="text" name="name" class="form-control" placeholder="user123" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted small">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="artist@vinylverse.com" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted small">Create Password</label>
                        <input type="password" name="password" class="form-control" placeholder="6 or more characters" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-muted small">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Please make sure to match the password above" required>
                    </div>
                    <button type="submit" class="btn btn-studio-neon w-100 py-2">Join</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection