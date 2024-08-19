<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function ListPost()
    {
        return view("content/admin/listPost");
    }

    public function AddPost()
    {
        $kategori = DB::table('stmik_category')->get();
        $data = array(
            'ktgPost' => $kategori
        );
        return view("content/admin/addPost", $data);
    }

    public function AddPostProgress(Request $request)
    {
        $id = app('App\Http\Controllers\RandomController')->Digit(5);
        $ip = $request->ip();
        $u_agent = $request->userAgent();

        $slug_id = app('App\Http\Controllers\AdminController')->Slugify($request->title_id);
        $slug_en = app('App\Http\Controllers\AdminController')->Slugify($request->title_en);
        $thumb = $request->file('thumbnail');
        $filename = "post/" . app('App\Http\Controllers\RandomController')->Digit(5) . "." . $thumb->getClientOriginalExtension();
        //$filename = $thumb->getClientOriginalName();
        $dest = public_path('assets/img/bg-img/post');
        $idUser = $request->session()->get('stmik_adm_id');
        $nickUser = $request->session()->get('stmik_adm_user');
        $judulSingkat = substr($request->title_id, 0, 20);

        $this->validate($request, [
            'thumbnail' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        //$request->upload->storeAs('post', $filename);
        $thumb->move($dest, $filename);
        $insert = array(
            'post_id' => $id,
            'post_title_id' => $request->title_id,
            'post_title_en' => $request->title_en,
            'post_subtitle_id' => $request->subtitle_id,
            'post_subtitle_en' => $request->subtitle_en,
            'post_content_id' => $request->content_id,
            'post_content_en' => $request->content_en,
            'post_slug_id' => $slug_id,
            'post_slug_en' => $slug_en,
            'post_thumbnail' => $filename,
            'post_category' => $request->idKategori,
            'post_author' => $idUser,
            'post_date_created' => date('Y-m-d H:i:s'),
            'post_date_updated' => date('Y-m-d H:i:s')
        );

        DB::table('stmik_post')->insert($insert);
        app('App\Http\Controllers\AdminController')->LogPost($ip, $nickUser, 'menambah konten <b>' . $judulSingkat . '</b>...', $u_agent);

        return redirect('/addPost')->with([
            'result' => 'Artikel berhasil dipublikasikan.',
            'action' => 'success'
        ]);
    }

    public function EditPost($id)
    {
        $kategori = DB::table('stmik_category')->get();
        $data = array(
            'ktgPost' => $kategori,
            'table' => DB::table('stmik_v_post')->where('post_id', $id)->get()
        );
        return view("content/admin/editPost", $data);
    }

    public function EditPostProgress(Request $request)
    {
        $ip = $request->ip();
        $u_agent = $request->userAgent();

        $slug_id = app('App\Http\Controllers\AdminController')->Slugify($request->title_id);
        $slug_en = app('App\Http\Controllers\AdminController')->Slugify($request->title_en);
        $thumb = $request->file('thumbnail');
        $dataPost = DB::table('stmik_post')->where('post_id', $request->id)->get();
        $idUser = $request->session()->get('stmik_adm_id');
        $nickUser = $request->session()->get('stmik_adm_user');
        $judulSingkat = substr($request->title_id, 0, 20);

        if ($thumb != "" || $thumb != NULL) {
            $filename = "post/" . app('App\Http\Controllers\RandomController')->Digit(5) . "." . $thumb->getClientOriginalExtension();
            $dest = public_path('assets/img/bg-img/post');

            foreach ($dataPost as $dP) {
                unlink(public_path('assets/img/bg-img/' . $dP->post_thumbnail));
            }

            $this->validate($request, [
                'thumbnail' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
            ]);
            $thumb->move($dest, $filename);

            $data = array(
                'post_title_id' => $request->title_id,
                'post_title_en' => $request->title_en,
                'post_subtitle_id' => $request->subtitle_id,
                'post_subtitle_en' => $request->subtitle_en,
                'post_content_id' => $request->content_id,
                'post_content_en' => $request->content_en,
                'post_slug_id' => $slug_id,
                'post_slug_en' => $slug_en,
                'post_thumbnail' => $filename,
                'post_category' => $request->idKategori,
                'post_author' => $idUser,
                'post_date_updated' => date('Y-m-d H:i:s')
            );
        } else {
            $data = array(
                'post_title_id' => $request->title_id,
                'post_title_en' => $request->title_en,
                'post_subtitle_id' => $request->subtitle_id,
                'post_subtitle_en' => $request->subtitle_en,
                'post_content_id' => $request->content_id,
                'post_content_en' => $request->content_en,
                'post_slug_id' => $slug_id,
                'post_slug_en' => $slug_en,
                'post_category' => $request->idKategori,
                'post_author' => $idUser,
                'post_date_updated' => date('Y-m-d H:i:s')
            );
        }

        DB::table('stmik_post')->where('post_id', $request->id)->update($data);
        app('App\Http\Controllers\AdminController')->LogPost($ip, $nickUser, 'mengubah konten <b>' . $judulSingkat . '...</b>', $u_agent);

        return redirect('/editPost/' . $request->id)->with([
            'result' => 'Artikel berhasil diubah.',
            'action' => 'success'
        ]);
    }

    public function DeletePost(Request $request, $id)
    {
        $ip = $request->ip();
        $u_agent = $request->userAgent();
        $nickUser = $request->session()->get('stmik_adm_user');
        $dataPost = DB::table('stmik_post')->where('post_id', $id)->get();

        foreach ($dataPost as $dP) {
            unlink(public_path('assets/img/bg-img/' . $dP->post_thumbnail));
        }

        DB::table('stmik_post')->where('post_id', $id)->delete();

        foreach ($dataPost as $dP) {
            $judulSingkat = substr($dP->post_title_id, 0, 20);
            app('App\Http\Controllers\AdminController')->LogPost($ip, $nickUser, 'menghapus konten <b>' . $judulSingkat . '...</b>', $u_agent);
        }

        return redirect('/listPost')->with([
            'result' => 'Artikel berhasil dihapus.',
            'action' => 'delete'
        ]);
    }
}
