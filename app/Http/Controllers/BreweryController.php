<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Beer;
use App\Brewery;
use App\User;
use App\Beerslist;
use App\Repositories\BeerRepository;
use DB;
use Session;
use Illuminate\Support\Facades\Input;
use Auth;

class BreweryController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @param  BeerRepository  $Beers
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $brewerys = Brewery::all()->random(12);

        if(Auth::check()){
            $user_id = Auth::id();
            $user = User::find($user_id);
        }

        return view('brewerys.index', [
            'brewerys' => $brewerys,
        ]);

    }

    public function alphabetical($letter = 'A'){


        if($letter == '1-9'){
            $brewerys = Brewery::where('name', 'NOT LIKE', 'A%')
                ->where('name', 'NOT LIKE', 'B%')
                ->where('name', 'NOT LIKE', 'C%')
                ->where('name', 'NOT LIKE', 'D%')
                ->where('name', 'NOT LIKE', 'E%')
                ->where('name', 'NOT LIKE', 'F%')
                ->where('name', 'NOT LIKE', 'G%')
                ->where('name', 'NOT LIKE', 'H%')
                ->where('name', 'NOT LIKE', 'I%')
                ->where('name', 'NOT LIKE', 'J%')
                ->where('name', 'NOT LIKE', 'K%')
                ->where('name', 'NOT LIKE', 'L%')
                ->where('name', 'NOT LIKE', 'M%')
                ->where('name', 'NOT LIKE', 'N%')
                ->where('name', 'NOT LIKE', 'O%')
                ->where('name', 'NOT LIKE', 'P%')
                ->where('name', 'NOT LIKE', 'Q%')
                ->where('name', 'NOT LIKE', 'R%')
                ->where('name', 'NOT LIKE', 'S%')
                ->where('name', 'NOT LIKE', 'T%')
                ->where('name', 'NOT LIKE', 'U%')
                ->where('name', 'NOT LIKE', 'V%')
                ->where('name', 'NOT LIKE', 'W%')
                ->where('name', 'NOT LIKE', 'X%')
                ->where('name', 'NOT LIKE', 'Y%')
                ->where('name', 'NOT LIKE', 'Z%') 
                ->paginate(15);
        }else{
            $brewerys = Brewery::where('name', 'LIKE', $letter.'%')->paginate(15);
        }

        return view('brewerys.index', [
            'brewerys' => $brewerys,
            'letter' => $letter
        ]);

    }

    public function show($id){

        $brewery = Brewery::find($id);
        $beers = Beer::where('brewery_id', $brewery->breweryId)->get();

        return view('brewerys.show', [
            'brewery' => $brewery,
            'beers' => $beers
        ]);

    }
}
