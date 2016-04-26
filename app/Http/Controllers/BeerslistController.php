<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Beerslist;
use App\Repositories\BeerslistRepository;

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
        return view('beerslists.index', [
            'beerslists' => $this->beerslists->forUser($request->user()),
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

        $request->user()->beerslists()->create([
            'name' => $request->name,
        ]);

        return redirect('/lists');
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
            'beerslist' => $beerslist,
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
        $list->save();

        return redirect('/lists');
    }
}
