<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Beer;
use App\Brewery;
use App\Beerslist;
use App\Repositories\BeerRepository;
use App\Repositories\BeerslistRepository;
use DB;
use Session;
use Illuminate\Support\Facades\Input;

class PagesController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BeerslistRepository $beerslists)
    {
        $this->middleware('auth');
        $this->beerslists = $beerslists;
    }

    public function index(Request $request)
    {

        $beerslists = $this->beerslists->forUser($request->user());

        return view('beerslists.index', [
            'beerslists' => $beerslists,
        ]);
    }
}
