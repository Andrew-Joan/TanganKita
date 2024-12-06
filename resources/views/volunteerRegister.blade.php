ol reg

@extends('layouts.app')

@section('content')
    <div class="container my-5 mb-5">
        <h1 class="text-center fw-bold mb-4">Form Pendaftaran Sukarelawan</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <section class="container my-5 mb-5">
            <div>
                <form method="POST" action="{{ route('volunteer.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-4">
                        <label for="activity" class="form-label">Kegiatan Sukarelawan</label>
                        <input type="text" class="form-control" id="activity" name="activity" value="{{ request()->route('activity') }}" readonly>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 rounded-pill">Daftar</button>
                </form>
            </div>
        </section>
    </div>
@endsection
