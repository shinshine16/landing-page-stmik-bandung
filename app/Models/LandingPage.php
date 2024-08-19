<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LandingPage extends Model
{
    public function mSinglePost($tSlugLang, $vSlugLang)
    {
        return DB::table('stmik_post')
            ->join('stmik_category', 'stmik_post.post_category', '=', 'stmik_category.category_id')
            ->join('stmik_users', 'stmik_post.post_author', '=', 'stmik_users.users_id')
            ->where($tSlugLang, $vSlugLang)->get();
    }

    public function mSingleAgenda($tSlugLang, $vSlugLang)
    {
        return DB::table('stmik_agenda')
            ->join('stmik_users', 'stmik_agenda.agenda_author', '=', 'stmik_users.users_id')
            ->where($tSlugLang, $vSlugLang)->get();
    }

    public function mListPostCategory($tSlugLang, $vSlugLang)
    {
        return DB::table('stmik_post')
            ->join('stmik_category', 'stmik_post.post_category', '=', 'stmik_category.category_id')
            ->join('stmik_users', 'stmik_post.post_author', '=', 'stmik_users.users_id')
            ->orderByDesc('post_date_created')
            ->where($tSlugLang, $vSlugLang)->paginate(6);
    }

    public function mListPostSearch($tSlugLang, $vSlugLang)
    {
        return DB::table('stmik_post')
            ->join('stmik_category', 'stmik_post.post_category', '=', 'stmik_category.category_id')
            ->join('stmik_users', 'stmik_post.post_author', '=', 'stmik_users.users_id')
            ->where($tSlugLang, 'like', '%' . $vSlugLang . '%')->get();
    }

    public function mLogin($user, $pass)
    {
        return DB::table('stmik_users')
            ->where('users_username', '=', $user)
            ->where('users_password', '=', $pass);
    }
}
