<?php

namespace Tests\Unit;

use App\Http\Requests\ReserveRestaurantRequest;
use Faker\Factory;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ReserveRestaurantTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @dataProvider provideValidData
     *
     */
    public function test_valid_firstname(array $data)
    {
        $request = new ReserveRestaurantRequest();
        $validator = Validator::make($data, $request->rules());

        $this->assertTrue($validator->passes());
    }

    public function provideValidData(): array
    {
        $faker = Factory::create(Factory::DEFAULT_LOCALE);

        return [
            [[
                "date" => "07-07-2021",
                "time" => '20:00',
                "firstname" => 'Milan',
                "lastname" => 'test',
                "email" => 'milan@gmail.com',
                "address" => 'Berlengakade 25',
                "postal_code" => '3446BG',
                "city" => 'Woerden',
            ]],
            [[
                "date" => "07-07-2021",
                "time" => '20:00',
                "firstname" => $faker->firstName,
                "lastname" => $faker->lastName,
                "email" => $faker->email,
                "address" => $faker->address,
                "postal_code" => '3446BG',
                "city" => $faker->word,
            ]],
        ];
    }
}
