<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\RandomController;
use App\Http\Controllers\AdminController;

class AgendaController extends Controller
{
    public function AllAgenda()
    {
        return view("content/admin/allAgenda");
    }

    public function AddAgenda()
    {
        return view("content/admin/addAgenda");
    }

    public function AddAgendaProgress(Request $request)
    {
        $id = RandomController::Digit(5);
        $ip = $request->ip();
        $u_agent = $request->userAgent();
        $idUser = $request->session()->get('stmik_adm_id');
        $nickUser = $request->session()->get('stmik_adm_user');
        $judulSingkat = $request->title_id;

        $insert = array(
            "agenda_id" => $id,
            "agenda_title_id" => $request->title_id,
            "agenda_title_en" => $request->title_en,
            "agenda_slug_id" => AdminController::Slugify($request->title_id),
            "agenda_slug_en" => AdminController::Slugify($request->title_en),
            "agenda_location" => $request->lokasi,
            "agenda_start" => $request->agenda_start,
            "agenda_end" => $request->agenda_end,
            "agenda_desc_id" => $request->content_id,
            "agenda_desc_en" => $request->content_en,
            "agenda_author" => $idUser,
            "agenda_date_created" => date('Y-m-d H:i:s'),
            "agenda_date_updated" => date('Y-m-d H:i:s')
        );

        DB::table('stmik_agenda')->insert($insert);
        AdminController::LogPost($ip, $nickUser, 'menambah agenda <b>' . $judulSingkat . '</b>...', $u_agent);

        return redirect('/addAgenda')->with([
            'result' => 'Agenda berhasil ditambahkan.',
            'action' => 'success'
        ]);
    }
}
