<?php

namespace App\Http\Controllers;

class RandomController extends Controller
{
    public static function Digit($digit)
    {
        // $digit = 2 => 4 digit return
        // Generate a random string.
        $token = openssl_random_pseudo_bytes($digit);

        // Convert the binary data into hexadecimal representation.
        $token = bin2hex($token);

        // Print it out for example purposes.
        return $token;
    }
}
