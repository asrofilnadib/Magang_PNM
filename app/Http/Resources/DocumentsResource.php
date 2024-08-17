<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DocumentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'namaFile' => $this->NamaFile,
          'tanggalTerima' => $this->TanggalTerima,
          'divisiAsal' => $this->DivisiAsal,
          'noMemoAsal' => $this->NoMemoAsal,
          'perihalMemoAsal' => $this->PerihalMemoAsal,
          'tanggalKirim' => $this->TanggalKirim,
          'noMemoOBS' => $this->NoMemoOBS,
          'perihalMemoOBS' => $this->PerihalMemoOBS,
          'noTiket' => $this->NoTiket,
          'statusTiket' => $this->StatusTiket,
          'jenisGP' => $this->JenisGP
        ];
    }
}
