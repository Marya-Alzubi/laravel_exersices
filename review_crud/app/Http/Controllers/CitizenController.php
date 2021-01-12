<?php

namespace App\Http\Controllers;

use App\Citizen;
use Illuminate\Http\Request;

class CitizenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citizens = Citizen::all();
        return view("citizens.create", compact("citizens"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("citizens.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'citizen_fname' => 'Required',
            'citizen_gender' => 'Required',
            'citizen_city' => 'Required',
            'citizen_nid' => 'Required',
            'citizen_mobile' => 'Required',
            'citizen_address' => 'Required',
        ]);
        Citizen::create($request->all());
        return redirect("/citizens" );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Citizen $citizen)
    {
        return view('citizens.edit' , compact('citizen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Citizen $citizen)
    {
        $request->validate([
            'citizen_fname' => 'Required',
            'citizen_gender' => 'Required',
            'citizen_city' => 'Required',
            'citizen_nid' => 'Required',
            'citizen_mobile' => 'Required',
            'citizen_address' => 'Required',
        ]);
        $citizen->update($request->all());
        return redirect("/citizens");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Citizen $citizen)
    {
//        where("userid", $id)  YES   /////////////   whereUserid($id) YES   //// whereId($id)  NO   will didnot work because the column name in database is userid
        $citizen->delete();
        return redirect("/citizens");
    }
}
