@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column" style="min-height: 100vh;">
        <div class="mx-auto my-5" style="max-width: 1200px;">
            <!-- Back Button (Positioned Above the Image) -->
            <div class="mb-5">
                <a href="/fund-donation" style="font-size: 1.2rem;">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
            </div>


            <!-- Donation Info Section (Image and Right Info) -->
            <div class="flex-row gap-5 d-flex align-items-center">
                <!-- Left Image Section (50% Width) -->
                <div style="flex: 1; display: flex; justify-content: center;">
                    @if ($donation->image != null)
                        <img class="rounded img-fluid" src="{{ asset('storage/' . $donation->image) }}" alt="Campaign Image" style="max-height: 300px; object-fit: cover; width: 100%;">
                    @else
                        <img class="rounded img-fluid" src="https://via.placeholder.com/300x200" alt="Campaign Image" style="width: 100%; max-height: 300px; object-fit: cover;">
                    @endif
                </div>

                <!-- Right Information Section (50% Width) -->
                <div style="flex: 1; display: flex; flex-direction: column; justify-content: center;">
                    <!-- Title -->
                    <h1 class="mb-4">{{ $donation->title }}</h1>

                    <!-- Details Section -->
                    <div class="mb-4">
                        <h5 class="fw-bold">Kategori</h5>
                        <p>{{ $donation->category->name }}</p>
                    </div>

                    <div class="mb-4">
                        <h5 class="fw-bold">Target Donasi</h5>
                        <p>Rp {{ number_format($donation->target, 0, ',', '.') }}</p>
                    </div>

                    <!-- Tanggal Buka and Tanggal Berakhir in the Same Row -->
                    <div class="flex-row gap-5 mb-4 d-flex align-items-center">
                        <div>
                            <h5 class="fw-bold">Tanggal Buka</h5>
                            <p>{{ $donation->start_date->format('d/m/Y') }}</p>
                        </div>
                        <div>
                            <h5 class="fw-bold">Tanggal Berakhir</h5>
                            <p>{{ $donation->end_date->format('d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Deskripsi (Placed at the Very Bottom, Centered) -->
            <div class="mt-5 text-center">
                <h5 class="fw-bold">Deskripsi</h5>
                <p>{{ $donation->description }}</p>
            </div>
        </div>
        
        <!-- Ensures footer stays at the bottom of the page -->
        <div class="flex-grow-1"></div>
    </div>
@endsection
