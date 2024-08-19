<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Session;

class JsonController extends Controller
{
    public function JsonPost()
    {
        $data = DB::table('stmik_v_post')->orderByDesc('post_date_created');

        return Datatables::of($data)
            ->addColumn('thumb', function ($thumb) {
                return '<img width="150" src="' . asset('assets/img/bg-img/' . $thumb->post_thumbnail) . '" />';
            })
            ->addIndexColumn()
            ->addColumn('act', function ($row) {

                $btn = '<a href="/editPost/' . $row->post_id . '" class="btn btn-block btn-primary waves-effect"><i class="material-icons">border_color</i><span>Sunting</span></a> <a href="/deletePost/' . $row->post_id . '" class="btn btn-block btn-danger waves-effect"><i class="material-icons">delete_forever</i><span>Hapus</span></a>';

                return $btn;
            })
            ->rawColumns(['thumb', 'act'])
            ->make(true);
    }

    public function JsonLog()
    {
        $data = DB::table('stmik_log')->orderByDesc('log_date_created');

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('message', function ($row) {
                return $row->log_message;
            })
            ->rawColumns(['message'])
            ->make(true);
    }

    public function JsonVisitor()
    {
        $data = DB::table('stmik_visitor')->orderByDesc('visitor_date_created');

        return Datatables::of($data)->make(true);
    }

    public function JsonUser()
    {
        $data = DB::table('stmik_users')->orderByDesc('users_date_updated');

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('level', function ($row) {
                if ($row->users_level == 1) {
                    return 'Administrator';
                } else if ($row->users_level == 3) {
                    return 'Pimpinan';
                } else {
                    return 'Staff';
                }
            })
            ->addColumn('act', function ($row) {

                if ($row->users_level == 2) {
                    $btn = '<div align="center"><a href="/editUser/' . $row->users_id . '" class="text-info">Ubah</a> | <a href="/deleteUser/' . $row->users_id . '" class="text-danger">Hapus</a></div>';
                } else if ($row->users_level == 3) {
                    $btn = '<div align="center"><a href="/editUser/' . $row->users_id . '" class="text-info">Ubah</a></div>';
                } else {
                    $btn = NULL;
                }
                return $btn;
            })
            ->rawColumns(['act'])
            ->make(true);
    }

    public function JsonLeader()
    {
        $data = DB::table('stmik_pimpinan');

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('act', function ($row) {

                $btn = '<div align="center"><a href="/editLeader/' . $row->pimpinan_id . '" class="text-info">Ubah</a> | <a href="/deleteLeader/' . $row->pimpinan_id . '" class="text-danger">Hapus</a></div>';

                return $btn;
            })
            ->rawColumns(['act'])
            ->make(true);
    }

    public function JsonStaff()
    {
        $data = DB::table('stmik_staff');

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('act', function ($row) {

                $btn = '<div align="center"><a href="/editStaff/' . $row->staff_id . '" class="text-info">Ubah</a> | <a href="/deleteStaff/' . $row->staff_id . '" class="text-danger">Hapus</a></div>';

                return $btn;
            })
            ->rawColumns(['act'])
            ->make(true);
    }

    public function JsonCategory()
    {
        $data = DB::table('stmik_category');

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('act', function ($row) {

                $btn = '<div align="center"><a href="/editCategory/' . $row->category_id . '" class="text-info">Ubah</a> | <a href="/deleteCategory/' . $row->category_id . '" class="text-danger">Hapus</a></div>';

                return $btn;
            })
            ->rawColumns(['act'])
            ->make(true);
    }

    public function JsonAgenda()
    {
        $data = DB::table('stmik_v_agenda');

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('act', function ($row) {

                $btn = '<div align="center"><a href="/editAgenda/' . $row->agenda_id . '" class="text-info">Ubah</a> | <a href="/deleteAgenda/' . $row->agenda_id . '" class="text-danger">Hapus</a></div>';

                return $btn;
            })
            ->rawColumns(['act'])
            ->make(true);
    }

    public static function JsonProfilUser()
    {
        $arr = [];

        if (Session::get('stmik_adm_level') == 'Pimpinan') {
            $table = DB::table('stmik_v_pimpinan')->where('pimpinan_id', Session::get('stmik_adm_id'))->get();
            $ff = 'pimpinan';
            $imgPath = 'leader-img';
        } else if (Session::get('stmik_adm_level') == 'Staff') {
            $table = DB::table('stmik_v_staff')->where('staff_id', Session::get('stmik_adm_id'))->get();
            $ff = 'staff';
            $imgPath = 'staff-img';
        } else {
            return redirect('/dashboard');
        }

        $name = $ff . '_name';
        $jab_id = $ff . '_jabatan_id';
        $jab_en = $ff . '_jabatan_en';
        $quo_id = $ff . '_quote_id';
        $quo_en = $ff . '_quote_en';
        $desc_id = $ff . '_desc_id';
        $desc_en = $ff . '_desc_en';
        $image = $ff . '_image';

        foreach ($table as $T) {
            $arr['user'] = $T->users_username;
            $arr['name'] = $T->$name;
            $arr['jabatan_id'] = $T->$jab_id;
            $arr['jabatan_en'] = $T->$jab_en;
            $arr['quote_id'] = $T->$quo_id;
            $arr['quote_en'] = $T->$quo_en;
            $arr['desc_id'] = $T->$desc_id;
            $arr['desc_en'] = $T->$desc_en;
            $arr['image'] = asset('assets/img/'.$imgPath.'/'.$T->$image);
        }
        return json_encode($arr);
    }
}
