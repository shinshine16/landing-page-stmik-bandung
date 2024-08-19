<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LandingPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\URL;

class LandingPageController extends Controller
{
    public $landingPage;

    public function __construct()
    {
        $this->language = "";
        $this->landingPage = new LandingPage;
    }
    public function Beranda(Request $request)
    {
        // Set locale berdasarkan sesi
        App::setLocale($request->session()->get('lang'));
        $getLanguage = $request->session()->get('lang');
        
        // Dapatkan kategori berdasarkan URL saat ini
        //$ktg = DB::table('stmik_category')->where('category_for_url', URL::current())->first();

        // Siapkan data untuk dikirim ke view
        $data = [
            'title' => '',
            'getLanguage' => $getLanguage,
            'kalender' => app(LandingPageController::class)->KalenderAkademik(),
            'slider' => DB::table('stmik_post')->orderByDesc('post_date_created')->limit(3)->get(),
            'labelKtg' => DB::table('stmik_category')->where('category_for_url', URL::current())->first(),
            'agenda' => DB::table('stmik_agenda')->limit(6)->get(),
            'pimpinan' => DB::table('stmik_pimpinan')->where('pimpinan_quote_' . $getLanguage, '!=', NULL)->limit(3)->get(),
            'language' => App::getLocale(),
            // Field Translate
            'titleLang' => app(LanguageController::class)->FieldLang('post_title_', $getLanguage),
            'slugLang' => app(LanguageController::class)->FieldLang('post_slug_', $getLanguage),
            'categoryTitleLang' => app(LanguageController::class)->FieldLang('category_title_', $getLanguage),
            'agendaTitleLang' => app(LanguageController::class)->FieldLang('agenda_title_', $getLanguage),
            'agendaSlugLang' => app(LanguageController::class)->FieldLang('agenda_slug_', $getLanguage),
            'leaderJabatanLang' => app(LanguageController::class)->FieldLang('pimpinan_jabatan_', $getLanguage),
            'leaderQuoteLang' => app(LanguageController::class)->FieldLang('pimpinan_quote_', $getLanguage)
        ];
        
        // Kembalikan view dengan data yang sudah disiapkan
        return view("content/landingPage", $data);
    }


    public static function ImageCropSquare($url)
    {
        $image = imagecreatefromjpeg($url);
        $filename = $url;

        $thumb_width = 200;
        $thumb_height = 150;

        $width = imagesx($image);
        $height = imagesy($image);

        $original_aspect = $width / $height;
        $thumb_aspect = $thumb_width / $thumb_height;

        if ($original_aspect >= $thumb_aspect) {
            // If image is wider than thumbnail (in aspect ratio sense)
            $new_height = $thumb_height;
            $new_width = $width / ($height / $thumb_height);
        } else {
            // If the thumbnail is wider than the image
            $new_width = $thumb_width;
            $new_height = $height / ($width / $thumb_width);
        }

        $thumb = imagecreatetruecolor($thumb_width, $thumb_height);

        // Resize and crop
        imagecopyresampled(
            $thumb,
            $image,
            0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
            0 - ($new_height - $thumb_height) / 2, // Center the image vertically
            0,
            0,
            $new_width,
            $new_height,
            $width,
            $height
        );
        imagejpeg($thumb, $filename, 80);
    }

    public function getIP(Request $request)
    {
        $userIp = $request->ip();
        $locationData = \Location::get($userIp);

        dd($locationData);
        //echo $locationData->latitude . ',' . $locationData->longitude;
        //echo URL::current();
    }

