<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Beer;
use App\Beerslist;
use App\Repositories\BeerRepository;

class BeerController extends Controller
{
    /**
     * The Beer repository instance.
     *
     * @var BeerRepository
     */
    protected $beers;

    /**
     * Create a new controller instance.
     *
     * @param  BeerRepository  $Beers
     * @return void
     */
    public function __construct(BeerRepository $beers)
    {
        $this->middleware('auth');
        $this->beers = $beers;
    }


    /**
     * Create a new beer.
     *
     * @param  Request  $request
     * @return Response
     */
    // public function store(Request $request)
    // {

    //     $this->validate($request, [
    //         'name' => 'required|max:255',
    //         'beerid' => 'required'
    //     ]);

    //     $request->user()->beers()->create([
    //         'name' => $request->beerid,
    //     ]);

    //     return redirect('/lists');
    // }

    /**
     * Destroy the given beer.
     *
     * @param  Request  $request
     * @param  Beer  $beer
     * @return Response
     */
    // public function destroy(Request $request, Beer $beer)
    // {
    //     $this->authorize('destroy', $beer);

    //     $beer->delete();

    //     return redirect('/lists');
    // }
}
