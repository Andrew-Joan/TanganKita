<div class="modal fade createVolunteerModalForm" id="createVolunteer-{{ $volunteerCategoryId }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
      	<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-center" id="staticBackdropLabel">Buat Kegiatan Relawan {{ $volunteerCategory }}</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body text-secondary text-start">
				<form action="{{ route('volunteer.store') }}" method="POST" id="createVolunteerForm-{{ $volunteerCategoryId }}" class="row gap-3" enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    <input type="hidden" name="category_id" value="{{ $volunteerCategoryId }}">
					<div class="mb-2">
						<label for="title" class="form-label text-dark">Judul Kegiatan Relawan</label>
						<input type="text" class="form-control" id="title" name="title" placeholder="Judul kegiatan...">
					</div>
					<div>
						<label for="category" class="form-label text-dark">Kategori Kegiatan Relawan</label>
						<input type="text" class="form-control" id="category" value="{{ $volunteerCategory }}" disabled>
					</div>
					<div class="mb-2">
						<label for="description" class="form-label text-dark">Deskripsi Kegiatan</label>
						<input id="description-{{ $volunteerCategoryId }}" type="hidden" name="description" value="{{ old('description') }}">
                        <trix-editor input="description-{{ $volunteerCategoryId }}"></trix-editor>
					</div>
					<div class="mb-2">
						<label for="target" class="form-label text-dark">Maksimum Kapasitas (Jumlah Orang)</label>
                        <input type="number" class="form-control mx-auto" id="target" name="target" placeholder="Masukkan kapasitas anggota...">
					</div>
					<div class="row">
						<div class="col">
							<label class="form-label text-dark"><i class="fa-solid fa-calendar-days mx-1"></i><label for="startDate" class="text-dark">Tanggal Buka</label></label>
							<input type="text" class="form-control" id="startDate" name="start_date" value="{{ Carbon\Carbon::now()->format('d/m/Y') }}" disabled> 
						</div>
						<div class="col">
							<div class="form-label text-dark"><i class="fa-solid fa-calendar-days mx-1"></i><label for="endDate" class="text-dark">Tanggal Berakhir</label></div>
							<input type="date" class="form-control" id="endDate" name="end_date" placeholder="Tanggal berakhir..." autocomplete="off">
						</div>
					</div>
					<div class="mb-3">
						<label for="image" class="form-label text-dark">Gambar Kegiatan Relawan</label>
						<input class="form-control" type="file" id="image-volunteer{{ $volunteerCategoryId }}" name="image" onchange="previewImage{{ $volunteerCategoryId }}()" accept=".png, .jpg, .img">
						<img class="img-preview img-fluid mt-2 col-sm-5 d-block mx-auto d-block" id="image-volunteer{{ $volunteerCategoryId }}-preview">
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
	'App\Http\Requests\Volunteer\CreateVolunteerRequest',
	Crypt::encrypt(['selector' => "#createVolunteerForm-{$volunteerCategoryId}", 'need_loading' => true]),
) !!}
<script>
	document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })

    function previewImage{{ $volunteerCategoryId }}()
    {
        const img = document.querySelector("#image-volunteer{{ $volunteerCategoryId }}");
        const imgPreview = document.querySelector("#image-volunteer{{ $volunteerCategoryId }}-preview");
        const blob = URL.createObjectURL(img.files[0]);

        imgPreview.src = blob;
    }
</script>