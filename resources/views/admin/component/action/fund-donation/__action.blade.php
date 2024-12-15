<div class="d-flex align-items-center gap-2">
    {{-- <a href="{{ route('profile.show', $data->id) }}" class="mx-1"> --}}
    <a href="#" class="mx-1">
       <i class="fa fa-eye" aria-hidden="true" title="Lihat Kampanye"></i>
    </a>

    <form action="{{ route('admin.verifyDonation', $data->id) }}" method="POST" class="mb-0">
        @csrf
        @method('PATCH')
        <input type="hidden" name="decision" value="4">
        <button type="submit" class="text-success border-0" style="background-color: transparent;">
           <i class="fa fa-check" title="Terima Proposal Kampanye Donasi Uang"></i>
        </button>
    </form>

    <form action="{{ route('admin.verifyDonation', $data->id) }}" method="POST" class="mb-0">
        @csrf
        @method('PATCH')
        <input type="hidden" name="decision" value="3">
        <button type="submit" class="text-danger border-0" style="background-color: transparent;">
            <i class="fa fa-x" title="Tolak Proposal Kampanye Donasi Uang"></i>
        </button>
    </form>
</div>