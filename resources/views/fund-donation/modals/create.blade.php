<div class="modal fade" id="createFundDonation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
      	<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-center" id="staticBackdropLabel">Buka Donasi Uang</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body text-secondary">
				<form action="{{ route('fund-donation.store') }}" method="POST" id="createFundDonationForm" class="row gap-3" enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="user_id" value="{{ auth()->id() }}">
					<div class="mb-2">
						<label for="text" class="form-label text-dark">Judul Donasi</label>
						<input type="text" class="form-control" id="title" name="title" placeholder="Masukkan Judul Donasi...">
					</div>
					<div>
						<label for="category_id" class="form-label text-dark">Kategori Donasi</label>
						<select class="form-select" name="category_id" id="category_id">
						<option value="all">Pilih Kategori</option>
							@foreach($categories as $category)
							<option value="{{ $category->id }}">Kategori {{ $category->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="mb-2">
						<label for="description" class="form-label text-dark">Deskripsi Donasi</label>
						<input id="description" type="hidden" name="description" value="{{ old('description') }}">
						<trix-editor input="description"></trix-editor>
					</div>
					<div class="mb-2">
						<label for="target" class="form-label text-dark">Target Donasi (Dalam Rupiah)</label>
						<input id="text" class="form-control" name="target" value="{{ old('target') }}">
					</div>
					<div class="row">
						<div class="col">
							<label class="form-label text-dark"><i class="fa-solid fa-calendar-days mx-1"></i><label for="startDate" class="text-dark">Tanggal Buka</label></label>
							<input type="text" class="form-control" id="startDate" name="start_date" value="{{ Carbon\Carbon::now()->format('d/m/Y') }}" disabled> 
						</div>
						<div class="col">
							<div class="form-label text-dark"><i class="fa-solid fa-calendar-days mx-1"></i><label for="endDate" class="text-dark">Tanggal Tutup</label></div>
							<input type="date" class="form-control" id="endDate" name="end_date" placeholder="Tanggal ditutup" required autocomplete="off">
						</div>
					</div>
					<div class="mb-3">
						<label for="image" class="form-label text-dark">Gambar Donasi</label>
						<input class="form-control" type="file" id="image" name="image" onchange="previewImage()" accept=".png, .jpg, .img">
						<img class="img-preview img-fluid mt-2 col-sm-5 d-block mx-auto d-block">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Batal</button>
						<button type="submit" class="btn btn-success" id=""><i class="fa-regular fa-add pe-1"></i>Buka Donasi</button>
					</div>
				</form>
			</div>
    	</div>
    </div> 
</div>

{!! JsValidator::formRequest(
	'App\Http\Requests\FundDonation\CreateFundDonationRequest',
	Crypt::encrypt(['selector' => '#createFundDonationForm', 'need_loading' => true]),
) !!}
<script>
	document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })

    function previewImage()
    {
        const img = document.querySelector("#image");
        const imgPreview = document.querySelector(".img-preview");

        // versi lebih panjangnya
        // const oFReader = new FileReader();
        // oFReader.readAsDataURL(image.files[0]);

        // oFReader.onload = function(oFREvent) {
        //     imgPreview.src = oFREvent.target.result;
        // }
        
        // versi lebih pendeknya
        const blob = URL.createObjectURL(image.files[0]);
        imgPreview.src = blob;
    }
</script>