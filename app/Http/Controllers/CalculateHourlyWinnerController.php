<?php

namespace App\Http\Controllers;

use App\PastInfo;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class CalculateHourlyWinnerController extends Controller
{
    public function index()
    {
        $users = User::select(['name', 'email', 'tagged', 'hourly_tag'])
            ->orderBy('hourly_tag', 'DES')
            ->orderBy('tagged', 'DES')
            ->get()
            ->take(3);
        $past = new PastInfo();
        $past->info = Carbon::now()->format('d-m-Y H:00:00');
        $past->data = json_encode($users);
        $past->save();
        DB::table('users')->update(['hourly_tag' => 0]);
        return $past;

    }
}
