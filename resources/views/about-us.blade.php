@extends('layouts.app')

@section('content')
<div class="d-flex flex-column min-vh-100 container pb-5">
  <section class="text-center py-5">
    <h1 class="fw-bold">Jadilah <span class="text-primary">Perubahan</span></h1>
    <p class="text-muted">Setiap orang bisa memberikan perubahan yang besar!</p>
  </section>

  <section class="container my-5">
    <div class="row g-4">
      <div class="col-md-4 text-center">
        <div class="card p-4 border-0 shadow rounded-4">
          <i class="fa-solid fa-hand-holding-dollar fa-4x text-primary mb-2 mt-3"></i>
          <h5 class="fw-bold my-4 text-primary">Donasi</h5>
          <p class="text-muted">Menyediakan bantuan berupa uang bagi orang yang membutuhkan.</p>
          <a href="#" class="btn btn-outline-primary mt-3 rounded-pill w-50 align-self-center">Learn More</a>
        </div>
      </div>
      <div class="col-md-4 text-center">
        <div class="card p-4 border-0 shadow bg-primary rounded-4">
          <i class="fa-solid fa-hand-holding-heart fa-4x text-light mb-2 mt-3"></i>
          <h5 class="fw-bold my-4 text-light">Bantuan</h5>
          <p class="text-light">Memberikan bantuan berupa barang pokok bagi orang yang membutuhkan.</p>
          <a href="#" class="btn btn-outline-light mt-3 rounded-pill w-50 align-self-center">Learn More</a>
        </div>
      </div>
      <div class="col-md-4 text-center">
        <div class="card p-4 border-0 shadow rounded-4">
          <i class="fa-solid fa-handshake-angle fa-4x text-primary mb-2 mt-3"></i>
          <h5 class="fw-bold my-4 text-primary">Sukarelawan</h5>
          <p class="text-muted">Mendukung secara langsung dengan tenaga serta waktu..</p>
          <a href="#" class="btn btn-outline-primary mt-3 rounded-pill w-50 align-self-center">Learn More</a>
        </div>
      </div>
    </div>
  </section>

  <section class="container my-5">
    <div class="row align-items-center g-5">
      <div class="col-md-6 text-center">
        <img src="{{ asset('images/contact-us/hand-image.png') }}" alt="Helping Hand" class="img-fluid rounded">
      </div>
      <div class="col-md-6">
        <div class="mb-4 d-flex gap-4 align-items-center">
          <span class="rounded-circle bg-primary"><i class="fa-solid fa-volcano fa-3x text-light p-3"></i></span>
          <div>
            <h5 class="fw-bold">BENCANA ALAM</h5>
            <p class="text-muted">Loreum Ipsum Loreum Ipsum Loreum Ipsum Loreum Ipsum Loreum Ipsum Loreum Ipsum Loreum Ipsum</p>
          </div>
        </div>
        <div class="mb-4 d-flex gap-4 align-items-center">
          <span class="rounded-circle bg-primary"><i class="fa-solid fa-house-medical fa-3x text-light p-3"></i></span>
          <div>
            <h5 class="fw-bold">KESEHATAN</h5>
            <p class="text-muted">Loreum Ipsum Loreum Ipsum Loreum Ipsum Loreum Ipsum Loreum Ipsum Loreum Ipsum Loreum Ipsum</p>
          </div>
        </div>
        <div class="mb-4 d-flex gap-4 align-items-center">
          <span class="rounded-circle bg-primary"><i class="fa-solid fa-graduation-cap fa-3x text-light p-3"></i></span>
          <div>
            <h5 class="fw-bold">PENDIDIKAN</h5>
            <p class="text-muted">Loreum Ipsum Loreum Ipsum Loreum Ipsum Loreum Ipsum Loreum Ipsum Loreum Ipsum Loreum Ipsum</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
