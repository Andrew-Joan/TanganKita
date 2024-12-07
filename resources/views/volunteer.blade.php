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
						<a href="#" class="btn btn-outline-primary mt-3 rounded-pill w-50 align-self-center">Daftar Sekarang</a>
					</div>
				</div>

				<div class="col-md-4 text-center">
					<div class="card p-4 border-0 shadow bg-primary rounded-4">
						<i class="fa-solid fa-medkit fa-4x text-light mb-2 mt-3"></i>
						<h5 class="fw-bold my-4 text-light">Kegiatan Kesehatan</h5>
						<p class="text-light">Berpartisipasi dalam program kesehatan untuk meningkatkan kesejahteraan masyarakat.</p>
                        <a href="#" class="btn btn-outline-light mt-3 rounded-pill w-50 align-self-center">Daftar Sekarang</a>
					</div>
				</div>

				<div class="col-md-4 text-center">
					<div class="card p-4 border-0 shadow rounded-4">
						<i class="fa-solid fa-graduation-cap fa-4x text-primary mb-2 mt-3"></i>
						<h5 class="fw-bold my-4 text-primary">Kegiatan Pendidikan</h5>
						<p class="text-muted">Bantu dalam program pendidikan untuk anak-anak yang membutuhkan.</p>
						<a href="#" class="btn btn-outline-primary mt-3 rounded-pill w-50 align-self-center">Daftar Sekarang</a>
					</div>
				</div>
			</div>
		</section>
		
		<section class="container my-5 bg-gradient-primary">
			<div class="text-center mb-5">
        		<h2 class="fw-bold">Pilihan Kegiatan <span class="text-primary">Sukarelawan</span> untuk Anda</h2>
        		<p class="text-muted">Jelajahi berbagai kegiatan yang dapat Anda ikuti untuk membuat perubahan nyata.</p>
    		</div>
    		<div class="row g-4">
        		<div class="col-md-4">
            		<div class="card shadow rounded-4 h-100">
                		<img src="{{ asset('images/bencana.png') }}" class="card-img-top rounded-top-4" alt="Kegiatan Bencana Alam">
					<div class="card-body text-center">
						<h5 class="fw-bold text-primary">Aksi Peduli: Rehabilitasi Pascabencana</h5>
						<p class="text-muted">Program ini fokus pada membantu masyarakat terdampak bencana alam, seperti gempa atau banjir, dengan membersihkan lingkungan, membangun kembali infrastruktur sederhana, dan memberikan bantuan logistik.</p>
					</div>
					<div class="card-footer bg-transparent border-0 text-center">
						<a href="#" class="fw-bold text-primary">Baca Selengkapnya ></a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card shadow rounded-4 h-100">
					<img src="{{ asset('images/kesehatan.png') }}" class="card-img-top rounded-top-4" alt="Kegiatan Kesehatan">
					<div class="card-body text-center">
						<h5 class="fw-bold text-primary">Sehat Bersama: Klinik Keliling</h5>
						<p class="text-muted">Relawan kesehatan akan berpartisipasi dalam kegiatan pelayanan kesehatan gratis bagi masyarakat kurang mampu di daerah terpencil. </p>
					</div>
					<div class="card-footer bg-transparent border-0 text-center">
						<a href="#" class="fw-bold text-primary">Baca Selengkapnya ></a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card shadow rounded-4 h-100">
					<img src="{{ asset('images/pend.png') }}" class="card-img-top rounded-top-4" alt="Kegiatan Pendidikan">
					<div class="card-body text-center">
						<h5 class="fw-bold text-primary">Belajar Ceria: Bimbingan Anak Desa</h5>
						<p class="text-muted">Kegiatan ini bertujuan untuk memberikan bimbingan belajar kepada anak-anak di desa terpencil yang sulit mendapatkan akses pendidikan.</p>
					</div>
					<div class="card-footer bg-transparent border-0 text-center">
						<a href="#" class="fw-bold text-primary">Baca Selengkapnya ></a>
					</div>
				</div>
			</div>
   		</div>
	</section>

</div>
@endsection

