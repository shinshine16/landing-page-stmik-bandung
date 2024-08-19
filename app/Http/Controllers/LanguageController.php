<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class LanguageController extends Controller
{
    public static function Langu($language)
    {
        if ($language == "id") {
            $language = "id";
        } else {
            $language = "en";
        }
        return $language;
    }
    public static function FieldLang($content, $lang)
    {
        $result = $content.$lang;
        return $result;
    }
}
