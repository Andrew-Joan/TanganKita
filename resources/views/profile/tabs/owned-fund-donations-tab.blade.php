<div class="row g-4">
    @foreach ($ownedFundDonations as $ownedFundDonation)
        @php
            $percentage = ceil($ownedFundDonation->amount / $ownedFundDonation->target * 100) . '%';
            $bgColor = $ownedFundDonation->status_id === 1 ? 'bg-warning' : ($ownedFundDonation->status_id === 4 ? 'bg-success' : 'bg-danger');
        @endphp
        <div class="col-md-6">
            <div class="card shadow rounded-4 border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-primary">{{ $ownedFundDonation->title }}</h5>
                        <div class="badge {{ $bgColor }} text-light">{{ $ownedFundDonation->status->name }}</div>
                    </div>
                    <p class="mb-1"><strong>Target:</strong> Rp. {{ number_format($ownedFundDonation->target, 0, ',', '.') }}</p>
                    <p class="mb-1"><strong>Terkumpul:</strong> Rp. {{ number_format($ownedFundDonation->amount, 0, ',', '.') }}</p>
                    <div class="progress mb-1" style="height: 8px;">
                        <div class="progress-bar" role="progressbar" style="width: {{ $percentage }};"></div>
                    </div>
                    <p class="text-muted">{{ $percentage }} Terkumpul</p>
                    <p class="mb-1"><strong>Tanggal Buka:</strong> {{ $ownedFundDonation->start_date->format('d F Y') }}</p>
                    <p class="mb-2"><strong>Tanggal Berakhir:</strong> {{ $ownedFundDonation->end_date->format('d F Y') }}</p>
                    <div class="d-flex mb-0 gap-2">
                        <a href="#" class="btn btn-outline-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a href="#" class="btn btn-outline-warning btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a>
                        <form action="{{ route('fund-donation.destroy', $ownedFundDonation->id) }}" method="POST" class="mb-0">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                               <i class="fa fa-trash" title="Hapus Kampanye Donasi Uang"></i>
                            </button>
                         </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>