<div class="row g-4">
    @foreach ($ownedFundDonations as $ownedFundDonation)
        @php
            $percentage = ceil($ownedFundDonation->amount / $ownedFundDonation->target * 100) . '%';
            $bgColor = $ownedFundDonation->status_id === 1 ? 'bg-warning' : ($ownedFundDonation->status_id === 2 ? 'bg-success' : 'bg-danger');
        @endphp
        <div class="col-md-6">
            <div class="card shadow rounded-4 border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-primary">{{ $ownedFundDonation->title }}</h5>
                        <div class="badge {{ $bgColor }} text-dark">{{ $ownedFundDonation->status->name }}</div>
                    </div>
                    <p><strong>Target:</strong> Rp. {{ number_format($ownedFundDonation->target, 0, ',', '.') }}</p>
                    <p><strong>Terkumpul:</strong> Rp. {{ number_format($ownedFundDonation->amount, 0, ',', '.') }}</p>
                    <div class="progress mb-3" style="height: 8px;">
                        <div class="progress-bar" role="progressbar" style="width: {{ $percentage }};"></div>
                    </div>
                    <p class="text-muted">{{ $percentage }} Terkumpul</p>
                    <p><strong>Tanggal Buka:</strong> {{ $ownedFundDonation->start_date->format('d F Y') }}</p>
                    <p><strong>Tanggal Berakhir:</strong> {{ $ownedFundDonation->end_date->format('d F Y') }}</p>
                    <a href="#" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                </div>
            </div>
        </div>
    @endforeach
</div>