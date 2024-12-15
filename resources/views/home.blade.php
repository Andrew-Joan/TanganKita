@extends('layouts.app')

@section('title', 'Home')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
<div class="d-flex flex-column min-vh-100 container pb-5">
    <main class="container py-5 flex-grow-1 d-flex justify-content-center align-items-center">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="display-4 fw-bold text-dark quote">
                    Donasi adalah tentang membuat <span style="color: #1A8FE3;">perubahan.</span>
                </h1>
                <p class="mt-4 fs-5 text-muted desc">
                    Setiap kontribusi, sekecil apa pun, memiliki kekuatan untuk mengubah hidup seseorang.
                    Dengan memberikan, kita menjadi bagian dari solusi dan harapan bagi mereka yang membutuhkan.
                </p>
                <a href="{{ route('fund-donation.index') }}" class="mt-3 btn btn-primary btn-lg">Donasi Sekarang</a>
            </div>

            <div class="col-md-5 offset-md-1">
                <div class="shadow-lg card">
                    <div class="card-body" style="padding: 4rem">
                        <h2 class="mb-4 h5 fw-bold judul">Jumlah Donasi</h2>

                        <div class="mb-3 btn-group w-100" style="padding-bottom: 2rem">
                            <button class="btn btn-primary">Sekali Donasi</button>
                            <button class="btn btn-outline-primary">Donasi Mingguan</button>
                        </div>

                        <div class="row g-2" style="padding-bottom: 2rem">
                            <div class="col-6 coldonate"><button class="btn btn-light w-100">Rp. 5000</button></div>
                            <div class="col-6 coldonate"><button class="btn btn-light w-100">Rp. 10.000</button></div>
                            <div class="col-6 coldonate"><button class="btn btn-light w-100">Rp. 20.000</button></div>
                            <div class="col-6 coldonate"><button class="btn btn-light w-100">Rp. 50.000</button></div>
                            <div class="col-6 coldonate"><button class="btn btn-light w-100">Rp. 100.000</button></div>
                            <div class="col-6 coldonate"><button class="btn btn-light w-100">Rp. 200.000</button></div>
                        </div>
                        <div style="padding-bottom: 2rem">
                            <input type="text" class="mt-3 form-control" placeholder="Donasi sesuai keinginan...">
                            <a href="{{ route('fund-donation.index') }}" class="mt-3 btn btn-primary w-100">Donasi Sekarang</a href="{{ route('fund-donation.index') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
