<?php

namespace Database\Factories;

use App\Models\Nasabah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nasabah>
 */
class NasabahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $nasabah = Nasabah::class;
    public function definition(): array
    {
        return [
            'NasabahId' => $this->faker->numerify('9185100####'),
            'LoanId' => $this->faker->numerify('91851##########'),
            'Siklus' => $this->faker->numberBetween(1, 6),
            'TanggalPencairan' => $this->faker->dateTimeBetween('2019-01-01', '2023-12-31')->format('Y-m-d'),
            'TanggalPencairanValue' => $this->faker->dateTimeBetween('2019-01-01', '2023-12-31')->format('Y-m-d'),
            'NamaFile' => $this->faker->sentence(2) . 'pdf',
            'StartingDateGP' => $this->faker->dateTimeBetween('2023-01-01', '2023-02-28')->format('Y-m-d'),
            'EndDateGP' => $this->faker->dateTimeBetween('2023-01-01', '2023-02-28')->format('Y-m-d'),
            'StatusEksekusiTIF' => $this->faker->randomElement([
                'Modifikasi',
                'Sesuai'
            ]),
            'DateEksekusiTIF' => $this->faker->date('Y-m-d'),
            'StartingDateGP_Penyesuaian' => $this->faker->dateTimeBetween('2022-01-01', '2022-12-31')->format('Y-m-d'),
            'EndDateGP_Penyesuaian' => $this->faker->dateTimeBetween('2023-01-01', '2023-12-31')->format('Y-m-d'),
            'Status' => $this->faker->randomElement([
                'Tidak Ada Jadwal',
                'Masih ada Jadwal',
                'Pembiayaan Lunas',
            ])
        ];
    }
}
