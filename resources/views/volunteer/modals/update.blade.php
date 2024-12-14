<div class="modal fade" id="updateVolunteer-{{ $ownedVolunteer->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
      	<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-center" id="staticBackdropLabel">Perbaharui Informasi Kegiatan Relawan</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body text-secondary text-start">
				<form action="{{ route('volunteer.update', $ownedVolunteer->id) }}" method="POST" id="updateVolunteerForm-{{ $ownedVolunteer->id }}" class="row gap-3" enctype="multipart/form-data">
					@csrf
					@method('PATCH')
					<input type="hidden" name="id" value="{{ $ownedVolunteer->id }}">
					<input type="hidden" name="user_id" value="{{ auth()->id() }}">
					<div class="mb-2">
						<label for="title" class="form-label text-dark">Judul Kegiatan Relawan</label>
						<input type="text" class="form-control" id="title" name="title" placeholder="Judul kegiatan..." value="{{ old('title', $ownedVolunteer->title) }}">
					</div>
					<div>
						<label for="category_id" class="form-label text-dark">Kategori Kegiatan Relawan</label>
						<select class="form-select" name="category_id" id="category_id">
						<option value="all">Pilih Kategori</option>
						@foreach ($categories as $category)
							@if ($category->id === $ownedVolunteer->category_id)
								<option selected value="{{ $category->id }}">Kategori {{ $category->name }}</option>
							@else
								<option value="{{ $category->id }}">Kategori {{ $category->name }}</option>
							@endif
						@endforeach
						</select>
					</div>
					<div class="mb-2">
						<label for="description" class="form-label text-dark">Deskripsi Kegiatan Relawan</label>
						<input id="description" type="hidden" name="description" value="{{ old('description', $ownedVolunteer->description)  }}">
						<trix-editor input="description"></trix-editor>
					</div>
					<div class="row d-flex align-items-end">
						<div class="col">
							<label for="target" class="form-label text-dark">Maksimum Kapasitas (Jumlah Orang)</label>
							<input id="number" class="form-control" name="target" value="{{ old('target', $ownedVolunteer->target) }}">
						</div>
						<div class="col">
							<div class="form-label text-dark"><i class="fa-solid fa-calendar-days mx-1"></i><label for="endDate" class="text-dark">Tanggal Berakhir</label></div>
							<input type="date" value="{{ old('end_date', $ownedVolunteer->end_date->format('Y-m-d')) }}" class="form-control" id="endDate" name="end_date" placeholder="Tanggal berakhir..." required autocomplete="off">
						</div>
					</div>
					<div class="mb-3">
						<label for="image" class="form-label text-dark">Gambar Kegiatan Relawan</label>
						<input class="form-control" type="file" id="update-image-volunteer-{{ $ownedVolunteer->id }}" name="image" onchange="previewImage{{ $ownedVolunteer->id }}()" accept=".png, .jpg, .img">
						@if ($ownedVolunteer->image)
							<img src="data:image/png;base64,{{ $ownedVolunteer->image }}" id="update-image-volunteer-{{ $ownedVolunteer->id }}-preview" class="img-preview img-fluid mt-2 col-sm-5 d-block mx-auto d-block">
						@else
							<img class="img-preview img-fluid mt-2 col-sm-5 d-block mx-auto d-block" id="update-image-volunteer-{{ $ownedVolunteer->id }}-preview">
						@endif
						</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Batal</button>
						<button type="submit" class="btn btn-success" id=""><i class="fa-regular fa-add pe-1"></i>Buat Kegiatan Relawan</button>
					</div>
				</form>
			</div>
    	</div>
    </div> 
</div>

{!! JsValidator::formRequest(
	'App\Http\Requests\Volunteer\UpdateVolunteerRequest',
	Crypt::encrypt(['selector' => "#updateVolunteerForm-{$ownedVolunteer->id}", 'need_loading' => true]),
) !!}
<script>
	document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })

    function previewImage{{ $ownedVolunteer->id }}()
    {
        const img = document.querySelector("#update-image-volunteer-{{ $ownedVolunteer->id }}");
        const imgPreview = document.querySelector("#update-image-volunteer-{{ $ownedVolunteer->id }}-preview");
        const blob = URL.createObjectURL(img.files[0]);

        imgPreview.src = blob;
    }
</script>