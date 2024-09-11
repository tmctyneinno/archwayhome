<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;

class Recaptcha implements Rule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Check if the reCAPTCHA value is empty
        if (empty($value)) {
            return false; // Trigger the 'required' validation message
        }

        // Send request to Google reCAPTCHA verification server
        $response = Http::asForm()->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'secret' => env('RECAPTCHA_SECRET_KEY'),
                'response' => $value
            ]
        );

        // Decode the response from Google
        $responseBody = json_decode($response->body(), true);

        // Check if the 'success' key is present and true
        return isset($responseBody['success']) && $responseBody['success'];
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The reCAPTCHA verification failed. Please try again.';
    }
}
