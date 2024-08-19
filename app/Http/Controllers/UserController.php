<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function AllUser()
    {
        return view("content/admin/allUser");
    }

    public function AddUser()
    {
        return view("content/admin/addUser");
    }

    public function AddUserProgress(Request $request)
    {
        $id = app('App\Http\Controllers\RandomController')->Digit(5);
        $ip = $request->ip();
        $u_agent = $request->userAgent();
        $idUser = $request->session()->get('stmik_adm_id');
        $nickUser = $request->session()->get('stmik_adm_user');
        $judulSingkat = $request->nickname;
        $checkUsername = DB::table('stmik_users')->where('users_username', $request->username)->count();

        if ($checkUsername != 0) {
            app('App\Http\Controllers\AdminController')->LogPost($ip, $nickUser, 'gagal menambah pengguna <b>' . $request->username . '</b>...', $u_agent);

            return redirect('/addUser')->with([
                'result' => 'Maaf, User/Pengguna sudah tersedia',
                'action' => 'error'
            ]);
        }

        $insert = array(
            'users_id' => $id,
            'users_username' => $request->username,
            'users_password' => md5($request->password),
            'users_name' => $request->nickname,
            'users_level' => 2,
            'users_date_created' => date('Y-m-d H:i:s'),
            'users_date_updated' => date('Y-m-d H:i:s')
        );

        DB::table('stmik_users')->insert($insert);
        app('App\Http\Controllers\AdminController')->LogPost($ip, $nickUser, 'menambah pengguna <b>' . $judulSingkat . '</b>...', $u_agent);

        return redirect('/addUser')->with([
            'result' => 'User/Pengguna berhasil ditambahkan.',
            'action' => 'success'
        ]);
    }

    public function EditUser($id)
    {
        $data = array(
            'table' => DB::table('stmik_users')->where('users_id', $id)->get()
        );
        return view("content/admin/editUser", $data);
    }

    public function DeleteUser(Request $request, $id)
    {
        $ip = $request->ip();
        $u_agent = $request->userAgent();
        $nickUser = $request->session()->get('stmik_adm_user');
        $dataPost = DB::table('stmik_users')->where('users_id', $id)->get();

        DB::table('stmik_users')->where('users_id', $id)->delete();

        foreach ($dataPost as $dP) {
            $judulSingkat = substr($dP->users_username, 0, 20);
            if ($dP->users_level == 3) {
                app('App\Http\Controllers\AdminController')->LogPost($ip, $nickUser, 'gagal menghapus pengguna <b>' . $judulSingkat . '...</b>', $u_agent);
                return redirect('/allUser')->with([
                    'result' => 'Pimpinan tidak bisa dihapus. Untuk menghapusnya anda harus ke Data Pimpinan.',
                    'action' => 'delete'
                ]);
            }
            app('App\Http\Controllers\AdminController')->LogPost($ip, $nickUser, 'menghapus pengguna <b>' . $judulSingkat . '...</b>', $u_agent);
        }

        return redirect('/allUser')->with([
            'result' => 'Pengguna berhasil dihapus.',
            'action' => 'delete'
        ]);
    }

    public function EditUserProgress(Request $request)
    {
        $ip = $request->ip();
        $u_agent = $request->userAgent();
        $nickUser = $request->session()->get('stmik_adm_user');
        $judulSingkat = $request->nickname;

        if ($request->password == NULL || $request->password == "") {
            $insert = array(
                'users_username' => $request->username,
                'users_name' => $request->nickname,
                'users_date_updated' => date('Y-m-d H:i:s')
            );
        } else {
            $insert = array(
                'users_username' => $request->username,
                'users_password' => md5($request->password),
                'users_name' => $request->nickname,
                'users_date_updated' => date('Y-m-d H:i:s')
            );
        }

        DB::table('stmik_users')->where('users_id', $request->id)->update($insert);
        app('App\Http\Controllers\AdminController')->LogPost($ip, $nickUser, 'mengubah pengguna <b>' . $judulSingkat . '</b>...', $u_agent);

        return redirect('/editUser/' . $request->id)->with([
            'result' => 'User/Pengguna berhasil diubah.',
            'action' => 'success'
        ]);
    }
}
