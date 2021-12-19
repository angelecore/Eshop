<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\DailyPriceChange;
use App\Models\Dapp;
use App\Models\CryptoNews;
use App\Models\User;
use App\Services\RandomService;
use Carbon\Carbon;
use App\Models\Forumas;
use App\Services\LeaderboardService;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class MainController extends Controller
{
   /* public function index()
    {
        $prices = DailyPriceChange::all();
        $posts  = RandomService::getPosts();
        $dapps  = RandomService::getDapps();

        return view('main.index', [
            'prices' => $prices,
            'posts'  => $posts,
            'dapps'  => $dapps,
            'date'   => (new Carbon('now - 30mins'))->diffForHumans()
        ]);
    }
*/

    public function forum()
    {
        $forumas= Forumas::paginate(15);
        return view('forum.index',compact('forumas'));
    }

}