    public static function KalenderAkademik()
    {
        $hari    = date("d");
        $bulan    = date("m");
        $tahun    = date("Y");
        $jumlahhari = date("t", mktime(0, 0, 0, $bulan, $hari, $tahun));
        $listBulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        date_default_timezone_set('Asia/Jakarta');
?>
        <div class="border">
            <table style="width: 100%; font-size: 13px;">
                <tr class="py-1">
                    <td align="center" bgcolor="#003679" colspan="5" class="text-light font-weight-bold py-2">
                        <?= $listBulan[intval($bulan)]; ?></td>
                    <td align="center" bgcolor="#FFBB38" colspan="2" class="text-dark font-weight-bold py-2"><?= $tahun; ?></td>
                </tr>
                <tr bgcolor="#003679" class="py-1">
                    <td align="center" class="text-warning py-2">Minggu</td>
                    <td align="center" class="text-light py-2">Senin</td>
                    <td align="center" class="text-light py-2">Selasa</td>
                    <td align="center" class="text-light py-2">Rabu</td>
                    <td align="center" class="text-light py-2">Kamis</td>
                    <td align="center" class="text-light py-2">Jumat</td>
                    <td align="center" class="text-light py-2">Sabtu</td>
                </tr>
        <?php
        $s = date("w", mktime(0, 0, 0, $bulan, 1, $tahun));

        for ($ds = 1; $ds <= $s; $ds++) {
            echo "<td></td>";
        }

        for ($d = 1; $d <= $jumlahhari; $d++) {

            if (date("w", mktime(0, 0, 0, $bulan, $d, $tahun)) == 0) {
                echo "<tr>";
            }
            $warna = "#000000";

            if (date("l", mktime(0, 0, 0, $bulan, $d, $tahun)) == "Sunday") {
                $warna = "#FF0000";
            }

            if ($d == $hari) {
                $background = "#transparent";
                $fontWeight = "bold";
            } else {
                $background = "transparent";
                $fontWeight = "normal";
            }

            if ($d >= 12 && $d <= 14 && $bulan = 02) {
                $background = "#003679";
            }

            if ($d >= 20 && $d <= 22 && $bulan = 02) {
                $background = "#FFBB38";
            }

            echo "<td class='font-weight-" . $fontWeight . " py-3' style='background: " . $background . "' align='center' valign=middle> <span style=\"color:$warna\">$d</span></td>";

            if (date("w", mktime(0, 0, 0, $bulan, $d, $tahun)) == 6) {
                echo "</tr>";
            }
        }
        echo '</table></div>';
    }

    public function SinglePost(Request $request, $slug)
    {
        App::setLocale($request->session()->get('lang'));
        $getLanguage = $request->session()->get('lang');
        $singlePostDB = $this->landingPage->mSinglePost('post_slug_' . $getLanguage, $slug);

        // Language Check
        $titleLang = 'post_title_' . $getLanguage;
        $categoryLang = 'category_title_' . $getLanguage;
        $contentLang = 'post_content_' . $getLanguage;

        foreach ($singlePostDB as $single) {

            $pTitle     = $single->$titleLang;
            $pCategory  = $single->$categoryLang;
            $pAuthor    = $single->users_name;
            $pThumbnail = $single->post_thumbnail;
            $pContent   = $single->$contentLang;
            $pDate      = $single->post_date_created;

            $data = array(
                'title' => $pTitle,
                'slug' => $slug,
                'kategori' => $pCategory,
                'author' => $pAuthor,
                'thumbnail' => $pThumbnail,
                'content' => $pContent,
                'date' => date('d F Y', strtotime($pDate))
            );
            return view("content/singlePost", $data);
        }
    }

