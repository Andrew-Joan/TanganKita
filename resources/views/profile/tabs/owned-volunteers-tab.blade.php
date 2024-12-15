<div class="row g-4">
    @foreach ($ownedVolunteers as $ownedVolunteer)
        @php
            $percentage = ceil($ownedVolunteer->amount / $ownedVolunteer->target * 100) . '%';
            $bgColor = 'bg-info';
            if ($ownedVolunteer->status_id === 1) {
                $bgColor = 'bg-warning';
            } else if ($ownedVolunteer->status_id === 3) {
                $bgColor = 'bg-danger';
            } else if ($ownedVolunteer->status_id === 4) {
                $bgColor = 'bg-success';
            }
        @endphp
        <div class="col-md-6">
            <div class="card shadow rounded-4 border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-primary">{{ $ownedVolunteer->title }}</h5>
                        <div class="badge {{ $bgColor }} text-dark">{{ $ownedVolunteer->status->name }}</div>
                    </div>
                    <p><strong>Target Anggota:</strong> {{ $ownedVolunteer->target }}</p>
                    <p><strong>Jumlah Anggota Saat ini:</strong> {{ $ownedVolunteer->amount }}</p>
                    <div class="progress mb-3" style="height: 8px;">
                        <div class="progress-bar" role="progressbar" style="width: {{ $percentage }};"></div>
                    </div>
                    <p class="text-muted">{{ $percentage }} Terkumpul</p>
                    <p><strong>Tanggal Buka:</strong> {{ $ownedVolunteer->created_at->format('d F Y') }}</p>
                    <p><strong>Tanggal Berakhir:</strong> {{ $ownedVolunteer->end_date->format('d F Y') }}</p>
                    <div class="d-flex mb-0 gap-2">
                        <a href="{{ route('volunteer.show', $ownedVolunteer->id) }}" class="btn btn-outline-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        
                        <a href="#" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#updateVolunteer-{{ $ownedVolunteer->id }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                        @include('volunteer.modals.update', ['volunteer' => $ownedVolunteer])

                        <form action="{{ route('volunteer.destroy', $ownedVolunteer->id) }}" method="POST" class="mb-0">
                            @csrf
                            @method('delete')
                            <button type="submit" class="deleteVolunteer btn btn-outline-danger btn-sm">
                               <i class="fa fa-trash" title="Hapus Kegiatan Relawan"></i>
                            </button>
                         </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{ 
        $ownedVolunteers->appends([
            'ownedFundDonations' => $ownedFundDonations->currentPage()
        ])->links()
    }}
</div>

<script>
    $(document).ready(function() {
        $('.deleteVolunteer').on('click', function(event) {
            event.preventDefault();

            const form = $(this).closest('form'); // Get the closest form element

            Swal.fire({
                title: 'Hapus kampanye?',
                text: "Apakah anda yakin ingin menghapus kegiatan relawan ini?",
                icon: 'warning',
                showCancelButton: true,
                reverseButtons: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#000000',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>