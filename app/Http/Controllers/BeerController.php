<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Beer;
use App\Beerslist;
use App\Repositories\BeerRepository;

use Session;

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
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'beerid' => 'required',
            'beerslistid' => 'required'
        ]);

        $beer = Beer::find($request->beerid);
        $list = Beerslist::find($request->beerslistid);

        $list->beers()->attach($beer);

        Session::flash('flash_message', 'Beer successfully added !');
        
        return redirect('/list/'.$request->beerslistid);

 
    }

    /**
     * Destroy the given beer.
     *
     * @param  Request  $request
     * @param  Beer  $beer
     * @return Response
     */
    public function destroy(Request $request, $beerslist_id, $beer_id)
    {
        
        $beerslist = Beerslist::find($beerslist_id);
        $beer = Beer::find($beer_id);
        //$this->authorize('destroy', $beer);

        if($beerslist->user_id == $request->user()->id){
            $beerslist->beers()->detach($beer);
        }
        Session::flash('flash_message', 'Beer successfully deleted !');
        return redirect('/list/'.$beerslist->id);

    }
}
