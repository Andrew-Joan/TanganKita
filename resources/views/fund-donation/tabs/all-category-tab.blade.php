<div class="mb-5 row justify-content-center" style="gap: 6em;">
    @foreach ($allFundDonations as $allFundDonation)
        @php
            $percentage = ceil($allFundDonation->amount / $allFundDonation->target * 100);
            // modalId di all category beda dari yang lain karena kalo dibuat donate-fund-{id} juga, bakal error karena bakal ada 2 modal dengan id yg sama.
            $modalId = 'all-categories-donate-fund-' . $allFundDonation->id; 
        @endphp
        <div class="py-2 border shadow col-md-3 rounded-4">
            <div class="campaign-card">
                <div class="p-3">
                    @if ($allFundDonation->image != null)
                        <img class="object-fit-cover w-100 rounded-3" src="{{ asset('storage/' . $allFundDonation->image) }}" alt="Campaign Image" style="width: 300px; height:200px;">
                    @else
                        <img class="object-fit-cover w-100 rounded-3" src="https://via.placeholder.com/300x200" alt="Campaign Image">
                    @endif                
                    <div class="py-2 text-body-tertiary fw-medium small">{{ $allFundDonation->category->name }}</div>
                    
                    <h5>
                        <a href="{{ route('fund-donation.show', $allFundDonation->id) }}" class="text-black">
                            {{ $allFundDonation->title }}
                        </a>
                    </h5>

                    <div class="my-3 d-flex align-items-center" style="width: 100%;">
                        <div class="progress" style="height: 5px;flex-grow: 1;">
                            <div class="progress-bar" role="progressbar" style="width: {{ $percentage }}%;"></div>
                        </div>
                        <span class="ms-2 text-body-tertiary small fw-bold">{{ $percentage }}%</span>
                    </div>

                    <div class="mt-2 d-flex justify-content-center align-items-center">
                        @if ($allFundDonation->user_id === auth()->id())
                        <a href="#" class="px-4 btn btn-outline-success rounded-pill">Lihat Detail</a>
                        @else
                            <a href="#" class="px-4 triggerModal btn btn-outline-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#{{ $modalId }}">Donate Now</a>
                            @include('fund-donation.modals.donate-fund', ['donation' => $allFundDonation, 'modalId' => $modalId])
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

{{ 
    $allFundDonations->appends([
        'disasterDonations' => $disasterDonations->currentPage(),
        'educationDonations' => $educationDonations->currentPage(),
        'healthDonations' => $healthDonations->currentPage()
    ])->links() 
}}