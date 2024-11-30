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
        <div>
            <button class="btn btn-outline-primary me-4">Sign in</button>
            <button class="btn btn-primary">Sign up</button>
        </div>
    </div>
</header>

