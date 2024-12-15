@extends('layouts.app')

@section('title', 'profil')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

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
                    <a class="nav-link" id="pills-volunteer-tab" data-bs-toggle="pill" data-bs-target="#pills-volunteer" type="button" role="tab" aria-controls="pills-volunteer" aria-selected="false">Kegiatan Relawan</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-fund-donation" role="tabpanel" aria-labelledby="pills-fund-donation-tab" tabindex="0">
                    @include('profile.tabs.owned-fund-donations-tab')
                </div>
                <div class="tab-pane fade" id="pills-volunteer" role="tabpanel" aria-labelledby="pills-volunteer-tab" tabindex="0">
                    @include('profile.tabs.owned-volunteers-tab')
                </div>
            </div>
        </div>
    </div>

    <div class="card my-3 py-2 shadow mt-5">
        <div class="card-body">
            <h4 class="fw-bold text-center">Riwayat Donasi</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="datatable-fund-donation-history" width="100%">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Nama Kampanye</th>
                            <th>Kategori Donasi</th>
                            <th>Jumlah Donasi</th>
                            <th>Tanggal Donasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card my-3 py-2 shadow mt-5">
        <div class="card-body">
            <h4 class="fw-bold text-center">Riwayat Kegiatan Relawan</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="datatable-volunteer-history" width="100%">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Nama Kegiatan Relawan</th>
                            <th>Kategori Kegiatan</th>
                            <th>Tanggal Masuk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
       initDatatable();
    });

    function initDatatable() {
        $('#datatable-fund-donation-history').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('profile.listDonationHistory') }}",
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center'
                },
                {
                    data: 'fund_donation.title',
                    name: 'fund_donation.title'
                },
                {
                    data: 'fund_donation.category.name',
                    name: 'fund_donation.category.name',
                },
                {
                    data: 'amount',
                    name: 'amount',
                    searchable: false
                },
                {
                    data: 'transactionTime',
                    name: 'transactionTime'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                }
            ],
            order: [],
        });

        $('#datatable-volunteer-history').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('profile.listVolunteerHistory') }}",
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center'
                },
                {
                    data: 'volunteer.title',
                    name: 'volunteer.title'
                },
                {
                    data: 'volunteer.category.name',
                    name: 'volunteer.category.name',
                },
                {
                    data: 'joinTime',
                    name: 'joinTime'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                }
            ],
            order: []
        });
    }
</script>