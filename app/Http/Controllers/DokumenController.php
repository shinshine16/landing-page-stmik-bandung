<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\RandomController;
use Illuminate\Support\Facades\Session;

class DokumenController extends Controller
{
    public function AddDokumen()
    {
        return view('content/admin/addDokumen');
    }

    public function AddDokumenProgress(Request $request)
    {
        if ($request->metode_upload == "Upload") {
            return redirect('/addDokumen')->with([
                'result' => 'Untuk metode upload sedang dalam pengerjaan.',
                'action' => 'success'
            ]);
        } else if ($request->metode_upload == "URL") {
            $insert = array(
                "file_id" => RandomController::Digit(5),
                "file_title_id" => $request->file_name_id,
                "file_title_en" => $request->file_name_en,
                "file_category" => $request->file_ktg_dokumen,
                "file_method" => $request->metode_upload,
                "file_owner" => Session::get('stmik_adm_username'),
                "file_date_created" => date('Y-m-d H:i:s'),
                "file_date_updated" => date('Y-m-d H:i:s')
            );
            DB::table('stmik_file')->insert($insert);
            return redirect('/addDokumen')->with([
                'result' => 'Berkas/Dokumen berhasil dimasukan.',
                'action' => 'success'
            ]);
        } else {
            return redirect('/addDokumen');
        }
    }
}
