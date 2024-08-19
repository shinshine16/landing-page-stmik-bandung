<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaderController extends Controller
{
    public function AllLeader()
    {
        return view("content/admin/allLeader");
    }

    public function AddLeader()
    {
        return view("content/admin/addLeader");
    }

    public function EditLeader($id)
    {
        $data = array(
            'table' => DB::table('stmik_users')->join('stmik_pimpinan', 'stmik_users.users_id', '=', 'stmik_pimpinan.pimpinan_id')->where('users_id', $id)->get()
        );
        return view("content/admin/editLeader", $data);
    }

    public function AddLeaderProgress(Request $request)
    {
        $id = app('App\Http\Controllers\RandomController')->Digit(5);
        $ip = $request->ip();
        $u_agent = $request->userAgent();
        $idUser = $request->session()->get('stmik_adm_id');
        $nickUser = $request->session()->get('stmik_adm_user');
        $judulSingkat = $request->nickname;
        $checkUsername = DB::table('stmik_users')->where('users_username', $request->username)->count();

        // Thumbnail Image
        $thumb = $request->file('thumbnail');
        $dataThumb = DB::table('stmik_post')->where('post_id', $id)->get();
        $dest = public_path('assets/img/leader-img');
        $filename = app('App\Http\Controllers\RandomController')->Digit(5) . "." . $thumb->getClientOriginalExtension();
        $this->validate($request, [
            'thumbnail' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $thumb->move($dest, $filename);
        // End Thumbnail Image

        /*
        foreach ($dataThumb as $dT) {
            unlink(public_path('assets/img/leader-img/' . $dT->pimpinan_image));
        }
        */

        // Check Password
        if ($request->password == NULL || $request->password == "") {
            $password = $id;
            $success_m = "Karena password pimpinan kosong, password akan generate random menjadi <b>" . $password . "</b>. Dimohon untuk mengingat/menyimpan passwordnya suatu saat dibutuhkan.";
        } else {
            $password = $request->password;
            $success_m = NULL;
        }
        // End Check Password

        $insert = array(
            'users_id' => $id,
            'users_username' => $request->username,
            'users_password' => md5($password),
            'users_name' => $request->nickname,
            'users_level' => 3,
            'users_date_created' => date('Y-m-d H:i:s'),
            'users_date_updated' => date('Y-m-d H:i:s')
        );
        $insert2 = array(
            "pimpinan_id" => $id,
            "pimpinan_name" => $request->nickname,
            "pimpinan_jabatan_id" => $request->jabatan_id,
            "pimpinan_jabatan_en" => $request->jabatan_en,
            "pimpinan_quote_id" => $request->quote_id,
            "pimpinan_quote_en" => $request->quote_en,
            "pimpinan_desc_id" => $request->content_id,
            "pimpinan_desc_en" => $request->content_en,
            "pimpinan_image" => $filename,
            'pimpinan_date_created' => date('Y-m-d H:i:s'),
            'pimpinan_date_updated' => date('Y-m-d H:i:s')
        );

        DB::table('stmik_users')->insert($insert);
        DB::table('stmik_pimpinan')->insert($insert2);

        app('App\Http\Controllers\AdminController')->LogPost($ip, $nickUser, 'menambah pimpinan <b>' . $judulSingkat . '</b>...', $u_agent);

        return redirect('/addLeader')->with([
            'result' => 'Pimpinan berhasil ditambah. ' . $success_m,
            'action' => 'success'
        ]);
    }

    public function editLeaderProgress(Request $request)
    {
        //$id = app('App\Http\Controllers\RandomController')->Digit(5);
        $ip = $request->ip();
        $u_agent = $request->userAgent();
        $idUser = $request->session()->get('stmik_adm_id');
        $nickUser = $request->session()->get('stmik_adm_user');
        $judulSingkat = $request->nickname;
        $dataLeader = DB::table('stmik_pimpinan')->where('pimpinan_id', $request->id)->get();

        // Thumbnail Image
        $thumb = $request->file('thumbnail');
        $dest = public_path('assets/img/leader-img');
        // End Thumbnail Image

        // Check Thumbnail
        if ($thumb == NULL || $thumb == "") {
            $update = array(
                "pimpinan_name" => $request->nickname,
                "pimpinan_jabatan_id" => $request->jabatan_id,
                "pimpinan_jabatan_en" => $request->jabatan_en,
                "pimpinan_quote_id" => $request->quote_id,
                "pimpinan_quote_en" => $request->quote_en,
                "pimpinan_desc_id" => $request->content_id,
                "pimpinan_desc_en" => $request->content_en,
                'pimpinan_date_updated' => date('Y-m-d H:i:s')
            );
            $opt = 1;
        } else {
            $filename = app('App\Http\Controllers\RandomController')->Digit(5) . "." . $thumb->getClientOriginalExtension();
            // Edit Thumbnail Image
            $this->validate($request, [
                'thumbnail' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
            ]);
            $thumb->move($dest, $filename);

            // Delete Previous Thumbnail Image
            foreach ($dataLeader as $dL) {
                unlink(public_path('assets/img/leader-img/' . $dL->pimpinan_image));
            }
            $update = array(
                "pimpinan_name" => $request->nickname,
                "pimpinan_jabatan_id" => $request->jabatan_id,
                "pimpinan_jabatan_en" => $request->jabatan_en,
                "pimpinan_quote_id" => $request->quote_id,
                "pimpinan_quote_en" => $request->quote_en,
                "pimpinan_desc_id" => $request->content_id,
                "pimpinan_desc_en" => $request->content_en,
                "pimpinan_image" => $filename,
                'pimpinan_date_updated' => date('Y-m-d H:i:s')
            );
            $opt = 2;
        }
        // End Check Thumbnail

        DB::table('stmik_pimpinan')->where('pimpinan_id', $request->id)->update($update);

        app('App\Http\Controllers\AdminController')->LogPost($ip, $nickUser, 'mengubah pimpinan <b>' . $judulSingkat . '</b>...', $u_agent);

        return redirect('/editLeader/' . $request->id)->with([
            'result' => 'Pimpinan berhasil diubah. ' . $opt,
            'action' => 'success'
        ]);
    }
}
