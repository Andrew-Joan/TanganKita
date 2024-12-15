@extends('layouts.app')

@section('content')
    @php
        $percentage = ceil($fundDonation->amount / $fundDonation->target * 100);
    @endphp
    <div class="d-flex flex-column min-vh-100">
        <div class="container py-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('fund-donation.index') }}">Donasi</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $fundDonation->title }}</li>
                </ol>
            </nav>
            <div class="row shadow-lg px-3 py-4 rounded-4">
                <div class="col">
                    <h3 class="mb-2 text-center">{{ $fundDonation->title }}</h3>
                    <img class="object-fit-cover rounded-3 mx-auto d-block" src="data:image/png;base64,{{ $fundDonation->image }}" alt="Campaign Image" style="width: 450px; height:300px;">
                </div>

                <div class="col">
                    <div class="row mb-4">
                        <div class="col">
                            <div class="fw-bold">Nama Pembuat:</div>
                            <div>{{ $fundDonation->user->name }}</div>
                        </div>
                        <div class="col">
                            <div class="fw-bold">Kategori Donasi:</div>
                            <div>{{ $fundDonation->category->name }}</div>
                        </div>
                    </div>
                    <div class="col" style="width: 90%;">
                        <div class="fw-bolder">Progres Donasi:</div>
                        <div class="d-flex align-items-center my-3" style="width: 100%;">
                            <div class="progress" style="height: 14px;flex-grow: 1;">
                                <div class="progress-bar" role="progressbar" style="width: {{ $percentage }}%;"></div>
                            </div>
                            <span class="ms-2 text-body-tertiary small fw-bold">{{ $percentage }}%</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="fw-bold">Target Donasi:</div>
                            <div>Rp. {{ number_format($fundDonation->target, 0, ',', '.') }}</div>
                        </div>
                        <div class="col">
                            <div class="fw-bold">Dana Terkumpul:</div>
                            <div>Rp. {{ number_format($fundDonation->amount, 0, ',', '.') }}</div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="fw-bold">Tanggal Dibuka:</div>
                            <div>{{ $fundDonation->start_date->format('d F Y') }}</div>
                        </div>
                        <div class="col">
                            <div class="fw-bold">Tanggal Berakhir:</div>
                            <div>{{ $fundDonation->end_date->format('d F Y') }}</div>
                        </div>
                    </div>
                    <div class="row">
                        @if (auth()->id() === $fundDonation->user->id)
                            <div class="d-flex gap-4">
                                <a href="#" class="btn btn-outline-warning btn-sm fw-bold" data-bs-toggle="modal" data-bs-target="#updateFundDonation-{{ $fundDonation->id }}"><i class="fa fa-edit" aria-hidden="true"></i> Perbaharui Informasi</a>
                                @include('fund-donation.modals.update', ['donation' => $fundDonation])
                            
                                <form action="{{ route('fund-donation.destroy', $fundDonation->id) }}" method="POST" class="mb-0">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="deleteDonation btn btn-outline-danger btn-sm fw-bold">
                                        <i class="fa fa-trash" title="Hapus Kampanye Donasi Uang"></i> Hapus Donasi
                                    </button>
                                </form>
                            </div>
                        @else
                            <a href="#" class="triggerModal btn btn-outline-primary rounded-pill px-4" style="width:90%;" data-bs-toggle="modal" data-bs-target="#donate-fund-{{ $fundDonation->id }}">Donate Now</a>
                            @include('fund-donation.modals.donate-fund-in-detail', ['donation' => $fundDonation])
                        @endif
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <h3>Deskripsi Donasi:</h3>
                <div class="shadow-lg p-3 rounded-3">
                    {!! $fundDonation->description !!}
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.deleteDonation').on('click', function(event) {
                event.preventDefault();

                const form = $(this).closest('form'); // Get the closest form element

                Swal.fire({
                    title: 'Hapus kampanye?',
                    text: "Apakah anda yakin ingin menghapus kegiatan donasi uang ini?",
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

