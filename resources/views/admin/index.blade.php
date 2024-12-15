@extends('layouts.app')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="d-flex flex-column min-vh-100">
    <div class="container py-5">
        <h3>Verifikasi Donasi Uang</h3>
        <div class="card my-3 py-2 shadow mb-5">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="datatable-verify-fund-donation" width="100%">
                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Nama Kampanye</th>
                                <th>Nama Pengusul</th>
                                <th>Kategori Donasi</th>
                                <th>Target Donasi</th>
                                <th>Tanggal Diajukan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <h3>Verifikasi Kegiatan Relawan</h3>
        <div class="card my-3 py-2 shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="datatable-verify-volunteer" width="100%">
                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Nama Kegiatan Relawan</th>
                                <th>Nama Pengusul</th>
                                <th>Kategori Kegiatan</th>
                                <th>Target Anggota</th>
                                <th>Tanggal Diajukan</th>
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

<script>
    $(document).ready(function() {
       initDatatable();
    });

    function initDatatable() {
        $('#datatable-verify-fund-donation').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.listDonationVerification') }}",
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    className: 'text-center align-middle'
                },
                {
                    data: 'title',
                    name: 'title',
                    className: 'align-middle'
                },
                {
                    data: 'user.name',
                    name: 'user.name',
                    className: 'align-middle'
                },
                {
                    data: 'category.name',
                    name: 'category.name',
                    className: 'align-middle'
                },
                {
                    data: 'target',
                    name: 'target',
                    searchable: false,
                    className: 'align-middle'
                },
                {
                    data: 'createdTime',
                    name: 'createdTime',
                    className: 'align-middle'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    className: ' text-center align-middle'
                }
            ],
            order: [],
        });

        $('#datatable-verify-volunteer').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.listVolunteerVerification') }}",
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    className: 'text-center align-middle'
                },
                {
                    data: 'title',
                    name: 'title',
                    className: 'align-middle'
                },
                {
                    data: 'user.name',
                    name: 'user.name',
                    className: 'align-middle'
                },
                {
                    data: 'category.name',
                    name: 'category.name',
                    className: 'align-middle'
                },
                {
                    data: 'target',
                    name: 'target',
                    className: 'align-middle'
                },
                {
                    data: 'createdTime',
                    name: 'createdTime',
                    className: 'align-middle'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    className: 'text-center align-middle'
                }
            ],
            order: []
        });
    }
</script>
@endsection

