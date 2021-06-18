<?php

namespace Tests\Unit;

use App\Http\Requests\Event\ReserveEventRequest;
use Faker\Factory;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ReserveEventTest extends TestCase
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
        $request = new ReserveEventRequest();
        $validator = Validator::make($data, $request->rules());

        $this->assertTrue($validator->passes());
    }

    public function provideValidData(): array
    {
        $faker = Factory::create(Factory::DEFAULT_LOCALE);

        return [
            [[
                "name" => $faker->name,
                "email" => $faker->email,
                "ticket_number" =>  $faker->randomDigit + 1,
                "start_date" => '01-06-2021',
                "days_count" => $faker->randomDigit + 1,
            ]],
        ];
    }
}
