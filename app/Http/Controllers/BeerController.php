<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Beer;
use App\Beerslist;
use App\Repositories\BeerRepository;
use DB;
use Session;
use Illuminate\Support\Facades\Input;

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

        if(array_key_exists('add', Input::all())){

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

        }else if(array_key_exists('search', Input::all())){

            return redirect('/search/results/'.$request->name);
            // $results = $this->search($request);
            // return view('search.results', [
            //     'results' => $results,
            // ]);
        }

    }

    // public function search(Request $request){

    //     $this->validate($request, [
    //         'name' => 'required|max:255|min:3',
    //     ]);

    //     $term = $request->name;
    //     $results = array();
        
    //     $queries = DB::table('beers')
    //         ->where('name', 'LIKE', '%'.$term.'%')
    //         ->orWhere('brewery_name', 'LIKE', '%'.$term.'%')->get();

    //     $count = DB::table('beers')
    //         ->where('name', 'LIKE', '%'.$term.'%')
    //         ->orWhere('brewery_name', 'LIKE', '%'.$term.'%')->count();

    //     return $queries;
    // }

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

    public function show($id){

        $beer = Beer::find($id);

        return view('beers.show', [
            'beer' => $beer,
        ]);

    }
}
