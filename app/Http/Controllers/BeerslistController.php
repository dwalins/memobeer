<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Beerslist;
use App\Repositories\BeerslistRepository;
use Session;

class BeerslistController extends Controller
{
    /**
     * The List repository instance.
     *
     * @var ListRepository
     */
    protected $beerslists;

    /**
     * Create a new controller instance.
     *
     * @param  ListRepository  $leers
     * @return void
     */
    public function __construct(BeerslistRepository $beerslists)
    {
        $this->middleware('auth');

        $this->beerslists = $beerslists;
    }

    /**
     * Display a list of all of the user's lists.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {

        $beerslists = $this->beerslists->forUser($request->user());

        return view('beerslists.index', [
            'beerslists' => $beerslists,
        ]);
    }

    /**
     * Create a new list.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $insert = $request->user()->beerslists()->create(['name' => $request->name, 'color' => 'blue']);
        Session::flash('flash_message', 'List successfully created !');
        return redirect('/list/'.$insert->id);
    }

    /**
     * Destroy the given list.
     *
     * @param  Request  $request
     * @param  Beerslist  $beerslist
     * @return Response
     */
    public function destroy(Request $request, Beerslist $beerslist)
    {
        $this->authorize('destroy', $beerslist);

        $beerslist->delete();
        Session::flash('flash_message', 'List successfully deleted !');
        return redirect('/lists');
    }

    /**
     * Edit a list.
     *
     * @param  Request  $request
     * @return Response
     */
    public function edit(Request $request, $list_id)
    {
        $beerslist = Beerslist::find($list_id);
        return view('beerslists.edit', [
            'list' => $beerslist,
        ]);
    }

    /**
     * Edit a list.
     *
     * @param  Request  $request
     * @return Response
     */
    public function edit_submit(Request $request, $list_id)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $list = Beerslist::find($list_id);
        $list->name = $request->name;
        $list->color = $request->color;
        $list->save();
        Session::flash('flash_message', 'List successfully edited !');
        return redirect('/list/'.$list_id);
    }
    

    public function show($id){
        $beerslist = Beerslist::find($id);
        return view('beerslists.show', [
            'list' => $beerslist,
        ]);
    }
}
