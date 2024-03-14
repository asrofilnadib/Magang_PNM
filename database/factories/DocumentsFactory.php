<?php

namespace Database\Factories;

use App\Models\Documents;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Documents>
 */
class DocumentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $document = Documents::class;
    public function definition(): array
    {
        $Division = $this->faker->randomElement(['Divisi PBM', 'Divisi PBI', 'Divisi BUM']);
        $DivisionNumber = $this->faker->numberBetween(1, 5);
        $Surat = $this->faker->randomElement(['OPR', 'OBS', 'LBS']);
        $Romawi = $this->faker->randomElement(['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'XI', 'X', 'XI', 'XII']);
        $Years = $this->faker->randomElement(['2022', '2023', '2024']);
        $PerihalMemoOBS = $this->faker->randomElement([
            'Akibat Banjir dan Longsor',
            'Akibat Bencana',
            'Akibat Covid',
            'Akibat Gempa Bumi',
            'Akibat Kebakaran',
            'Akibat Banjir',
            'Akibat Banjir Bandang',
            'Akibat Erupsi Gunung, Banjir, Tanah Longsor',
            'Akibat Longsor',
            'Akibat Penggusuran',
            'Akibat Puting Beliung',
            'Akibat Tanah Longsor dan Kebanjiran',
            'Akibat Angin Puting Beliung',
            'Akibat Banjir Bandang Semeru',
            'Akibat Banjir Lahar Dingin Semeru',
            'Akibat Erupsi Gunung',
            'Akibat Erupsi Gunung Lewotobi',
            'Akibat Jembatan Terputus',
            'Akibat Kebakaran Rumah',
            'Akibat Petir',
            'Akibat Wilayah Perang Antar Daerah',
            'Akibat Libur Nyepi',
            'Akibat Gempa Bumi dan Banjir',
            'Akibat Tsunami Kecil',
            'AKibat Wabah Penyakit',
            'Akibat Wabah PMK',
            'Akibat Gelombang Tinggi Latut',
            'Akibat Wabah PMK dan Banjir',
            'Akibat Banjir dan Kebakaran',
            'Akibat Banjir Bandang dan Kebakaran',
        ]);
        $PerihalMemoOBS1 = $this->faker->randomElement(['PBM 1', 'PBM 2', 'PBM 3', 'PBI 1', 'PBI 2', 'PBI 3', 'PBI 4', 'BUM 1', 'BUM 2', 'BUM 3']);
        $NoMemoAsal1 = $this->faker->randomElement(['PBM1', 'PBM2', 'PBM3', 'PBI1', 'PBI2', 'PBI3', 'PBI4', 'BUM1', 'BUM2', 'BUM3']);

        return [
//            'Id' => $this->faker->numberBetween(134, 406),
            'NamaFile' => $this->faker->sentence(2) . 'pdf' ,
            'TanggalTerima' => $this->faker->dateTimeBetween('2022-01-01', '2023-12-31')->format('Y-m-d'),
            'DivisiAsal' => $Division.' '.$DivisionNumber,
            'NoMemoAsal' => $this->faker->numerify('M-###/PNM-'.$Surat.'/'.$Romawi.'/'.$Years),
            'PerihalMemoAsal' => 'Pengajuan Grace Period Kondisi Tertentu '.$PerihalMemoOBS1.$PerihalMemoOBS,
            'TanggalKirim' => $this->faker->dateTimeBetween('2020-01-01', '2021-12-31')->format('Y-m-d'),
            'NoMemoOBS' => $this->faker->numerify('M-####/PNM-'.$NoMemoAsal1.'/'.$Romawi.'/'.$Years),
            'PerihalMemoOBS' => 'Pengajuan Grace Period Kondisi Tertentu '.$PerihalMemoOBS1.$PerihalMemoOBS,
            'NoTiket' => $this->faker->numerify('T-###-PNM'),
            'StatusTiket' => 'Belum Kirim Ticket',
            'JenisGP' => $this->faker->randomElement(['bencana', 'bencana', 'bencana', 'bencana', 'bencana', 'hari raya', 'covid']),
        ];
    }
}
