@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column min-vh-100">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h1>Bantu Kami <span class="text-primary">Menyelamatkan</span> Indonesia</h1>
                <p>Kami berkomitmen untuk terus menyalurkan bantuan untuk Indonesia.<br> Kami bisa, kamu juga bisa!</p>
            </div>

            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="m-0" id="categoryHeading">KATEGORI</h4>
                    @auth
                        <a class="btn btn-outline-success rounded-3 px-2" data-bs-toggle="modal" data-bs-target="#createFundDonation">Buka Donasi Uang</a>
                        @include('fund-donation.modals.create')
                    @endauth
                </div>

                <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-all-fund-tab" data-bs-toggle="pill" data-bs-target="#pills-all-fund" type="button" role="tab" aria-controls="pills-all" aria-selected="true">Semua</a>
                    </li>
                    <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-disaster-tab" data-bs-toggle="pill" data-bs-target="#pills-fund-disaster" type="button" role="tab" aria-controls="pills-disaster" aria-selected="false">Bencana Alam</a>
                    </li>
                    <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-education-tab" data-bs-toggle="pill" data-bs-target="#pills-fund-education" type="button" role="tab" aria-controls="pills-education" aria-selected="false">Pendidikan</a>
                    </li>
                    <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-health-tab" data-bs-toggle="pill" data-bs-target="#pills-fund-health" type="button" role="tab" aria-controls="pills-health" aria-selected="false">Kesehatan</a>
                    </li>
                </ul>
                
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-all-fund" role="tabpanel" aria-labelledby="pills-all-fund-tab" tabindex="0">
                        @include('fund-donation.tabs.all-category-tab')
                    </div>
                    <div class="tab-pane fade" id="pills-fund-disaster" role="tabpanel" aria-labelledby="pills-disaster-tab" tabindex="0">
                        @include('fund-donation.tabs.disaster-category-tab')
                    </div>
                    <div class="tab-pane fade" id="pills-fund-education" role="tabpanel" aria-labelledby="pills-education-tab" tabindex="0">
                        @include('fund-donation.tabs.education-category-tab')
                    </div>
                    <div class="tab-pane fade" id="pills-fund-health" role="tabpanel" aria-labelledby="pills-health-tab" tabindex="0">
                        @include('fund-donation.tabs.health-category-tab')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            if (performance.navigation.type === 1) {
                localStorage.removeItem('activeTab');
            }

            $('#pills-tab a').on('click', function(e) {
                localStorage.setItem('activeTab', $(this).attr('id'));
            });

            let activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('#' + activeTab).tab('show');
            }

            if (window.location.search) {
                history.replaceState({}, document.title, window.location.pathname);
            }
        });

        const isLogged = {!! json_encode(auth()->check()) !!};
		$('.triggerModal').click(function() {
            if (!isLogged) {
                Swal.fire({
					icon: "error",
					title: "Gagal",
					text: `Anda harus masuk terlebih dahulu untuk dapat melakukan donasi!`,
					confirmButtonText: 'OKE'
                }).then((result) => {
                    $('.modal').modal('hide')
                });
            }
	    }); 
    </script>
@endsection
