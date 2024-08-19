<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\JsonController;

class AdminController extends Controller
{
    public function Dashboard(Request $request)
    {
        $data = array(
            'ip' => $request->ip(),
            'userAgent' => $request->userAgent(),
            'logPost' => DB::table('stmik_log')->orderBy('log_date_created', 'desc')->limit(5)->get(),
            'visitorCount' => DB::table('stmik_visitor')->count(),
            'postCount' => DB::table('stmik_post')->count(),
            'agendaCount' => DB::table('stmik_agenda')->count(),
            'pimpinanCount' => DB::table('stmik_pimpinan')->count()
        );
        return view("content/admin/dashboard", $data);
    }

    public static function Slugify($text)
    {
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public static function LogPost($ip, $user, $message, $userAgent)
    {
        $id = app('App\Http\Controllers\RandomController')->Digit(5);

        $data = array(
            'log_id' => $id,
            'log_ip' => $ip,
            'log_user' => $user,
            'log_message' => $message,
            'log_user_agent' => $userAgent,
            'log_date_created' => date('Y-m-d H:i:s')
        );
        DB::table('stmik_log')->insert($data);
    }

    public function LogList()
    {
        return view("content/admin/logList");
    }

    public function VisitorList()
    {
        return view("content/admin/visitorList");
    }

    public static function GraphVisitorPerWeek($field)
    {
        $table = DB::table('stmik_visitor')->selectRaw('WEEKDAY(visitor_date_created) AS visitor_week, COUNT(WEEKDAY(visitor_date_created)) AS visitor_week_total')->groupBy('visitor_week')->get();

        $dataArr = [];
        $hari = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');

        foreach ($table as $T) {
            $dataArr['label'][] = $hari[(int)$T->visitor_week];
            $dataArr['data'][] = (int)$T->visitor_week_total;
        }
        return json_encode($dataArr[$field]);
    }

    public static function TotalVisitor($id)
    {
        switch ($id) {
                // Hari Ini
            case 0:
                $table = DB::table('stmik_visitor')->whereRaw('DATE(`visitor_date_created`) = DATE(NOW())')->count();
                echo $table;
                break;

                // Kemarin
            case 1:
                $table = DB::table('stmik_visitor')->whereRaw('DATE(`visitor_date_created`) = DATE(NOW() - INTERVAL 1 DAY)')->count();
                echo $table;
                break;

                // Minggu Lalu
            case 2:
                $table = DB::table('stmik_visitor')->whereRaw('DATE(`visitor_date_created`) = DATE(NOW() - INTERVAL 1 WEEK)')->count();
                echo $table;
                break;

                // Bulan Lalu
            case 3:
                $table = DB::table('stmik_visitor')->whereRaw('DATE(`visitor_date_created`) = DATE(NOW() - INTERVAL 1 MONTH)')->count();
                echo $table;
                break;

                // Tahun Lalu
            case 4:
                $table = DB::table('stmik_visitor')->whereRaw('DATE(`visitor_date_created`) = DATE(NOW() - INTERVAL 1 YEAR)')->count();
                echo $table;
                break;

                // Minggu Ini
            case 5:
                $table = DB::table('stmik_visitor')->whereRaw('DATE(`visitor_date_created`) = DATE(NOW() - INTERVAL 0 WEEK)')->count();
                echo $table;
                break;

                // Bulan Ini
            case 6:
                $table = DB::table('stmik_visitor')->whereRaw('DATE(`visitor_date_created`) = DATE(NOW() - INTERVAL 0 MONTH)')->count();
                echo $table;
                break;

                // Tahun Ini
            case 7:
                $table = DB::table('stmik_visitor')->whereRaw('DATE(`visitor_date_created`) = DATE(NOW() - INTERVAL 0 YEAR)')->count();
                echo $table;
                break;

            default:
                echo 0;
                break;
        }
    }

    public function ProfilUser()
    {
        $data = array(
            'dataArr' => json_decode(JsonController::JsonProfilUser()),
            'post' => DB::table('stmik_v_post')->limit(4)->orderByDesc('post_date_created')->get()
        );
        return view('content/admin/profilUser', $data);
    }

    public function Logout(Request $request)
    {
        $request->session()->forget('stmik_adm_logged');
        $request->session()->forget('stmik_adm_token');
        $request->session()->forget('stmik_adm_id');
        $request->session()->forget('stmik_adm_user');
        $request->session()->forget('stmik_adm_username');
        $request->session()->forget('stmik_adm_level');
        return redirect('/login');
    }
}
