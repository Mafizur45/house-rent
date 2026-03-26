@extends('layouts.apps')

@section('content')
<div class="container mt-4">

    {{-- Success message from update --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Dashboard</h4>
        </div>

        <div class="card-body">

            <div class="text-center mb-3">
                <img 
                    src="{{ $user->photo ? asset('uploads/profile/'.$user->photo) : asset('default.png') }}" 
                    alt="Profile Photo"
                    class="rounded-circle"
                    width="120"
                    height="120"
                >
            </div>

            <h5 class="text-center">{{ $user->name }}</h5>
            <p class="text-center text-muted">{{ $user->email }}</p>

            <hr>

            <p><strong>Phone:</strong> {{ $user->phone ?? 'Not added' }}</p>
            <p><strong>Address:</strong> {{ $user->address ?? 'Not added' }}</p>

            <div class="text-center mt-3">
                <a href="{{ route('profile.index') }}" class="btn btn-outline-primary">
                    Edit Profile
                </a>
            </div>

        </div>
    </div>

</div>
@endsection