    public function AgendaPost(Request $request, $slug)
    {
        App::setLocale($request->session()->get('lang'));
        $getLanguage = $request->session()->get('lang');
        $singleAgendaDB = $this->landingPage->mSingleAgenda('agenda_slug_' . $getLanguage, $slug);

        // Language Check
        $titleLang = 'agenda_title_' . $getLanguage;
        $descLang = 'agenda_desc_' . $getLanguage;

        foreach ($singleAgendaDB as $single) {

            $aTitle         = $single->$titleLang;
            $aDesc          = $single->$descLang;
            $aLocation      = $single->agenda_location;
            $aDate          = date('d F Y', strtotime($single->agenda_date_created));
            $aAuthor        = $single->users_name;
            // Day
            $aDayStart      = date('d', strtotime($single->agenda_start));
            $aDayEnd        = date('d', strtotime($single->agenda_end));
            // Month
            $aMonthStart    = date('F', strtotime($single->agenda_start));
            $aMonthEnd      = date('F', strtotime($single->agenda_end));
            // Year
            $aYearStart     = date('Y', strtotime($single->agenda_start));
            $aYearEnd       = date('Y', strtotime($single->agenda_end));
            // Time
            $aHoursStart    = date('H', strtotime($single->agenda_start));
            $aHoursEnd      = date('H', strtotime($single->agenda_end));
            $aMinStart      = date('i', strtotime($single->agenda_start));
            $aMinEnd        = date('i', strtotime($single->agenda_end));

            $data = array(
                'title' => $aTitle,
                'slug' => $slug,
                'locate' => $aLocation,
                'dS' => $aDayStart,
                'dE' => $aDayEnd,
                'moS' => $aMonthStart,
                'moE' => $aMonthEnd,
                'yS' => $aYearStart,
                'yE' => $aYearEnd,
                'hS' => $aHoursStart,
                'hE' => $aHoursEnd,
                'miS' => $aMinStart,
                'miE' => $aMinEnd,
                'date' => $aDate,
                'desc' => $aDesc,
                'author' => $aAuthor,
                'kategori' => 'Agenda'
            );
            return view("content/agendaPost", $data);
        }
    }

    public function AgendaList(Request $request)
    {
        App::setLocale($request->session()->get('lang'));
        $data = array(
            'title' => 'Agenda',
            'kategori' => 'Agenda'
        );
        return view("content/agendaList", $data);
    }

    public function Kategori(Request $request, $slug)
    {
        App::setLocale($request->session()->get('lang'));
        $getLanguage = $request->session()->get('lang');
        $table = $this->landingPage->mListPostCategory('category_title_' . $getLanguage, $slug);

        $data = array(
            'title' => $slug,
            'slug' => $slug,
            'kategori' => $slug,
            'slugLang' => 'post_slug_' . $getLanguage,
            'titleLang' => 'post_title_' . $getLanguage,
            'categoryLang' => 'category_title_' . $getLanguage,
            'subtitleLang' => 'post_subtitle_' . $getLanguage,
            'listPost' => $table
        );
        return view("content/kategori", $data);
    }

    public function PencarianTerkait(Request $request)
    {
        App::setLocale($request->session()->get('lang'));
        $getLanguage = $request->session()->get('lang');
        $t = $this->landingPage->mListPostSearch('post_title_' . $getLanguage, $request->pencarian);

        $data = array(
            'title' => 'Hasil Pencarian : ' . $request->pencarian,
            'listPost' => $t,
            'titleLang' => 'post_title_' . $getLanguage,
            'categoryLang' => 'category_title_' . $getLanguage,
            'subtitleLang' => 'post_subtitle_' . $getLanguage,
            'kategori' => $request->pencarian
        );
        return view("content/pencarianTerkait", $data);
    }

    public function Profil(Request $request)
    {
        App::setLocale($request->session()->get('lang'));
        $data = array(
            'title' => 'Profil STMIK Bandung',
            'kategori' => 'Profil'
        );
        return view("content/profil", $data);
    }

    public function VisiMisi(Request $request)
    {
        App::setLocale($request->session()->get('lang'));
        $data = array(
            'title' => 'Visi & Misi STMIK Bandung',
            'kategori' => 'Visi & Misi'
        );
        return view("content/visiMisi", $data);
    }

    public function FakultasPrestasi(Request $request)
    {
        App::setLocale($request->session()->get('lang'));
        $data = array(
            'title' => 'Fakultas & Prestasi STMIK Bandung'
        );
        return view("content/fakultasPrestasi", $data);
    }

