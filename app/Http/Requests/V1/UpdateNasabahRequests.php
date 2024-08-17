<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateNasabahRequests extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = Auth::user();

        return $user != null && $user->tokenCan('update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();

        return $method == 'PUT' ? [
            'nasabahId' => ['required', 'regex:/^9185100\d{4}$/'],
            'loanId' => ['required', 'regex:/^91851\d{10}$/'],
            'siklus' => ['required', 'integer', 'between:1,6'],
            'tanggalPencairan' => ['required', 'date', 'before_or_equal:2023-12-31', 'after_or_equal:2019-01-01'],
            'tanggalPencairanValue' => ['required', 'date', 'before_or_equal:2023-12-31', 'after_or_equal:2019-01-01'],
            'namaFile' => ['required', 'integer', 'between:134,406'],
            'StartingDateGP' => ['required', 'date', 'before_or_equal:2023-12-31', 'after_or_equal:2022-01-01'],
            'EndDateGP' => ['required', 'date', 'before_or_equal:today', 'after_or_equal:2023-01-01'],
            'StatusEksekusiTIF' => ['required', Rule::in(
                'Modifikasi',
                'Sesuai',
                'LAYAK',
                'LAYAK TANPA PENYESUAIAN',
                'LAYAK TANPA ADA PENYESUAIAN',
                'LAYAK DENGAN PENYESUAIAN')],
            'DateEksekusiTIF' => ['required', 'date'],
            'StartingDateGP_Penyesuaian' => ['required', 'date', 'before_or_equal:2022-12-31', 'after_or_equal:2022-01-01'],
            'EndDateGP_Penyesuaian' => ['required', 'date', 'before_or_equal:2023-12-31', 'after_or_equal:2023-01-01'],
            'Status' => ['required', Rule::in(
                'Tidak Ada Jadwal',
                'Masih Ada Jadwal',
                'Pembiayaan Lunas')],
        ] : [
            'nasabahId' => ['sometimes', 'required', 'regex:/^9185100\d{4}$/'],
            'loanId' => ['sometimes', 'required', 'regex:/^91851\d{10}$/'],
            'siklus' => ['sometimes', 'required', 'integer', 'between:1,6'],
            'tanggalPencairan' => ['sometimes', 'required', 'date', 'before_or_equal:2023-12-31', 'after_or_equal:2019-01-01'],
            'tanggalPencairanValue' => ['sometimes', 'required', 'date', 'before_or_equal:2023-12-31', 'after_or_equal:2019-01-01'],
            'namaFile' => ['sometimes', 'required', 'integer', 'between:134,406'],
            'StartingDateGP' => ['sometimes', 'required', 'date', 'before_or_equal:2023-12-31', 'after_or_equal:2022-01-01'],
            'EndDateGP' => ['sometimes', 'required', 'date', 'before_or_equal:today', 'after_or_equal:2023-01-01'],
            'StatusEksekusiTIF' => ['sometimes', 'required', Rule::in(
                'Modifikasi',
                'Sesuai',
                'LAYAK',
                'LAYAK TANPA PENYESUAIAN',
                'LAYAK TANPA ADA PENYESUAIAN',
                'LAYAK DENGAN PENYESUAIAN')],
            'DateEksekusiTIF' => ['sometimes', 'required', 'date'],
            'StartingDateGP_Penyesuaian' => ['sometimes', 'required', 'date', 'before_or_equal:2022-12-31', 'after_or_equal:2022-01-01'],
            'EndDateGP_Penyesuaian' => ['sometimes', 'required', 'date', 'before_or_equal:2023-12-31', 'after_or_equal:2023-01-01'],
            'Status' => ['sometimes', 'required', Rule::in(
                'Tidak Ada Jadwal',
                'Masih Ada Jadwal',
                'Pembiayaan Lunas')],
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->NasabahId) {
            $this->merge([
                'nasabahId' => $this->NasabahId,
                'loanId' => $this->LoanId,
                'siklus' => $this->Siklus,
                'tanggalPencairan' => $this->TanggalPencairan,
                'tanggalPencairanValue' => $this->TanggalPencairanValue,
                'namaFile' => $this->NamaFile,
            ]);
        }
    }
}
