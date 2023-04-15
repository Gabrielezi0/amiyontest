<?php

namespace App\Http\Controllers;

use AlesZatloukal\GoogleSearchApi\GoogleSearchApi;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the search results.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function search(Request $request)
    {
        $keyword = $request->keywords;
        
        $googleSearch = new GoogleSearchApi();

        $searchresults = $googleSearch->getResults($keyword); 

        $result = ['searchresults' => $searchresults];

        return view('searchresults', $result);
        // return view('home');
    }
}