    public function Pimpinan(Request $request)
    {
        App::setLocale($request->session()->get('lang'));
        $data = array(
            'title' => 'Pimpinan STMIK Bandung',
            'kategori' => 'Pimpinan',
            'getLanguage' => $request->session()->get('lang')
        );
        return view("content/pimpinan", $data);
    }

    public static function getPimpinan($id, $field)
    {
        $table = DB::table('stmik_pimpinan')->where('pimpinan_id', $id)->get();
        foreach ($table as $T) {
            return $T->$field;
        }
    }

    public function StrukturOrganisasi(Request $request)
    {
        App::setLocale($request->session()->get('lang'));
        $data = array(
            'title' => 'Struktur Organisasi STMIK Bandung',
            'kategori' => 'Struktur Organisasi'
        );
        return view("content/strukturOrganisasi", $data);
    }

    public function Login(Request $request)
    {
        App::setLocale($request->session()->get('lang'));

        /*
        if (URL::to('/') != 'https://user.stmik-bandung.ac.id' || URL::to('/') . '/' != 'https://user.stmik-bandung.ac.id/') {
            abort(404);
        }
        */

        $data = array(
            'title' => 'Login'
        );
        return view("content/login", $data);
    }

    public function Auth(Request $request)
    {
        if ($request->session()->has('stmik_adm_logged')) {
            $request->session()->forget('stmik_adm_logged');
            $request->session()->forget('stmik_adm_token');
            $request->session()->forget('stmik_adm_id');
            $request->session()->forget('stmik_adm_user');
            $request->session()->forget('stmik_adm_level');
        }

        $token_log = app('App\Http\Controllers\RandomController')->Digit(5);
        $check_log = $this->landingPage->mLogin($request->user, md5($request->pass))->count();
        $check_log_list = $this->landingPage->mLogin($request->user, md5($request->pass))->get();

        if ($check_log == 1) {
            foreach ($check_log_list as $cLL) {
                if ($cLL->users_level == 1) {
                    $level = "Administrator";
                } else if ($cLL->users_level == 3) {
                    $level = "Pimpinan";
                } else {
                    $level = "Staff";
                }
                $request->session()->put('stmik_adm_logged', 1);
                $request->session()->put('stmik_adm_token', $token_log);
                $request->session()->put('stmik_adm_id', $cLL->users_id);
                $request->session()->put('stmik_adm_username', $cLL->users_username);
                $request->session()->put('stmik_adm_user', $cLL->users_name);
                $request->session()->put('stmik_adm_level', $level);
                return redirect('/dashboard');
            }
        } else {
            return redirect('/login')->with([
                'result' => 'Username atau password salah',
                'action' => 'error'
            ]);
        }
    }

    public function KalenderAkademikDetail()
    {
        $data = array(
            'title' => 'Kalender Akademik',
            'kategori' => 'Kalender'
        );
        return view("content/kalenderAkademikDetail", $data);
    }

    public function Anggota()
    {
        $data = array(
            'title' => 'Daftar Staff STMIK Bandung',
            'kategori' => 'Staff'
        );
        return view("content/anggota", $data);
    }

    public function AnggotaUrutan($id)
    {
        $data = array(
            'id' => $id
        );
        return view("content/anggotaUrutan", $data);
    }

