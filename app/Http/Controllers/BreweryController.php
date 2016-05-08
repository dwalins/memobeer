<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Beer;
use App\Brewery;
use App\Beerslist;
use App\Repositories\BeerRepository;
use DB;
use Session;
use Illuminate\Support\Facades\Input;

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



    public function show($id){

        $brewery = Brewery::find($id);
        $beers = Beer::where('brewery_id', $brewery->breweryId)->get();

        return view('brewerys.show', [
            'brewery' => $brewery,
            'beers' => $beers
        ]);

    }
}
