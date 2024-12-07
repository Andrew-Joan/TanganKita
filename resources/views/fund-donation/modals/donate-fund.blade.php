<div class="modal fade" id="{{ $modalId }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="donateFundLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100" id="donateFundLabel">Donasi Uang</h5>
            </div>

            <div class="modal-body text-secondary text-center">
                <form action="{{ route('fund-donation.donate-fund') }}" method="POST" id="donateFundForm-{{ $modalId }}">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    <input type="hidden" name="donation_id" value="{{ $donation->id }}">
                    <div class="mb-3">
                        <label class="form-label text-dark">Judul Donasi</label>
                        <p class="form-control-plaintext fw-bold">{{ $donation->title }}</p>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label class="form-label text-dark">Deskripsi Donasi</label>
                        <p class="form-control-plaintext">{{ $donation->description }}</p>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label class="form-label text-dark">Target Donasi (Dalam Rupiah)</label>
                            <p class="form-control-plaintext fw-bold text-primary">Rp{{ number_format($donation->target, 0, ',', '.') }}</p>
                        </div>
                        <div class="col-6">
                            <label class="form-label text-dark">Donasi Terkumpul</label>
                            <p class="form-control-plaintext fw-bold text-success">Rp{{ number_format($donation->amount, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class=" row mb-3">
                        <div class="col-6">
                            <label class="form-label text-dark">Tanggal Berakhir</label>
                            <p class="form-control-plain-text text-danger fw-bold">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $donation->end_date)->format('d F Y') }}</p>
                        </div>
                        <div class="col-6">
                            <label for="donation_amount" class="form-label text-dark">Jumlah Donasi (Dalam Rupiah)</label>
                            <input type="number" class="form-control mx-auto" id="donation_amount" name="amount" placeholder="Masukkan jumlah donasi...">
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger me-3" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Batal</button>
                        <button type="submit" class="btn btn-success"><i class="fa-regular fa-add pe-1"></i>Donasi Sekarang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


{!! JsValidator::formRequest(
    'App\Http\Requests\Donation\DonateFundRequest',
    Crypt::encrypt(['selector' => "#donateFundForm-{$modalId}", 'need_loading' => true])
) !!}

