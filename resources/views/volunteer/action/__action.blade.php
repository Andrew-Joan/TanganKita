<div class="d-flex align-items-center justify-content-center gap-2">
    <form action="{{ route('volunteer.verify-applicant', $data->id) }}" method="POST" class="mb-0">
        @csrf
        @method('PATCH')
        <input type="hidden" name="decision" value="2">
        <button type="submit" class="text-success border-0" style="background-color: transparent;">
           <i class="fa fa-check" title="Terima Relawan"></i>
        </button>
    </form>

    <form action="{{ route('volunteer.verify-applicant', $data->id) }}" method="POST" class="mb-0">
        @csrf
        @method('PATCH')
        <input type="hidden" name="decision" value="3">
        <button type="submit" class="text-danger border-0" style="background-color: transparent;">
            <i class="fa fa-x" title="Tolak Relawan"></i>
        </button>
    </form>
</div>