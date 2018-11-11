<?php

namespace App;

class Time
{
    public static function getTimeOfDayGreeting()
    {
        $currentTime = date('H');

        // TODO(TGEnigma): L10n
        if ( $currentTime >= 0 && $currentTime < 6 )
        {
            return "Goedenacht";
        }
        else if ( $currentTime >= 6 && $currentTime < 12 )
        {
            return "Goedemorgen";
        }
        else if ( $currentTime >= 12 && $currentTime < 18 )
        {
            return "Goedemiddag";
        }
        else if ( $currentTIme >= 18)
        {
            return "Goedenavond";
        }

        assert(false);
    }
}