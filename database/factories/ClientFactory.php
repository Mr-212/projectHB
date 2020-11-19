<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'applicant_name' => $this->faker->name,
            'applicant_email' => $this->faker->unique()->safeEmail,
            'applicant_phone' => $this->faker->unique()->phoneNumber,
            'co_applicant_name' => $this->faker->unique()->name,
            'co_applicant_phone' => $this->faker->unique()->phoneNumber,
            'co_applicant_email' => $this->faker->unique()->email,
            'partner_name' => $this->faker->unique()->name,
            'partner_email' => $this->faker->unique()->email,
            'partner_phone' => $this->faker->unique()->phoneNumber,
            'created_by' => 1,
        ];
    }
}
