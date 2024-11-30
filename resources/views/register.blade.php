@extends('layouts.app')

@section('content')
    <div style="height: 100vh;" class="container d-flex justify-content-center align-items-center">
        <div class="row align-items-center shadow-lg rounded-4" style="width:900px;height:550px;">
            <div class="col-md-6 side-image p-0 position-relative">                
                <img class="img-fluid rounded-start-4" src="https://via.placeholder.com/450x550">
            </div>

            <div class="col-md-6 d-flex justify-content-center">
                <form class="d-flex flex-column" style="width:90%;">
                    <div class="fw-bold logo text-center mb-4 fs-2">tangankita</div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat E-mail</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="dob" name="dob">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <button type="submit" class="btn btn-primary mb-2">Daftar</button>

                    <small>Sudah memiliki akun? Silakan masuk <a href="{{ route('login') }}" style="text-decoration: underline;">disini</a></small>
                </form>
            </div>
        </div>
    </div>
@endsection
