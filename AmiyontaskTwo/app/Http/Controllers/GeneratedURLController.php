<?php

namespace App\Http\Controllers;

use App\Models\GeneratedURL;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGeneratedURLRequest;
use App\Http\Requests\UpdateGeneratedURLRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class GeneratedURLController extends Controller
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
     * Display a listing of the resource.
     */
    public function index()
    {
        $generatedURLs = GeneratedURL::where('uuid',Auth::id())
            ->orderBy('created_at','desc')
            ->take(10)
            ->get();
        $results = ['generatedURLs' => $generatedURLs];
        return view('home',$results);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $generatedURL = new GeneratedURL();
        $generatedURL->generated_key = md5(uniqid());
        $generatedURL->original_url = $request->url;
        $generatedURL->uuid = Auth::id();
        $generatedURL->save();
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGeneratedURLRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(GeneratedURL $generatedURL)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GeneratedURL $generatedURL)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGeneratedURLRequest $request, GeneratedURL $generatedURL)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GeneratedURL $generatedURL)
    {
        //
    }

    /**
     * Access Link.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function accessLink(Request $request)
    {
        $generatedKey =  str_replace("https://shrt.url?q=", "",$request->url);
        // if(!ctype_alnum($generatedKey)){
        //     return view('welcome',['error' => 'No Link Found']);
        // }
        $generatedURL = GeneratedURL::where('generated_key',$generatedKey)
        ->first()->original_url ?? '/';
        return Redirect::to($generatedURL);
    }
}
