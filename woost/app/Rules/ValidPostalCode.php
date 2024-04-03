<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Services\GoogleMapService;

class ValidPostalCode implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $service = new GoogleMapService();
        $result = $service->searchCityByPostalCode($value);

    if (isset($result['error']))
    {
        $fail("Le code postal est invalide.");
    }
    }
}
