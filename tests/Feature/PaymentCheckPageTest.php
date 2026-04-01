<?php

use App\Enums\CheckPageTemplate;
use App\Models\PaymentCheck;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('public payment check page shows stored fields', function () {
    $check = PaymentCheck::factory()->create();

    $this->get(route('payment-checks.show', ['slug' => $check->public_slug]))
        ->assertOk()
        ->assertSee($check->document_number, escape: false)
        ->assertSee($check->bank_name, escape: false);
});

test('unknown slug returns not found', function () {
    $this->get(route('payment-checks.show', ['slug' => 'no-such-check-xyz']))
        ->assertNotFound();
});

test('custom slug test works in url', function () {
    $check = PaymentCheck::factory()->create(['public_slug' => 'test']);

    expect($check->public_slug)->toBe('test');

    $this->get(route('payment-checks.show', ['slug' => 'test']))
        ->assertOk()
        ->assertSee($check->document_number, escape: false);
});

test('public payment check page uses second design when template is dark_mexc', function () {
    $check = PaymentCheck::factory()->create([
        'template' => CheckPageTemplate::DarkMexc,
    ]);

    $this->get(route('payment-checks.show', ['slug' => $check->public_slug]))
        ->assertOk()
        ->assertSee($check->bank_name, escape: false)
        ->assertSee('O‘tkazma uchun rekvizitlar', escape: false);
});
