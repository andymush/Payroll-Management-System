<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employees;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employees>
 */
class EmployeesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Employees::class;

    public function definition(): array
    {
        return [
            'emp_code' => $this->faker->unique()->randomNumber(5),
            'emp_password' => $this->faker->password(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'emp_email' => $this->faker->unique()->safeEmail(),
            'emp_phone' => $this->faker->phoneNumber(),
            'emp_country' => $this->faker->country(),
            'emp_address' => $this->faker->address(),
            'emp_city' => $this->faker->city(),
            'identification_number' => $this->faker->randomNumber(5),
            'identification_document' => $this->faker->randomElement(['Passport', 'Driving License', 'National ID']),
            'joining_date' => $this->faker->date(),
            'photo' => $this->faker->imageUrl(),
            'designation' => $this->faker->jobTitle(),
            'department' => $this->faker->randomElement(['IT', 'HR', 'Finance', 'Marketing']),
            'bank_name' => $this->faker->randomElement(['Bank of America', 'Chase', 'Wells Fargo', 'Citibank']),
            'bank_account_number' => $this->faker->bankAccountNumber(),
        ];
    }
}
