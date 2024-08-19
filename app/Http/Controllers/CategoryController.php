<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\RandomController;
use App\Http\Controllers\AdminController;

class CategoryController extends Controller
{
    public function AllCategory()
    {
        return view("content/admin/allCategory");
    }

    public function AddCategory()
    {
        return view("content/admin/addCategory");
    }

    public function AddCategoryProgress(Request $request)
    {
        $id = RandomController::Digit(5);
        $ip = $request->ip();
        $u_agent = $request->userAgent();
        $idUser = $request->session()->get('stmik_adm_id');
        $nickUser = $request->session()->get('stmik_adm_user');
        $judulSingkat = $request->category_title_id;

        $insert = array(
            "category_id" => $id,
            "category_title_id" => $request->category_title_id,
            "category_title_en" => $request->category_title_en,
            "category_for_url" => $request->link_category,
            "category_date_created" => date('Y-m-d H:i:s'),
            "category_date_updated" => date('Y-m-d H:i:s')
        );

        DB::table('stmik_category')->insert($insert);
        AdminController::LogPost($ip, $nickUser, 'menambah kategori <b>' . $judulSingkat . '</b>...', $u_agent);

        return redirect('/addCategory')->with([
            'result' => 'Kategori berhasil ditambahkan.',
            'action' => 'success'
        ]);
    }

    public function EditCategory($id)
    {
        $data = array(
            'table' => DB::table('stmik_category')->where('category_id', $id)->get()
        );
        return view("content/admin/editCategory", $data);
    }

    public function EditCategoryProgress(Request $request)
    {
        $id = $request->category_id;
        $ip = $request->ip();
        $u_agent = $request->userAgent();
        $idUser = $request->session()->get('stmik_adm_id');
        $nickUser = $request->session()->get('stmik_adm_user');
        $judulSingkat = $request->category_title_id;

        $insert = array(
            "category_title_id" => $request->category_title_id,
            "category_title_en" => $request->category_title_en,
            "category_for_url" => $request->link_category,
            "category_date_updated" => date('Y-m-d H:i:s')
        );

        DB::table('stmik_category')->where('category_id', $id)->update($insert);

        AdminController::LogPost($ip, $nickUser, 'mengubah kategori <b>' . $judulSingkat . '</b>...', $u_agent);

        return redirect('/editCategory/' . $id)->with([
            'result' => 'Kategori berhasil diubah.',
            'action' => 'success'
        ]);
    }

    public function DeleteCategory(Request $request, $id)
    {
        $ip = $request->ip();
        $u_agent = $request->userAgent();
        $idUser = $request->session()->get('stmik_adm_id');
        $nickUser = $request->session()->get('stmik_adm_user');

        DB::table('stmik_category')->where('category_id', $id)->delete();

        AdminController::LogPost($ip, $nickUser, 'menghapus kategori <b>' . $id . '</b>...', $u_agent);

        return redirect('/allCategory')->with([
            'result' => 'Kategori berhasil dihapus.',
            'action' => 'delete'
        ]);
    }
}
