<?php

namespace App\Rules;

use Illuminate\Support\Carbon;
use Illuminate\Contracts\Validation\Rule;

class TimeBetween implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $pickupDate = Carbon::parse($value);
        $pickupTime = Carbon::createFromtime($pickupDate->hour, $pickupDate->minute, $pickupDate->second);
        // when the restaurant is open
        $earliesTime = Carbon::createFromTimeString('17:00:00');
        $lastTime = Carbon::createFromTimeString('23:00:00');
        return $pickupTime->between($earliesTime, $lastTime) ? true : false;

        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'XD';
    }
}
