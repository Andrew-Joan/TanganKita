@extends('layouts.app')

@section('content')
	<div class="container pb-5 d-flex flex-column min-vh-100">
		<section class="py-5 text-center">
			<h1 class="fw-bold">Jadilah <span class="text-primary">Perubahan</span></h1>
			<p class="text-muted">Setiap orang bisa memberikan perubahan yang besar!</p>
		</section>

		<section class="container my-5">
			<div class="row g-4">
				<div class="text-center col-md-4">
					<div class="p-4 border-0 shadow card rounded-4">
						<i class="mt-3 mb-2 fa-solid fa-hand-holding-dollar fa-4x text-primary"></i>
						<h5 class="my-4 fw-bold text-primary">Donasi</h5>
						<p class="text-muted">Menyediakan bantuan berupa uang bagi orang yang membutuhkan.</p>
						<a href="{{ route('fund-donation.index') }}" class="mt-3 btn btn-outline-primary rounded-pill w-50 align-self-center">Learn More</a>
					</div>
				</div>
				<div class="text-center col-md-4">
					<div class="p-4 border-0 shadow card bg-primary rounded-4">
						<i class="mt-3 mb-2 fa-solid fa-hand-holding-heart fa-4x text-light"></i>
						<h5 class="my-4 fw-bold text-light">Bantuan</h5>
						<p class="text-light">Memberikan bantuan berupa barang pokok bagi orang yang membutuhkan.</p>
						<a href="#" class="mt-3 btn btn-outline-light rounded-pill w-50 align-self-center">Learn More</a>
					</div>
				</div>
				<div class="text-center col-md-4">
					<div class="p-4 border-0 shadow card rounded-4">
						<i class="mt-3 mb-2 fa-solid fa-handshake-angle fa-4x text-primary"></i>
						<h5 class="my-4 fw-bold text-primary">Sukarelawan</h5>
						<p class="text-muted">Mendukung secara langsung dengan tenaga serta waktu..</p>
						<a href="{{ route('volunteer.index') }}" class="mt-3 btn btn-outline-primary rounded-pill w-50 align-self-center">Learn More</a>
					</div>
				</div>
			</div>
		</section>

		<section class="container my-5">
			<div class="row align-items-center g-5">
				<div class="text-center col-md-6">
					<img src="{{ asset('images/contact-us/hand-image.png') }}" alt="Helping Hand" class="rounded img-fluid">
				</div>
				<div class="col-md-6">
					<div class="gap-4 mb-4 d-flex align-items-center">
						<span class="rounded-circle bg-primary"><i class="p-4 fa-solid fa-volcano fa-2x text-light"></i></span>
						<div>
							<h5 class="fw-bold">Bencana Alam</h5>
							<p class="text-muted">Kami bergerak cepat untuk membantu mereka yang 
								terdampak bencana alam, membawa harapan di tengah kesulitan.</p>
						</div>
					</div>
					<div class="gap-4 mb-4 d-flex align-items-center">
						<span class="rounded-circle bg-primary"><i class="p-4 fa-solid fa-house-medical fa-2x text-light"></i></span>
						<div>
							<h5 class="fw-bold">Kesehatan</h5>
							<p class="text-muted">Kesejahteraan masyarakat adalah prioritas kami, 
								melalui dukungan layanan kesehatan yang berarti bagi yang membutuhkan.</p>
						</div>
					</div>
					<div class="gap-4 mb-4 d-flex align-items-center">
						<span class="rounded-circle bg-primary"><i class="p-4 fa-solid fa-graduation-cap fa-2x text-light"></i></span>
						<div>
							<h5 class="fw-bold">Pendidikan</h5>
							<p class="text-muted">Bersama-sama, kami membangun masa depan yang lebih 
								cerah dengan membantu akses pendidikan untuk semua kalangan.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection
