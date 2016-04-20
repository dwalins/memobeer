<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Auth;
use DB;
use Response;

class SearchController extends Controller
{
public function autocomplete(){
    $term = Input::get('term');
    
    $results = array();
    
    $queries = DB::table('beers')
        ->where('name', 'LIKE', '%'.$term.'%')
        ->orWhere('brewery', 'LIKE', '%'.$term.'%')
        ->take(18)->get();
    
    foreach ($queries as $query)
    {

        $results[] = [ 'id' => $query->id, 'value' => $query->name, 'brewery' => $query->brewery, 'url' => $query->logo_small_url, 'abv' => $query->abv ];
    }
return Response::json($results);
}
}