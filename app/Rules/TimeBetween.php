<?php

namespace App\Rules;

use Carbon\Carbon;
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
        $pickupTime = Carbon::createFromTime($pickupDate->hour, $pickupDate->minute, $pickupDate->second);
        //Quand le restaurant est ouvert
        $mididebut = Carbon::createFromTimeString('12:00:00');
        $midifin = Carbon::createFromTimeString('23:00:00');
        $soirdebut = Carbon::createFromTimeString('19:00:00');
        $soirfin = Carbon::createFromTimeString('23:00:00');

        return $pickupTime->between($mididebut, $midifin, $soirdebut, $soirfin ? true : false);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Veuillez renseigner une heure entre 12h00 et 23h00.";
    }
}
