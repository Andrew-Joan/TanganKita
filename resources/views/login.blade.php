@extends('layouts.app')

@section('content')
    <div style="height: 100vh;" class="container d-flex justify-content-center align-items-center">
        <div class="row align-items-center shadow-lg rounded-4" style="width:900px;height:550px;">
            <div class="col-md-6 d-flex justify-content-center">
                <form action="{{ route('login.attempt') }}" method="POST" id="loginForm" class="d-flex flex-column" style="width:90%;">
                    @csrf
                    <div class="fw-bold logo text-center mb-4 fs-2">tangankita</div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Alamat E-mail</label>
                      <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Kata Sandi</label>
                      <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input border-2" id="remember-me" name="remember-me">
                      <label class="form-check-label" for="remember-me">Ingat kata sandi</label>
                    </div>

                    <button type="submit" class="btn btn-primary mb-2">Masuk</button>

                    <small>Belum memiliki akun? Silakan daftar <a href="{{ route('register') }}" style="text-decoration: underline;">disini</a></small>
                </form>
            </div>

            <div class="col-md-6 side-image p-0 position-relative">                
                <img class="img-fluid rounded-end-4" src="https://via.placeholder.com/450x550">
            </div>
        </div>
    </div>

    {!! JsValidator::formRequest(
        'App\Http\Requests\LoginRequest',
        Crypt::encrypt(['selector' => '#loginForm', 'need_loading' => true]),
    ) !!}
@endsection
