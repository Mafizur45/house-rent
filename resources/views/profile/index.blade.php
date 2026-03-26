@extends('layouts.apps')

@section('content')
<div class="container mt-4">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">My Profile</h4>
                </div>

                <div class="card-body">

                    {{-- Show success message --}}
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Profile Photo --}}
                        <div class="text-center mb-3">
                            <img 
                                src="{{ $user->photo ? asset('uploads/profile/'.$user->photo) : asset('default.png') }}" 
                                alt="Profile Photo"
                                class="rounded-circle"
                                width="120"
                                height="120"
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Change Photo</label>
                            <input type="file" name="photo" class="form-control">
                        </div>

                        {{-- Name --}}
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input 
                                type="text" 
                                name="name" 
                                value="{{ $user->name }}" 
                                class="form-control"
                            >
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input 
                                type="email" 
                                name="email" 
                                value="{{ $user->email }}" 
                                class="form-control"
                            >
                        </div>

                        {{-- Phone --}}
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input 
                                type="text" 
                                name="phone" 
                                value="{{ $user->phone }}" 
                                class="form-control"
                            >
                        </div>

                        {{-- Address --}}
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-control">{{ $user->address }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Update Profile
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
