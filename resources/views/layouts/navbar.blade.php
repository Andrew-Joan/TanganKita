<header class="bg-white shadow-sm">
    <div class="container py-3 d-flex justify-content-between align-items-center">
        <div class="fs-4 fw-bold logo">tangankita</div>
        <nav class="d-flex align-items-center">
            <a href="/" class="mx-4 text-secondary">Home</a>
            <a href="/about-us" class="mx-4 text-secondary">About</a>
            <div class="dropdown mx-4">
                <a class="nav-link dropdown-toggle text-secondary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Donation
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item text-secondary" href="{{ route('fund-donation.index') }}">Fund Donation</a></li>
                    <li><a class="dropdown-item text-secondary" href="#">Product Donation</a></li>
                </ul>
            </div>
            <a href="/volunteer" class="mx-4 text-secondary">Volunteer</a>
            <a href="/blog" class="mx-4 text-secondary">Blog</a>
            <a href="/contact" class="mx-4 text-secondary">Contact</a>
        </nav>
        <ul class="navbar-nav ms-auto">
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Selamat datang,  {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        @if (auth()->user()->role_id === 1)
                            <li>
                                <a href="{{ route('profile.index') }}" class="d-flex align-items-center justify-content-center text-dark gap-2 text-decoration-none fw-bold">
                                    <i class="fa fa-user pe-1" aria-hidden="true"></i> Profil Saya
                                </a>
                            </li>
                        @elseif (auth()->user()->role_id === 2)
                            <li class="px-3">
                                <a href="#" class="d-flex align-items-center justify-content-center text-dark gap-2 text-decoration-none fw-bold">
                                    <i class="fa fa-user-secret pe-1" aria-hidden="true"></i> Dasbor Administrator
                                </a>
                            </li>
                        @endif
                        <li>
                            <div class="d-flex align-items-center justify-content-center">
                                <form action="{{ route('logout') }}" method="POST" class="mb-0">
                                    @csrf
                                    <button class="dropdown-item fw-bold" type="submit"><i class="fa fa-sign-out pe-1" aria-hidden="true"></i> Keluar</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            @else
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-4"><i class="bi bi-box-arrow-in-right"></i> Masuk</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
                </li>
            @endauth
        </ul>
    </div>
</header>

