<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function AllStaff()
    {
        return view("content/admin/allStaff");
    }

    public function AddStaff()
    {
        return view("content/admin/addStaff");
    }

    public function EditStaff($id)
    {
        $data = array(
            'table' => DB::table('stmik_users')->join('stmik_staff', 'stmik_users.users_id', '=', 'stmik_staff.staff_id')->where('users_id', $id)->get()
        );
        return view("content/admin/editStaff", $data);
    }

    public function AddStaffProgress(Request $request)
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
        $dest = public_path('assets/img/staff-img');
        $filename = app('App\Http\Controllers\RandomController')->Digit(5) . "." . $thumb->getClientOriginalExtension();
        $this->validate($request, [
            'thumbnail' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $thumb->move($dest, $filename);
        // End Thumbnail Image

        /*
        foreach ($dataThumb as $dT) {
            unlink(public_path('assets/img/staff-img/' . $dT->staff_image));
        }
        */

        // Check Password
        if ($request->password == NULL || $request->password == "") {
            $password = $id;
            $success_m = "Karena password staff kosong, password akan generate random menjadi <b>" . $password . "</b>. Dimohon untuk mengingat/menyimpan passwordnya suatu saat dibutuhkan.";
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
            "staff_id" => $id,
            "staff_name" => $request->nickname,
            "staff_jabatan_id" => $request->jabatan_id,
            "staff_jabatan_en" => $request->jabatan_en,
            "staff_quote_id" => $request->quote_id,
            "staff_quote_en" => $request->quote_en,
            "staff_desc_id" => $request->content_id,
            "staff_desc_en" => $request->content_en,
            "staff_image" => $filename,
            'staff_date_created' => date('Y-m-d H:i:s'),
            'staff_date_updated' => date('Y-m-d H:i:s')
        );

        DB::table('stmik_users')->insert($insert);
        DB::table('stmik_staff')->insert($insert2);

        app('App\Http\Controllers\AdminController')->LogPost($ip, $nickUser, 'menambah staff <b>' . $judulSingkat . '</b>...', $u_agent);

        return redirect('/addStaff')->with([
            'result' => 'Pimpinan berhasil ditambah. ' . $success_m,
            'action' => 'success'
        ]);
    }

    public function editStaffProgress(Request $request)
    {
        //$id = app('App\Http\Controllers\RandomController')->Digit(5);
        $ip = $request->ip();
        $u_agent = $request->userAgent();
        $idUser = $request->session()->get('stmik_adm_id');
        $nickUser = $request->session()->get('stmik_adm_user');
        $judulSingkat = $request->nickname;
        $dataStaff = DB::table('stmik_staff')->where('staff_id', $request->id)->get();

        // Thumbnail Image
        $thumb = $request->file('thumbnail');
        $dest = public_path('assets/img/staff-img');
        // End Thumbnail Image

        // Check Thumbnail
        if ($thumb == NULL || $thumb == "") {
            $update = array(
                "staff_name" => $request->nickname,
                "staff_jabatan_id" => $request->jabatan_id,
                "staff_jabatan_en" => $request->jabatan_en,
                "staff_quote_id" => $request->quote_id,
                "staff_quote_en" => $request->quote_en,
                "staff_desc_id" => $request->content_id,
                "staff_desc_en" => $request->content_en,
                'staff_date_updated' => date('Y-m-d H:i:s')
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
            foreach ($dataStaff as $dL) {
                unlink(public_path('assets/img/staff-img/' . $dL->staff_image));
            }
            $update = array(
                "staff_name" => $request->nickname,
                "staff_jabatan_id" => $request->jabatan_id,
                "staff_jabatan_en" => $request->jabatan_en,
                "staff_quote_id" => $request->quote_id,
                "staff_quote_en" => $request->quote_en,
                "staff_desc_id" => $request->content_id,
                "staff_desc_en" => $request->content_en,
                "staff_image" => $filename,
                'staff_date_updated' => date('Y-m-d H:i:s')
            );
            $opt = 2;
        }
        // End Check Thumbnail

        DB::table('stmik_staff')->where('staff_id', $request->id)->update($update);

        app('App\Http\Controllers\AdminController')->LogPost($ip, $nickUser, 'mengubah staff <b>' . $judulSingkat . '</b>...', $u_agent);

        return redirect('/editStaff/' . $request->id)->with([
            'result' => 'Pimpinan berhasil diubah. ' . $opt,
            'action' => 'success'
        ]);
    }
}
