<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Beer;
use App\Beerslist;
use App\User;
use App\Repositories\BeerRepository;
use App\Repositories\BeerslistRepository;
use DB;
use Session;
use Illuminate\Support\Facades\Input;
use Auth;

class BeerController extends Controller
{
    /**
     * The Beer repository instance.
     *
     * @var BeerRepository
     */
    protected $beers;
    /**
     * The List repository instance.
     *
     * @var ListRepository
     */
    protected $beerslists;

    /**
     * Create a new controller instance.
     *
     * @param  BeerRepository  $Beers
     * @return void
     */
    public function __construct(BeerRepository $beers, BeerslistRepository $beerslists)
    {
        $this->middleware('auth');
        $this->beers = $beers;
        $this->beerslists = $beerslists;
    }

    public function index(){

        $beers = Beer::all()->random(12);
        $beerslists = '';

        if(Auth::check()){
            $user_id = Auth::id();
            $user = User::find($user_id);
            $beerslists = $this->beerslists->forUser($user);
        }

        return view('beers.index', [
            'beers' => $beers,
            'beerslists' => $beerslists
        ]);

    }

    public function alphabetical($letter = 'A'){


        if($letter == '1-9'){
            $beers = Beer::where('name', 'NOT LIKE', 'A%')
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
            $beers = Beer::where('name', 'LIKE', $letter.'%')->paginate(15);
        }
        //$beers = Beer::where('name', 'LIKE', $letter.'%')->paginate(15);
        $beerslists = '';

        if(Auth::check()){
            $user_id = Auth::id();
            $user = User::find($user_id);
            $beerslists = $this->beerslists->forUser($user);
        }

        return view('beers.index', [
            'beers' => $beers,
            'beerslists' => $beerslists,
            'letter' => $letter
        ]);

    }



    /**
     * Create a new beer.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // if "add beer"
        if(array_key_exists('add', Input::all())){

            $this->validate($request, [
            'name' => 'required|max:255',
            'beerid' => 'required',
            'beerslistid' => 'required'
            ]);

        $results = DB::table('beer_beerslist')->where('beer_id', '=', $request->beerid)->where('beerslist_id', '=', $request->beerslistid)->count();
        if($results > 0){
            Session::flash('flash_message', 'You have already added this beer to this list !');
            return redirect('/list/'.$request->beerslistid);
        }

        $beer = Beer::find($request->beerid);
        $list = Beerslist::find($request->beerslistid);



        $list->beers()->attach($beer);

        Session::flash('flash_message', 'Beer successfully added !');
        
        return redirect('/list/'.$request->beerslistid);

        // if "search" beer
        }else if(array_key_exists('search', Input::all())){

            if (strpos($request->name, '/'))
                $search_term = strstr($request->name, "/",true);
            else
                $search_term = $request->name;

            

            return redirect('/search/results/'.$search_term);
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
        $beerslists = '';

        if(Auth::check()){
            $user_id = Auth::id();
            $user = User::find($user_id);
            $beerslists = $this->beerslists->forUser($user);
        }

        return view('beers.show', [
            'beer' => $beer,
            'beerslists' => $beerslists
        ]);

    }

    public function add_to_favorite(){
        
    }
}
