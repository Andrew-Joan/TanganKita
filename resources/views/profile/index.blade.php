@extends('layouts.app')

@section('title', 'profil')

@section('content')
<div class="container py-5">
    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card shadow rounded-4 border-0" style="height: 100%;">
                <div class="card-body text-center d-flex flex-column justify-content-center">
                    <div class="profile-picture mb-4">
                        <img src="{{ asset('images/volun.png') }}" alt="foto profile" class="rounded-circle border object-fit-cover w-50" style="height: 180px;">
                    </div>
                    <h4 class="mb-2 fw-bold">{{ $user->name }}</h4>
                    <p class="text-muted"><i class="fas fa-calendar-alt"></i> {{ $user->date_of_birth->format('d F Y') }}</p>
                    <hr>
                    <div class="d-flex align-items-center justify-content-center mb-3">
                        <i class="fas fa-money-bill-wave text-success fs-4 me-3"></i>
                        <div>
                            <p class="fw-bold mb-0">Donasi Uang</p>
                            <p>Rp. {{ $amountDonated }}</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center mb-3">
                        <i class="fas fa-box-open text-primary fs-4 me-3"></i>
                        <div>
                            <p class="fw-bold mb-0">Donasi Barang</p>
                            <p>15 Item</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center mb-3">
                        <i class="fas fa-users text-warning fs-4 me-3"></i>
                        <div>
                            <p class="fw-bold mb-0">Volunteer</p>
                            <p>{{ $volunteerJoined }} Kegiatan</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <i class="fas fa-clock text-muted fs-4 me-3"></i>
                        <div>
                            <p class="fw-bold mb-0">Tanggal Gabung</p>
                            <p>{{ $user->created_at->format('d F Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="m-0" id="categoryHeading">Kampanye {{ $user->name }}</h4>
            </div>

            <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-fund-donation-tab" data-bs-toggle="pill" data-bs-target="#pills-fund-donation" type="button" role="tab" aria-controls="pills-fund-donation" aria-selected="false">Donasi Uang</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-product-donation-tab" data-bs-toggle="pill" data-bs-target="#pills-product-donation" type="button" role="tab" aria-controls="pills-product-donation" aria-selected="false">Donasi Barang</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-volunteer-tab" data-bs-toggle="pill" data-bs-target="#pills-volunteer" type="button" role="tab" aria-controls="pills-volunteer" aria-selected="false">Kegiatan Relawan</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-fund-donation" role="tabpanel" aria-labelledby="pills-fund-donation-tab" tabindex="0">
                    @include('profile.tabs.owned-fund-donations-tab')
                </div>
                <div class="tab-pane fade" id="pills-product-donation" role="tabpanel" aria-labelledby="pills-product-donation-tab" tabindex="0">
                    {{-- @include('profile.tabs.owned-fund-donations-tab') --}}
                </div>
                <div class="tab-pane fade" id="pills-volunteer" role="tabpanel" aria-labelledby="pills-volunteer-tab" tabindex="0">
                    @include('profile.tabs.owned-volunteers-tab')
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 mt-4">
        <h4 class="fw-bold text-center mb-4">Riwayat Donasi</h4>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Kampanye</th>
                        <th>Jumlah Donasi</th>
                        <th>Tanggal Donasi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>donasi</td>
                        <td>Rp 100.000</td>
                        <td>01 Jan 2024</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>donasi b</td>
                        <td>Rp 200.000</td>
                        <td>15 Jan 2024</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>donasi c</td>
                        <td>Rp 50.000</td>
                        <td>20 Jan 2024</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>donasi d</td>
                        <td>Rp 150.000</td>
                        <td>25 Jan 2024</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
@endsection

@section('styles')
<style>
        .profile-picture img {
        border: 3px solid #dee2e6;
        transition: all 0.3s ease-in-out;
    }

    .profile-picture img:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .card-body .d-flex {
        margin-bottom: 0.8rem; 
    }

    .card-body i {
        vertical-align: middle;
    }

    .card-body p {
        margin: 0;
        color: #333;
    }

    .table th, .table td {
        vertical-align: middle;
    }
    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
    }

    </style>
@endsection
