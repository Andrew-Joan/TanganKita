@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<!-- Hero Section -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Section: Image -->
            <div class="col-md-6">
                <img src="" alt="Contact-Image" class="img-fluid rounded-circle">
            </div>
            <!-- Right Section: Text -->
            <div class="text-center col-md-6 text-md-start">
                <h1 class="mb-5 display-5 fw-bold text-primary">Let’s make an impact</h1>
                <p class="mb-5 text-muted fs-5">
                    Mattis et aliquam fermentum sed sagittis eu elit mauris.
                    Nisi eros vel neque vitae lorem molestie.
                </p>
                <!-- Categories -->
                <div class="mt-4 mb-2 row text-start">
                    <div class="mb-3 col-sm-6">
                        <div class="d-flex align-items-center">
                            Category 1
                        </div>
                        <small class="text-muted">Mattis et aliquam fermentum sed sagittis.</small>
                    </div>
                    <div class="mb-3 col-sm-6">
                        <div class="d-flex align-items-center">
                            Category 2
                        </div>
                        <small class="text-muted">Mattis et aliquam fermentum sed sagittis.</small>
                    </div>
                    <div class="mb-3 col-sm-6">
                        <div class="d-flex align-items-center">
                            Category 3
                        </div>
                        <small class="text-muted">Mattis et aliquam fermentum sed sagittis.</small>
                    </div>
                    <div class="mb-3 col-sm-6">
                        <div class="d-flex align-items-center">
                            Category 4
                        </div>
                        <small class="text-muted">Mattis et aliquam fermentum sed sagittis.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Join Us Section -->
<section class="py-5 text-white bg-primary">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Section: Text and Form -->
            <div class="my-5 col-md-5">
                <h2 class="fw-bold">Jadilah bagian dalam perjalanan kami.</h2>
                <p>
                    Apakah anda tertarik untuk membantu sesama bersama kami? Bergabunglah dengan kami!
                    <br>(Tim kami akan menghubungi anda melalui alamat email yang anda cantumkan di bawah ini.)
                </p>
                <form class="mt-5 d-flex">
                    <input type="email" class="form-control me-2" placeholder="Masukkan alamat email" required>
                    <button class="px-4 btn btn-dark">Submit</button>
                </form>
            </div>
            <!-- Right Section: Image -->
            <div class="col-md-7">
                <img src="your-image-url.jpg" alt="Join Us Image" class="img-fluid">
            </div>
        </div>
    </div>
</section>

@endsection
