@extends('admin.layout.master')

@section('title', 'Registracija')

@section('main') 

    <div class="container py-4">
        <div class="p-5 mb-4 bg-body-tertiary rounded-3">
            <h1>Registracija</h1>
            <hr>
            <div class="container-fluid">
                <form class="row g-3 mt-3" action="{{ route('register.store') }}" method="POST">
                    @csrf
                    <div class="row mt-3">
                        <div class="col-1">
                            <label for="first_name" class="mt-1">Ime</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                            @error('first_name')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-1">
                            <label for="last_name" class="mt-1">Prezime</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                            @error('last_name')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-1">
                            <label for="email" class="mt-1">Email</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-1">
                            <label for="password" class="mt-1">Lozinka</label>
                        </div>
                        <div class="col-6">
                            <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" required>
                            @error('password')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-1">
                            <label for="password_confirmation" class="mt-1">Potvrda lozinke</label>
                        </div>
                        <div class="col-6">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                            @error('password_confirmation')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="col-auto">
                        <a href="/" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Povratak"><i class="bi bi-arrow-return-left"></i></a>
                        <button class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Registriraj me">Registriraj se</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection