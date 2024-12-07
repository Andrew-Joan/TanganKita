<div class="row justify-content-center mb-5" style="gap: 6em;">
    @foreach ($educationDonations as $educationDonation)
        @php
            $percentage = ceil($educationDonation->amount / $educationDonation->target * 100);
            $modalId = 'donate-fund-' . $educationDonation->id;
        @endphp
        <div class="col-md-3 shadow rounded-4 py-2 border">
            <div class="campaign-card">
                <div class="p-3">
                    @if ($educationDonation->image != null)
                        <img class="object-fit-cover w-100 rounded-3" src="{{ asset('storage/' . $educationDonation->image) }}" alt="Campaign Image" style="width: 300px; height:200px;">
                    @else
                        <img class="object-fit-cover w-100 rounded-3" src="https://via.placeholder.com/300x200" alt="Campaign Image">
                    @endif   
                    <div class="text-body-tertiary fw-medium py-2 small">{{ $educationDonation->category->name }}</div>
                    <h5>{{ $educationDonation->title }}</h5>
                    <div class="d-flex align-items-center my-3" style="width: 100%;">
                        <div class="progress" style="height: 5px;flex-grow: 1;">
                            <div class="progress-bar" role="progressbar" style="width: {{ $percentage }}%;"></div>
                        </div>
                        <span class="ms-2 text-body-tertiary small fw-bold">{{ $percentage }}%</span>
                    </div>

                    <div class="d-flex justify-content-center align-items-center mt-2">
                        <a href="#" class="btn btn-outline-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#{{ $modalId }}">Donate Now</a>
                        @include('fund-donation.modals.donate-fund', ['donation' => $educationDonation, 'modalId' => $modalId])
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

{{ 
    $educationDonations->appends([
        'allFundDonations' => $allFundDonations->currentPage(),
        'disasterDonations' => $disasterDonations->currentPage(),
        'healthDonations' => $healthDonations->currentPage()
    ])->links() 
}}