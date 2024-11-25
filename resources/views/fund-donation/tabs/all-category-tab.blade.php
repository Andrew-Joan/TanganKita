<div class="row justify-content-center mb-5" style="gap: 6em;">
    @foreach ($allFundDonations as $allFundDonation)
        @php
            $percentage = ceil($allFundDonation->amount / $allFundDonation->target * 100);
        @endphp
        <div class="col-md-3 shadow rounded-4 py-2 border">
            <div class="campaign-card">
                <div class="p-3">
                    <img class="object-fit-cover w-100 rounded-3" src="https://via.placeholder.com/300x200" alt="Campaign Image">
                
                    <div class="text-body-tertiary fw-medium py-2 small">{{ $allFundDonation->category->name }}</div>
                    <h5>{{ $allFundDonation->title }}</h5>
                    <div class="d-flex align-items-center my-3" style="width: 100%;">
                        <div class="progress" style="height: 5px;flex-grow: 1;">
                            <div class="progress-bar" role="progressbar" style="width: {{ $percentage }}%;"></div>
                        </div>
                        <span class="ms-2 text-body-tertiary small fw-bold">{{ $percentage }}%</span>
                    </div>

                    <div class="d-flex justify-content-center align-items-center mt-2">
                        <a href="#" class="btn btn-outline-primary rounded-pill px-4">Donate Now</a>
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