    public function DetailAnggota($id)
    {
        $checkStat = DB::table('stmik_users')->where('users_id', $id)->get();

        foreach ($checkStat as $cStat) {
            if ($cStat->users_level == 2) {
                $table = DB::table('stmik_v_staff')->where('users_id', $id)->get();
                $path_file = 'assets/img/staff-img';
                $field_thumb = 'staff_image';
                $field = 'staff_';
                $dokumen = DB::table('stmik_file')->where('file_owner', $cStat->users_username)->get();
                $pendididkan = DB::table('stmik_pendidikan')->orderBy('pendidikan_lulusan', 'ASC')->where('pendidikan_users', $cStat->users_username)->get();
            } else if ($cStat->users_level == 3) {
                $table = DB::table('stmik_v_pimpinan')->where('users_id', $id)->get();
                $path_file = 'assets/img/leader-img';
                $field_thumb = 'pimpinan_image';
                $field = 'pimpinan_';
                $dokumen = DB::table('stmik_file')->where('file_owner', $cStat->users_username)->get();
                $pendididkan = DB::table('stmik_pendidikan')->orderBy('pendidikan_lulusan', 'ASC')->where('pendidikan_users', $cStat->users_username)->get();
            } else {
                return redirect('/anggota');
            }
        }

        $data = array(
            'title' => 'Detail Staff STMIK Bandung',
            'kategori' => 'Detail Staff',
            'table' => $table,
            'pendidikan' => $pendididkan,
            'pathThumb' => $path_file,
            'fieldThumb' => $field_thumb,
            'field' => $field,
            'dokumen' => $dokumen
        );
        return view("content/detailAnggota", $data);
    }

    public static function SetKalenderAkademik($hari, $bulan, $tahun)
    {
        $jumlahhari = date("t", mktime(0, 0, 0, $bulan, $hari, $tahun));
        $listBulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        date_default_timezone_set('Asia/Jakarta');

        $s = date("w", mktime(0, 0, 0, $bulan, 1, $tahun));

        // Tanggal Kosong
        for ($ds = 1; $ds <= $s; $ds++) {
            echo "<td></td>";
        }

        // Jumlah Tanggal/Hari
        for ($d = 1; $d <= $jumlahhari; $d++) {

            // Warna Tanggal Biasa
            if (date("w", mktime(0, 0, 0, $bulan, $d, $tahun)) == 0) {
                echo "<tr>";
            }
            $warna = "#000000";

            // Warna Tanggal Minggu
            if (date("l", mktime(0, 0, 0, $bulan, $d, $tahun)) == "Sunday") {
                $warna = "#FF0000";
            }

            // Tanggal Sekarang
            if ($d == date('d') && $bulan == date('m') && $tahun == date('Y')) {
                $background = "#transparent";
                $fontWeight = "bold";
            } else {
                $background = "transparent";
                $fontWeight = "normal";
            }

            // Jadwal Schedule
            if ($d >= 12 && $d <= 14 && $bulan = 02) {
                $background = "#003679";
            }

            if ($d >= 20 && $d <= 22 && $bulan = 02) {
                $background = "#FFBB38";
            }

            // Output
            echo "<td class='font-weight-" . $fontWeight . " py-4' style='background: " . $background . "' align='center' valign=middle> <span style=\"color:$warna\">$d</span></td>";

            // Tutup
            if (date("w", mktime(0, 0, 0, $bulan, $d, $tahun)) == 6) {
                echo "</tr>";
            }
        }
    }

    public function SPMI()
    {
        $data = array(
            'title' => 'SPMI STMIK Bandung',
            'kategori' => 'SPMI'
        );
        return view("content/spmi", $data);
    }

    public function Kurikulum()
    {
        $data = array(
            'title' => 'Kurikulum STMIK Bandung',
            'kategori' => 'Kurikulum'
        );
        return view("content/kurikulum", $data);
    }

    public function Akreditasi()
    {
        $data = array(
            'title' => 'Akreditasi STMIK Bandung',
            'kategori' => 'Akreditasi'
        );
        return view("content/akreditasi", $data);
    }

    public function TeknikInformatika()
    {
        $pelProfesi = array(
            'IT Support',
            'Database Administrator',
            'Software Developer',
            'Database Specialist',
            'Computer Network Specialist',
            'System Analyst',
            'Project Analyst',
            'IT Manager',
            'IT Consultant',
            'Research Assistant',
            'Trainer',
            'Technopreneur'
        );

        $data = array(
            'title' => 'Teknik Informatika S1 STMIK Bandung',
            'kategori' => 'Teknik Informatika S1',
            'peluangProfesi' => $pelProfesi
        );
        return view("content/teknikInformatika", $data);
    }

