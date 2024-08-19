<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FooterController extends Controller
{
    public static function LabelFooter()
    {
        $table = DB::table('stmik_footer')->where('footer_sub_menu', '0')->get();
        return $table;
    }
}
