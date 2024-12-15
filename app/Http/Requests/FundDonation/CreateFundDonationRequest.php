<?php

namespace App\Http\Requests\FundDonation;

use Illuminate\Foundation\Http\FormRequest;

class CreateFundDonationRequest extends FormRequest
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
            'title' => 'required|max:255|unique:fund_donations,title',
            'category_id' => 'required|in:1,2,3',
            'description' => 'required',
            'target' => 'required|integer',
            'end_date' => 'required|date|after:tomorrow',
            'image' => 'required|image|file|max:1024' //|file|max:... ini ngasih constraint maksimum ukuran file yang bs dimasukkan. //image| artinya input ini hanya menerima image, tidak bisa dimasukkan file lain seperti pdf dll
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Judul Donasi',
            'category_id' => 'Kategori Donasi',
            'image' => 'Gambar Donasi',
            'description' => 'Deskripsi Donasi',
            'target' => 'Target Donasi',
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
