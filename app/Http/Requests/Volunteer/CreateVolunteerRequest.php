<?php

namespace App\Http\Requests\Volunteer;

use Illuminate\Foundation\Http\FormRequest;

class CreateVolunteerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required',
            'title' => 'required|max:255|unique:volunteers,title',
            'category_id' => 'required|in:1,2,3',
            'description' => 'required',
            'target' => 'required|integer',
            'end_date' => 'required|date',
            'image' => 'required|image|file|max:1024'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Judul Kegiatan Relawan',
            'category_id' => 'Kategori Kegiatan Relawan',
            'image' => 'Gambar Kegiatan Relawan',
            'description' => 'Deskripsi Kegiatan Relawan',
            'target' => 'Maksimum Kapasitas Kegiatan Relawan',
            'end_date' => 'Tanggal Berakhir'
        ];
    }

    public function storeImage()
    {
        if ($this->file('image')) {
            return base64_encode(file_get_contents($this->file('image')));
        }

        return null;
    }
}
