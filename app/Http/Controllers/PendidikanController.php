<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendidikanController extends Controller
{
    public function AddPendidikan()
    {
        $data = array(
            'usersList' => DB::table('stmik_users')->where('users_level', '!=', 1)->get()
        );
        return view("content/admin/addPendidikan", $data);
    }

    public function AddPendidikanProgress(Request $request)
    {
        $insert = array(
            "pendidikan_id" => RandomController::Digit(5),
            "pendidikan_users" => $request->pend_user,
            "pendidikan_lulusan" => $request->pend_lulusan,
            "pendidikan_universitas" => strtoupper($request->pend_universitas),
            "pendidikan_thn_masuk" => $request->pend_tahun_masuk,
            "pendidikan_thn_keluar" => $request->pend_tahun_keluar,
            "pendidikan_date_created" => date('Y-m-d H:i:s'),
            "pendidikan_date_updated" => date('Y-m-d H:i:s')
        );
        DB::table('stmik_pendidikan')->insert($insert);
        return redirect('/addPendidikan')->with([
            'result' => 'Pendidikan berhasil dimasukan.',
            'action' => 'success'
        ]);
    }
}
