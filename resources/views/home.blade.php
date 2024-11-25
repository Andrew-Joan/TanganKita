@extends('layouts.app')

@section('title', 'Home')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
<div class="d-flex flex-column min-vh-100 container">
    <!-- Main Content -->
    <main class="container py-5 flex-grow-1 d-flex justify-content-center align-items-center">
        <div class="row align-items-center">
            <!-- Left Section -->
            <div class="col-md-6">
                <h1 class="display-4 fw-bold text-dark quote">
                    Donasi adalah tentang membuat <span style="color: #1A8FE3;">perubahan.</span>
                </h1>
                <p class="mt-4 fs-5 text-muted desc">
                    Setiap kontribusi, sekecil apa pun, memiliki kekuatan untuk mengubah hidup seseorang.
                    Dengan memberikan, kita menjadi bagian dari solusi dan harapan bagi mereka yang membutuhkan.
                </p>
                <button class="mt-3 btn btn-primary btn-lg">Donasi Sekarang</button>
            </div>

            <!-- Right Section -->
            <div class="col-md-5 offset-md-1">
                <div class="shadow-lg card">
                    <div class="card-body" style="padding: 4rem">
                        <h2 class="mb-4 h5 fw-bold judul">Jumlah Donasi</h2>
                        <!-- Toggle Buttons -->
                        <div class="mb-3 btn-group w-100" style="padding-bottom: 2rem">
                            <button class="btn btn-primary">One-time</button>
                            <button class="btn btn-outline-primary">Weekly</button>
                        </div>
                        <!-- Donation Amount Options -->
                        <div class="row g-2" style="padding-bottom: 2rem">
                            <div class="col-4 coldonate"><button class="btn btn-light w-100">500 Ks</button></div>
                            <div class="col-4 coldonate"><button class="btn btn-light w-100">1000 Ks</button></div>
                            <div class="col-4 coldonate"><button class="btn btn-light w-100">2000 Ks</button></div>
                            <div class="col-4 coldonate"><button class="btn btn-light w-100">5000 Ks</button></div>
                            <div class="col-4 coldonate"><button class="btn btn-light w-100">10000 Ks</button></div>
                            <div class="col-4 coldonate"><button class="btn btn-light w-100">50000 Ks</button></div>
                        </div>
                        <div style="padding-bottom: 2rem">
                            <input type="text" class="mt-3 form-control" placeholder="Custom Amount">
                            <!-- Submit Button -->
                            <button class="mt-3 btn btn-primary w-100">Donasi Sekarang</button>
                        </div>
                        <!-- Custom Amount Input -->
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
