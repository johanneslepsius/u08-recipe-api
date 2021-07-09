<?php

namespace App\Http\Controllers;

use App\Models\Recipelist;
use Illuminate\Http\Request;

class RecipelistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $user = $request->user();
        $recipelists = Recipelist::where('user_id', $user['id'])->get();

        return $recipelists;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();

        return Recipelist::create([
            'name' => $request['name'],
            'user_id' => $user['id']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipelist  $recipelist
     * @return \Illuminate\Http\Response
     */
    public function show(Recipelist $recipelist)
    {
        return $recipelist;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipelist  $recipelist
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipelist $recipelist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipelist  $recipelist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipelist $recipelist)
    {
        $recipelist->update($request->all());
        return($recipelist);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipelist  $recipelist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipelist $recipelist)
    {
        return Recipelist::destroy($recipelist['id']);
    }
}
