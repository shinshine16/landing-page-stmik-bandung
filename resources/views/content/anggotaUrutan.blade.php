<div class="col-12 col-lg-2 mt-3">
    <div class="row no-gutters justify-content-center text-center">
        <div class="col-12 text-light py-1" style="font-size: 12px; background: #003679;">
            Huruf
        </div>
        <div class="col-12 font-weight-normal py-3" style="font-size: 60px; background: #FFBB38;">
            {{ $id }}
        </div>
    </div>
</div>

<div class="col-12 col-lg-10 table-responsive mt-3">
    <?php $table1 = DB::table('stmik_users')->orderBy('users_name', 'asc')->where('users_name', 'like', $id . '%')->where('users_level', '!=', 1)->get(); ?>
    <table class="table table-sm table-striped">
        <tbody>
            @foreach ($table1 as $T)
            <tr>
                <td class="pl-2"><a href="{{ URL::to('/detailAnggota') }}/{{ $T->users_id }}">{{ $T->users_name }}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>