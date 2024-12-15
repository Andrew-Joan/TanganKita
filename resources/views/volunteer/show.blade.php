@extends('layouts.app')

@section('content')
    @php
        $percentage = ceil($volunteer->amount / $volunteer->target * 100);
    @endphp
    <div class="d-flex flex-column min-vh-100">
        <div class="container py-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('volunteer.index') }}">Kegiatan Relawan</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $volunteer->title }}</li>
                </ol>
            </nav>
            <div class="row shadow-lg px-3 py-4 rounded-4">
                <div class="col">
                    <h3 class="mb-2 text-center">{{ $volunteer->title }}</h3>
                    <img class="object-fit-cover rounded-3 mx-auto d-block" src="data:image/png;base64,{{ $volunteer->image }}" alt="Campaign Image" style="width: 450px; height:300px;">
                </div>

                <div class="col">
                    <div class="row mb-4">
                        <div class="col">
                            <div class="fw-bold">Nama Pengusul:</div>
                            <div>{{ $volunteer->user->name }}</div>
                        </div>
                        <div class="col">
                            <div class="fw-bold">Kategori Kegiatan Relawan:</div>
                            <div>{{ $volunteer->category->name }}</div>
                        </div>
                    </div>
                    <div class="col" style="width: 90%;">
                        <div class="fw-bolder">Progres Pendaftaran:</div>
                        <div class="d-flex align-items-center my-3" style="width: 100%;">
                            <div class="progress" style="height: 14px;flex-grow: 1;">
                                <div class="progress-bar" role="progressbar" style="width: {{ $percentage }}%;"></div>
                            </div>
                            <span class="ms-2 text-body-tertiary small fw-bold">{{ $percentage }}%</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="fw-bold">Maksimum Kapasitas:</div>
                            <div>{{ $volunteer->target }} Relawan</div>
                        </div>
                        <div class="col">
                            <div class="fw-bold">Jumlah Saat ini:</div>
                            <div>{{ $volunteer->amount ?? '0' }} Relawan</div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="fw-bold">Tanggal Dibuka:</div>
                            <div>{{ $volunteer->start_date->format('d F Y') }}</div>
                        </div>
                        <div class="col">
                            <div class="fw-bold">Tanggal Berakhir:</div>
                            <div>{{ $volunteer->end_date->format('d F Y') }}</div>
                        </div>
                    </div>
                    <div class="row">
                        @if (auth()->id() === $volunteer->user->id)
                            <div class="d-flex gap-4">
                                <a href="#" class="btn btn-outline-warning btn-sm fw-bold" data-bs-toggle="modal" data-bs-target="#updateVolunteer-{{ $volunteer->id }}"><i class="fa fa-edit" aria-hidden="true"></i> Perbaharui Informasi</a>
                                @include('volunteer.modals.update', ['ownedVolunteer' => $volunteer])
                            
                                <form action="{{ route('volunteer.destroy', $volunteer->id) }}" method="POST" class="mb-0">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="deleteDonation btn btn-outline-danger btn-sm fw-bold">
                                        <i class="fa fa-trash" title="Hapus Kampanye Donasi Uang"></i> Hapus Donasi
                                    </button>
                                </form>
                            </div>
                        @elseif ($statusRegister === 1)
                            <h6 class="text-success">Anda telah diterima untuk mengikuti kegiatan relawan ini</h6>
                        @elseif ($statusRegister === 2)
                            <h6 class="text-danger">Anda tidak diterima untuk mengikuti kegiatan relawan ini</h6>
                        @elseif ($statusRegister === 3)
                            <h6 class="text-danger">Anda telah mendaftar untuk mengikuti kegiatan relawan ini, silakan tunggu verifikasi dari pengusul kegiatan</h6>
                        @else
                            <a href="#" class="triggerModal btn btn-outline-primary rounded-pill px-4" style="width:90%;" data-bs-toggle="modal" data-bs-target="#apply-volunteer-{{ $volunteer->id }}">Daftar Sekarang</a>
                            @include('volunteer.modals.apply-volunteer', $volunteer)
                        @endif
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <h3>Deskripsi Kegiatan Relawan:</h3>
                <div class="shadow-lg p-3 rounded-3">
                    {!! $volunteer->description !!}
                </div>
            </div>

            @if (auth()->id() === $volunteer->user->id)
                <div class="row mt-5">
                    <h3>Verifikasi Pendaftaran Peserta:</h3>
                    <div class="card my-3 py-2 shadow mb-5">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="datatable-verify-volunteer-applicants" width="100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No.</th>
                                            <th>Nama Pendaftar</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat Surel</th>
                                            <th>Tanggal Mendaftar</th>
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
            @endif
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#datatable-verify-volunteer-applicants').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('volunteer.list-volunteer-applicants', $volunteer->id) }}",
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        className: 'text-center align-middle'
                    },
                    {
                        data: 'user.name',
                        name: 'user.name',
                        className: 'align-middle'
                    },
                    {
                        data: 'birthDate',
                        name: 'birthDate',
                        className: 'align-middle'
                    },
                    {
                        data: 'user.email',
                        name: 'user.email',
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

            $('.deleteDonation').on('click', function(event) {
                event.preventDefault();

                const form = $(this).closest('form');

                Swal.fire({
                    title: 'Hapus kampanye?',
                    text: "Apakah anda yakin ingin menghapus kegiatan relawan ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    reverseButtons: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#000000',
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection

