<div class="modal fade" id="updateFundDonation-{{ $donation->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
      	<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-center" id="staticBackdropLabel">Perbaharui Informasi Donasi Uang</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body text-secondary">
				{{-- @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif --}}
				<form action="{{ route('fund-donation.update', $donation->id) }}" method="POST" id="updateFundDonationForm-{{ $donation->id }}" class="row gap-3" enctype="multipart/form-data">
					@csrf
					@method('PATCH')
					<input type="hidden" name="id" value="{{ $donation->id }}">
					<input type="hidden" name="user_id" value="{{ auth()->id() }}">
					<div class="mb-2">
						<label for="title" class="form-label text-dark">Judul Donasi</label>
						<input type="text" class="form-control" id="title" name="title" placeholder="Judul donasi..." value="{{ old('title', $donation->title) }}">
					</div>
					<div>
						<label for="category_id" class="form-label text-dark">Kategori Donasi</label>
						<select class="form-select" name="category_id" id="category_id">
						<option value="all">Pilih Kategori</option>
						@foreach ($categories as $category)
							@if ($category->id === $donation->category_id)
								<option selected value="{{ $category->id }}">Kategori {{ $category->name }}</option>
							@else
								<option value="{{ $category->id }}">Kategori {{ $category->name }}</option>
							@endif
						@endforeach
						</select>
					</div>
					<div class="mb-2">
						<label for="description" class="form-label text-dark">Deskripsi Donasi</label>
						<input id="description" type="hidden" name="description" value="{{ old('description', $donation->description)  }}">
						<trix-editor input="description"></trix-editor>
					</div>
					<div class="row d-flex align-items-end">
						<div class="col">
							<label for="target" class="form-label text-dark">Target Donasi (Dalam Rupiah)</label>
							<input id="number" class="form-control" name="target" value="{{ old('target', $donation->target) }}">
						</div>
						<div class="col">
							<div class="form-label text-dark"><i class="fa-solid fa-calendar-days mx-1"></i><label for="endDate" class="text-dark">Tanggal Berakhir</label></div>
							<input type="date" value="{{ old('end_date', $donation->end_date->format('Y-m-d')) }}" class="form-control" id="endDate" name="end_date" placeholder="Tanggal berakhir..." required autocomplete="off">
						</div>
					</div>
					<div class="mb-3">
						<label for="image" class="form-label text-dark">Gambar Donasi</label>
						<input class="form-control" type="file" id="update-donation-image-{{ $donation->id }}" name="image" onchange="previewImage{{ $donation->id }}()" accept=".png, .jpg, .img">
						@if ($donation->image)
							<img src="data:image/png;base64,{{ $donation->image }}" id="update-donation-image-{{ $donation->id }}-preview" class="img-preview img-fluid mt-2 col-sm-5 d-block mx-auto d-block">
						@else
							<img class="img-preview img-fluid mt-2 col-sm-5 d-block mx-auto d-block" id="update-donation-image-{{ $donation->id }}-preview">
						@endif
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Batal</button>
						<button type="submit" class="btn btn-success" id=""><i class="fa-regular fa-add pe-1"></i>Perbaharui Informasi</button>
					</div>
				</form>
			</div>
    	</div>
    </div> 
</div>

{!! JsValidator::formRequest(
	'App\Http\Requests\FundDonation\UpdateFundDonationRequest',
	Crypt::encrypt(['selector' => "#updateFundDonationForm-{$donation->id}", 'need_loading' => true]),
) !!}
<script>
	document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })

    function previewImage{{ $donation->id }}()
    {
        const img = document.querySelector("#update-donation-image-{{ $donation->id }}");
        const imgPreview = document.querySelector("#update-donation-image-{{ $donation->id }}-preview");
        const blob = URL.createObjectURL(img.files[0]);

        imgPreview.src = blob;
    }
</script>