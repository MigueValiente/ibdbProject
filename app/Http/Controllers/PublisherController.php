<?php

namespace App\Http\Controllers;

use App\Publisher;
use Illuminate\Http\Request;
use App\Http\Requests\PublisherRequest;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function __construct()
     {
       $this->middleware('auth',['only' => ['create','store','edit','update','destroy']
     ]);
     }

    public function index()
    {
        $publishers = Publisher::paginate(10);
        return view('public.publishers.index', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('public.publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublisherRequest $request)
    {
      Publisher::create([
          'name' => request('name'),
          'slug' => str_slug(request('name'),'-'),
          'web' => request('web'),
          'address' => request('address'),
          'email' => request('email'),
      ]);

      return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
      $publisher = Publisher::where('slug', $slug)->firstOrFail();

      return view('public.publishers.show', ['publisher' => $publisher]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Publisher $publisher)
    {
        return view('public.publishers.edit',compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PublisherRequest $request, Publisher $publisher)
    {
      $publisher->update([
          'name' => request('name'),
          'slug' => str_slug(request('name'), "-"),
          'address' => request('address'),
          'web' => request('web'),
          'email' => request('email')
      ]);

      return redirect('/publishers/'.$publisher->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publisher $publisher)
    {
      $publisher->delete();

      return redirect('/');
    }
}
