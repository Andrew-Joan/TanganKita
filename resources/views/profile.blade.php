@extends('layouts.app')

@section('title', 'profil')

@section('content')
<div class="container py-5">
    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card shadow rounded-4 border-0" style="height: 100%;">
                <div class="card-body text-center d-flex flex-column justify-content-center">
                    <div class="profile-picture mb-4">
                        <img src="" alt="foto profile" class="rounded-circle border" width="120">
                    </div>
                    <h4 class="mb-2 fw-bold">Nama Pengguna</h4>
                    <p class="text-muted"><i class="fas fa-calendar-alt"></i> 10 Januari 1990</p>
                    <hr>
                    <div class="d-flex align-items-center justify-content-center mb-3">
                        <i class="fas fa-money-bill-wave text-success fs-4 me-3"></i>
                        <div>
                            <p class="fw-bold mb-0">Donasi Uang</p>
                            <p>Rp 5.000.000</p>
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
                            <p>3 Kegiatan</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <i class="fas fa-clock text-muted fs-4 me-3"></i>
                        <div>
                            <p class="fw-bold mb-0">Tanggal Gabung</p>
                            <p>1 Januari 2024</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-8">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card shadow rounded-4 border-0">
                        <div class="card-body">
                            <h5 class="fw-bold text-primary mb-3">Nama Donasi 1</h5>
                            <p><strong>Target:</strong> Rp 2.000.000</p>
                            <p><strong>Terkumpul:</strong> Rp 1.200.000</p>
                            <div class="progress mb-3" style="height: 8px;">
                                <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="text-muted">60% Terkumpul</p>
                            <p><strong>Tanggal:</strong> 5 Desember 2024</p>
                            <a href="#" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow rounded-4 border-0">
                        <div class="card-body">
                            <h5 class="fw-bold text-primary mb-3">Nama Donasi 2</h5>
                            <p><strong>Target:</strong> Rp 3.000.000</p>
                            <p><strong>Terkumpul:</strong> Rp 1.500.000</p>
                            <div class="progress mb-3" style="height: 8px;">
                                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="text-muted">50% Terkumpul</p>
                            <p><strong>Tanggal:</strong> 10 Desember 2024</p>
                            <a href="#" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow rounded-4 border-0">
                        <div class="card-body">
                            <h5 class="fw-bold text-primary mb-3">Nama Donasi 3</h5>
                            <p><strong>Target:</strong> Rp 1.000.000</p>
                            <p><strong>Terkumpul:</strong> Rp 900.000</p>
                            <div class="progress mb-3" style="height: 8px;">
                                <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="text-muted">90% Terkumpul</p>
                            <p><strong>Tanggal:</strong> 15 Desember 2024</p>
                            <a href="#" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow rounded-4 border-0">
                        <div class="card-body">
                            <h5 class="fw-bold text-primary mb-3">Nama Donasi 4</h5>
                            <p><strong>Target:</strong> Rp 500.000</p>
                            <p><strong>Terkumpul:</strong> Rp 500.000</p>
                            <div class="progress mb-3" style="height: 8px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="text-muted">100% Terkumpul</p>
                            <p><strong>Tanggal:</strong> 20 Desember 2024</p>
                            <a href="#" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                        </div>
                    </div>
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
