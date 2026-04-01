<?php

namespace Database\Factories;

use App\Enums\CheckPageTemplate;
use App\Models\PaymentCheck;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PaymentCheck>
 */
class PaymentCheckFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'template' => CheckPageTemplate::Classic,
            'document_number' => 'MB/'.$this->faker->year().'/KR-'.$this->faker->numerify('######'),
            'bank_name' => $this->faker->company(),
            'card_number' => '1234 5678 9012 3456',
            'receiver_name' => $this->faker->name(),
            'amount_hint' => 'Тўланадиган суммани менеджердан аниқлаштиринг',
            'amount_display' => $this->faker->name(),
            'status_label' => 'Тўловга тайёр',
            'receipt_button_url' => null,
        ];
    }
}
