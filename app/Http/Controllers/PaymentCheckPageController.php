<?php

namespace App\Http\Controllers;

use App\Enums\CheckPageTemplate;
use App\Models\PaymentCheck;
use Illuminate\Contracts\View\View;

class PaymentCheckPageController extends Controller
{
    public function show(string $slug): View
    {
        $paymentCheck = PaymentCheck::query()
            ->where('public_slug', $slug)
            ->firstOrFail();

        $template = $paymentCheck->template instanceof CheckPageTemplate
            ? $paymentCheck->template
            : CheckPageTemplate::Classic;

        return view($template->viewName(), [
            'paymentCheck' => $paymentCheck,
        ]);
    }
}
