<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use function Symfony\Component\Translation\t;

class NasabahResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nasabahId' => $this->NasabahId,
            'loanId' => $this->LoanId,
            'siklus' => $this->Siklus,
            'tanggalPencairan' => $this->TanggalPencairan,
            'tanggalPencairanValue' => $this->TanggalPencairanValue,
            'namaFile' => $this->NamaFile,
            'startingDateGP' => $this->StartingDateGP,
            'endDateGP' => $this->EndDateGP,
            'statusEksekusiTIF' => $this->StatusEksekusiTIF,
            'dateEksekusiTIF' => $this->DateEksekusiTIF,
            'startingDateGP_Penyesuaian' => $this->StartingDateGP_Penyesuaian,
            'endDateGP_Penyesuaian' => $this->EndDateGP_Penyesuaian,
            'status' => $this->Status,
        ];
    }
}
