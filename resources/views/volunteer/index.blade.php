@extends('layouts.app')

@section('content')
	<div class="d-flex flex-column min-vh-100 container pb-5">
		<!-- Header -->
		<section class="text-center py-5 bg-gradient">
			<h1 class="fw-bold">Bergabunglah Sebagai <span class="text-primary">Sukarelawan</span></h1>
			<p class="text-muted">Mari bersama kita membuat perubahan yang lebih besar.</p>
		</section>

		<section class="container my-4 bg-gradient-primary">
			<div class="row align-items-center g-5">
				<div class="col-md-6">
					<img src="{{ asset('images/volun.png') }}" alt="Volunteer Illustration" class="img-fluid rounded">
				</div>
				<div class="col-md-6">
					<h3 class="fw-bold mb-4">Mengapa Menjadi Sukarelawan?</h3>
					<ul class="list-unstyled">
						<li class="d-flex gap-4 align-items-start mb-3">
							<span class="rounded-circle bg-primary">
								<i class="fa-solid fa-people-arrows fa-2x text-light p-3"></i>
							</span>
							<div>
								<h5 class="fw-bold">Memberikan Dampak Positif</h5>
								<p class="text-muted">Kontribusi Anda akan membawa perubahan yang nyata bagi masyarakat.</p>
							</div>
						</li>
						<li class="d-flex gap-4 align-items-start mb-3">
							<span class="rounded-circle bg-primary">
								<i class="fa-solid fa-heart-circle-check fa-2x text-light p-3"></i>
							</span>
							<div>
								<h5 class="fw-bold">Pengalaman Berharga</h5>
								<p class="text-muted">Meningkatkan berbagai keterampilan serta memperluas jaringan sosial dan profesional.</p>
							</div>
						</li>
						<li class="d-flex gap-4 align-items-start mb-3">
							<span class="rounded-circle bg-primary">
								<i class="fa-solid fa-earth-americas fa-2x text-light p-3"></i>
							</span>
							<div>
								<h5 class="fw-bold">Mendukung Komunitas</h5>
								<p class="text-muted">Bantu memperkuat komunitas lokal dan menciptakan lingkungan yang lebih baik.</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</section>

		<section class="container my-5 bg-gradient-primary">
			<div class="row g-4">
				<div class="col-md-4 text-center">
					<div class="card p-4 border-0 shadow rounded-4">
						<i class="fa-solid fa-house-damage fa-4x text-primary mb-2 mt-3"></i>
						<h5 class="fw-bold my-4 text-primary">Kegiatan Bencana Alam</h5>
						<p class="text-muted">Bantu mereka yang membutuhkan akibat bencana alam.</p>
						<a href="#" class="btn btn-outline-primary mt-2 rounded-pill px-2 w-50 align-self-center createVolunteerTrigger" data-bs-toggle="modal" data-bs-target="#createVolunteer-1">Buat Kegiatan Relawan</a>
                        @include('volunteer.modals.create', ['volunteerCategory' => 'Bencana Alam', 'volunteerCategoryId' => 1])
					</div>
				</div>

				<div class="col-md-4 text-center">
					<div class="card p-4 border-0 shadow bg-primary rounded-4">
						<i class="fa-solid fa-medkit fa-4x text-light mb-2 mt-3"></i>
						<h5 class="fw-bold my-4 text-light">Kegiatan Kesehatan</h5>
						<p class="text-light">Berpartisipasi dalam program kesehatan untuk meningkatkan kesejahteraan masyarakat.</p>
						<a href="#" class="btn btn-outline-light mt-2 rounded-pill px-2 w-50 align-self-center createVolunteerTrigger" data-bs-toggle="modal" data-bs-target="#createVolunteer-2">Buat Kegiatan Relawan</a>
                        @include('volunteer.modals.create', ['volunteerCategory' => 'Kesehatan', 'volunteerCategoryId' => 2])
					</div>
				</div>

				<div class="col-md-4 text-center">
					<div class="card p-4 border-0 shadow rounded-4">
						<i class="fa-solid fa-graduation-cap fa-4x text-primary mb-2 mt-3"></i>
						<h5 class="fw-bold my-4 text-primary">Kegiatan Pendidikan</h5>
						<p class="text-muted">Bantu dalam program pendidikan untuk anak-anak yang membutuhkan.</p>
						<a href="#" class="btn btn-outline-primary mt-2 rounded-pill px-2 w-50 align-self-center createVolunteerTrigger" data-bs-toggle="modal" data-bs-target="#createVolunteer-3">Buat Kegiatan Relawan</a>
                        @include('volunteer.modals.create', ['volunteerCategory' => 'Pendidikan', 'volunteerCategoryId' => 3])
					</div>
				</div>
			</div>
		</section>

		<section class="container my-5 bg-gradient-primary">
			<div class="text-center mb-5">
        		<h2 class="fw-bold">Pilihan Kegiatan <span class="text-primary">Sukarelawan</span> untuk Anda</h2>
        		<p class="text-muted">Jelajahi berbagai kegiatan yang dapat Anda ikuti untuk membuat perubahan nyata.</p>
    		</div>
    		<div class="row g-4" id="volunteerSection">
				@forelse ($volunteers as $volunteer)
					<div class="col-md-4">
						<div class="card shadow rounded-4 h-100">
							@if ($volunteer->image)
								<img src="data:image/png;base64,{{ $volunteer->image }}" class="card-img-top rounded-top-4" alt="Kegiatan Pendidikan" style="height: 300px;">
							@else
								<img src="data:image/png;base64,{{ $volunteer->image }}" class="card-img-top rounded-top-4" alt="Kegiatan Pendidikan" style="height: 300px;">
							@endif
							<div class="card-body text-center">
								<h5 class="fw-bold text-primary">{{ $volunteer->title }}</h5>
								<p class="text-muted">{!! Str::words($volunteer->description, 20); !!}</p>
							</div>
							<div class="card-footer bg-transparent border-0 text-center">
								<a href="#" class="fw-bold text-primary">Baca Selengkapnya <i class="fa fa-arrow-right ps-1" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
				@empty
					<h4 class="text-danger text-center">Tidak terdapat kegiatan relawan yang dapat diikuti untuk saat ini, silakan cek kembali di lain waktu</h4>
				@endforelse
				{{ $volunteers->links() }}
			</div>
		</section>
</div>
@endsection

<script>
	document.addEventListener("DOMContentLoaded", function() {
		const isLogged = {!! json_encode(auth()->check()) !!};
		$('.createVolunteerTrigger').click(function() {
            if (!isLogged) {
                Swal.fire({
					icon: "error",
					title: "Gagal",
					text: `Anda harus masuk terlebih dahulu untuk dapat membuat kegiatan relawan!`,
					confirmButtonText: 'OKE'
                }).then((result) => {
                    $('.createVolunteerModalForm').modal('hide')
                });
            }
        })
	});
</script>