    public function aplikasi()
    {
        $pelAplikasi = array(
            'SISTER',
            'LMS',
            'E-Perpus',
            'Jurnal',
            'DMS',
            'SPMI',
            'PMB',
            'APK Mobile',
            'SAT',
            'Tracer Studi',
            'e-Form'
            
            
        );
        $linkAplikasi = array(
            'http://sister.stmik-bandung.ac.id:18089/',
            'https://stmik-bandung.merdeka.academy/',
            'http://perpus.stmik-bandung.ac.id:18090/eperpus/',
            'https://journal.stmik-bandung.ac.id/index.php/JurnalTI',
            'http://dms.stmik-bandung.ac.id',
            'https://spmi.stmik-bandung.ac.id',
            'https://pmb.stmik-bandung.ac.id',
            'https://bit.ly/apkStmikBdg',
            '/#',
            'https://forms.gle/VJqRRkQjBKcGEXAs7',
            'http://form.stmik-bandung.ac.id:18092/eform/'
            
            
        );
        $collaps = array(
            'sister',
            'lms',
            'e-perpus',
            'journal',
            'dms',
            'spmi',
            'pmb',
            'apk',
            'sat',
            'tracer',
            'eform'
            
            
        );
        $desc = array(
            'Sister atau Sisterm Terintergritas adalah Sistem Informasi mengenai intregritas STMIK Bandung',
            'LMS atau Learn Management Sistem adalah Mengenai nedia Pembelajaran STMIK Bandung',
            'E-Perpus adalah Sistem informasi mengenai perpustakaan yang ada di STMIK Badung ',
            'Journal adalah aplikasi mengenai Kumpulan Jurnal yang diterbitkan STMIK BANDUNG.',
            'DMS atau Document Management Sistem adalah kumpulan document mengenain STMIK BANDUNG',
            'SPMI atau Standar Penjaminan Mutu Internal adalah Sistem Informasi kegiatan sistemik penjaminan mutu pendidikan tinggi oleh setiap perguruan tinggi secara otonom',
            'PMB atau Penerimaan Mahasiswa Baru adalah Sistem Informasi mengenai pendaftaran mahasiswa baru di STMIK BANDUNG',
            'APK MOBILE adalah Aplikasi mobile (android) STMIK BANDUNG',
            'SAT atau Sistem Akademik Terintergritas adalah secara khusus dirancang untuk memenuhi kebutuhan Perguruan Tinggi yang menginginkan layanan pendidikan yang terkomputerisasi untuk meningkatkan kinerja, kualitas layanan, daya saing serta kualitas SDM yang dihasilkannya.',
            'Tracer Study adalah studi mengenai lulusan lembaga penyelenggara pendidikan tinggi.',
            'eForm adalah kumpulan formulir yang bisa digunakan oleh civitas akademik STMIK Bandung.'
            
        );

        $data = array(
            'title' => 'Daftar Aplikasi Penunjang ',
            'kategori' => 'STMIK Bandung',
            'aplikasi' => $pelAplikasi,
            'linkAplikasi' => $linkAplikasi,
            'collapsapk' => $collaps,
            'desc' => $desc
        );
        return view("content/aplikasi", $data);
    }

    public function SistemInformasi()
    {
        $pelProfesi = array(
            'IT Support',
            'Database Administrator',
            'Software Developer',
            'Database Specialist',
            'Computer Network Specialist',
            'System Analyst',
            'Project Analyst',
            'IT Manager',
            'IT Consultant',
            'Research Assistant',
            'Trainer',
            'Technopreneur'
        );
        
        $data = array(
            'title' => 'Sistem Informasi S1 STMIK Bandung',
            'kategori' => 'Sistem Informasi S1',
            'peluangProfesi' => $pelProfesi
        );
        return view("content/sistemInformasi", $data);
    }
}
