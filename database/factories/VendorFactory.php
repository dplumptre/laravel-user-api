<?php

namespace Database\Factories;

use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;



class VendorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vendor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $com = $this->faker->company." Plc";
        
        return [
            'name' => $com,
            'slug' => Str::slug($com, '-'),
            'member_number' => $this->faker->randomNumber($nbDigits = null, $strict = false),
        ];
    }
}
