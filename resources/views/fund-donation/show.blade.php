@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column" style="min-height: 100vh;">
        <div class="mx-auto my-5" style="max-width: 1200px;">
            <!-- Back Button -->
            <div class="mb-5">
                <a href="/fund-donation" style="font-size: 1.2rem;">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
            </div>

            <!-- Donation Info Section -->
                 margin-top: 100px; margin-bottom: 100px">
                <!-- Left Section: Title and Image -->
                <div style="flex: 1; display: flex; flex-direction: column; justify-content: center">
                    <!-- Title -->
                    <h1 class="mb-4 text-center">{{ $donation->title }}</h1>

                    <!-- Image -->
                    <div style="display: flex; justify-content: center;">
                        @if ($donation->image != null)
                            <img class="rounded img-fluid" src="{{ asset('storage/' . $donation->image) }}" alt="Campaign Image" style="max-height: 300px; object-fit: cover; width: 100%;">
                        @else
                            <img class="rounded img-fluid" src="https://via.placeholder.com/300x200" alt="Campaign Image" style="width: 100%; max-height: 300px; object-fit: cover;">
                        @endif
                    </div>
                </div>

                <!-- Right Section: Details and Button -->
                <div style="flex: 1; margin-left: 20px">
                    <!-- Row 1: Dibuat Oleh and Kategori -->
                    <div class="mb-4 d-flex justify-content-between">
                        <div>
                            <h5 class="fw-bold">Dibuat Oleh</h5>
                            <p>{{ $donation->user->name }}</p>
                        </div>
                        <div style="text-align: right">
                            <h5 class="fw-bold">Kategori</h5>
                            <p>{{ $donation->category->name }}</p>
                        </div>
                    </div>

                    <!-- Separator Line -->
                    <hr>

                    <!-- Row 2: Progress Bar -->
                    <div class="mb-4">
                        <h5 class="fw-bold">Progres</h5>
                        <div class="mt-2 d-flex align-items-center">
                            @php
                                $percentage = ceil($donation->amount / $donation->target * 100);
                            @endphp
                            <div class="progress" style="height: 10px; flex-grow: 1; border: 1px solid">
                                <div class="progress-bar" role="progressbar" style="width: {{ $percentage }}%;"></div>
                            </div>
                            <span class="ms-2 fw-bold">{{ $percentage }}%</span>
                        </div>
                    </div>

                    <!-- Separator Line -->
                    <hr>

                    <!-- Row 3: Uang Terkumpul and Target Donasi -->
                    <div class="mt-5 mb-4 d-flex justify-content-between">
                        <div>
                            <h5 class="fw-bold">Target Donasi</h5>
                            <p class="fw-bold text-primary">Rp{{ number_format($donation->target, 0, ',', '.') }}</p>
                        </div>
                        <div style="text-align: right">
                            <h5 class="fw-bold">Donasi Terkumpul</h5>
                            <p class="fw-bold text-success">Rp{{ number_format($donation->amount, 0, ',', '.') }}</p>
                        </div>
                    </div>

                    <!-- Row 4: Tanggal Buka and Tanggal Berakhir -->
                    <div class="mb-4 d-flex justify-content-between">
                        <div>
                            <h5 class="fw-bold">Tanggal Buka</h5>
                            <p>{{ $donation->start_date->format('d/m/Y') }}</p>
                        </div>
                        <div style="text-align: right">
                            <h5 class="fw-bold">Tanggal Berakhir</h5>
                            <p class="text-danger">{{ $donation->end_date->format('d/m/Y') }}</p>
                        </div>
                    </div>

                    <!-- Row 5: Button Donate -->
                    <div class="text-center">
                        <a href="#" class="px-5 py-2 btn btn-primary rounded-pill">Donate Now</a>
                    </div>
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="text-center" style="margin-top: 50px;">
                <h5 class="fw-bold">Deskripsi Donasi</h5>
                <p>{{ $donation->description }}</p>
            </div>
        </div>

        <!-- Ensures footer stays at the bottom of the page -->
        <div class="flex-grow-1"></div>
    </div>
@endsection
