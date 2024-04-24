<?php

namespace Dasundev\PayHere\Http\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class WebhookRequest extends FormRequest
{
    public function isRecurring(): bool
    {
        return $this->request->get('recurring') === 1;
    }
}