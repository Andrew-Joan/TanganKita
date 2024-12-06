@extends('layouts.app')

@section('content')
	<div class="d-flex flex-column min-vh-100 container pb-5">
		<!-- Header -->
		<section class="text-center py-5">
			<h1 class="fw-bold">Bergabunglah Sebagai <span class="text-primary">Sukarelawan</span></h1>
			<p class="text-muted">Mari bersama kita membuat perubahan yang lebih besar.</p>
		</section>

		<section class="container my-5">
			<div class="row align-items-center g-5">
				<div class="col-md-6">
					<img src="{{ asset('images/volunteer.png') }}" alt="Volunteer Illustration" class="img-fluid rounded">
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

		<section class="container my-5">
			<div class="row g-4">
				<div class="col-md-4 text-center">
					<div class="card p-4 border-0 shadow rounded-4">
						<i class="fa-solid fa-house-damage fa-4x text-primary mb-2 mt-3"></i>
						<h5 class="fw-bold my-4 text-primary">Kegiatan Bencana Alam</h5>
						<p class="text-muted">Bantu mereka yang membutuhkan akibat bencana alam.</p>
						<a href="{{ route('volunteer.register', ['activity' => 'Bencana Alam']) }}" class="btn btn-outline-primary mt-3 rounded-pill w-50 align-self-center">Daftar Sekarang</a>
					</div>
				</div>

				<div class="col-md-4 text-center">
					<div class="card p-4 border-0 shadow bg-primary rounded-4">
						<i class="fa-solid fa-medkit fa-4x text-light mb-2 mt-3"></i>
						<h5 class="fw-bold my-4 text-light">Kegiatan Kesehatan</h5>
						<p class="text-light">Berpartisipasi dalam program kesehatan untuk meningkatkan kesejahteraan masyarakat.</p>
                        <a href="{{ route('volunteer.register', ['activity' => 'Kesehatan']) }}" class="btn btn-outline-light mt-3 rounded-pill w-50 align-self-center">Daftar Sekarang</a>
					</div>
				</div>

				<div class="col-md-4 text-center">
					<div class="card p-4 border-0 shadow rounded-4">
						<i class="fa-solid fa-graduation-cap fa-4x text-primary mb-2 mt-3"></i>
						<h5 class="fw-bold my-4 text-primary">Kegiatan Pendidikan</h5>
						<p class="text-muted">Bantu dalam program pendidikan untuk anak-anak yang membutuhkan.</p>
						<a href="{{ route('volunteer.register', ['activity' => 'Pendidikan']) }}" class="btn btn-outline-primary mt-3 rounded-pill w-50 align-self-center">Daftar Sekarang</a>
					</div>
				</div>
			</div>
		</section>			
	</div>
@endsection

