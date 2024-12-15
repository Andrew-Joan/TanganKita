<div class="modal fade" id="apply-volunteer-{{ $volunteer->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="donateFundLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100" id="donateFundLabel">Daftar Kegiatan Relawan</h5>
            </div>

            <div class="modal-body text-secondary text-center">
                <form action="{{ route('volunteer.apply-volunteer') }}" method="POST" id="applyVolunteerForm-{{ $volunteer->id }}">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    <input type="hidden" name="volunteer_id" value="{{ $volunteer->id }}">
                    <input type="hidden" name="status_id" value="1">
                    <div class="mb-3">
                        <label class="form-label text-dark">Judul Kegiatan Relawan</label>
                        <p class="form-control-plaintext fw-bold">{{ $volunteer->title }}</p>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label class="form-label text-dark">Deskripsi Kegiatan Relawan</label>
                        <p class="form-control-plaintext">{!! $volunteer->description !!}</p>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label class="form-label text-dark">Maksimum Kapasitas (Jumlah Relawan)</label>
                            <p class="form-control-plaintext fw-bold text-primary">{{ $volunteer->target }} Relawan</p>
                        </div>
                        <div class="col-6">
                            <label class="form-label text-dark">Jumlah Saat ini:</label>
                            <p class="form-control-plaintext fw-bold text-success">{{ $volunteer->amount }} Relawan</p>
                        </div>
                    </div>
                    <hr>
                    <div class=" row mb-3">
                        <div class="col-6">
                            <label class="form-label text-dark">Tanggal Dibuka</label>
                            <p class="form-control-plain-text fw-bold">{{ $volunteer->start_date->format('d F Y') }}</p>
                        </div>
                        <div class="col-6">
                            <label class="form-label text-dark">Tanggal Berakhir</label>
                            <p class="form-control-plain-text text-danger fw-bold">{{ $volunteer->end_date->format('d F Y') }}</p>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger me-3" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Batal</button>
                        <button type="submit" class="btn btn-success"><i class="fa-regular fa-add pe-1"></i>Daftar Sekarang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


{!! JsValidator::formRequest(
    'App\Http\Requests\Donation\DonateFundRequest',
    Crypt::encrypt(['selector' => "#applyVolunteerForm-{$volunteer->id}", 'need_loading' => true])
) !!}

