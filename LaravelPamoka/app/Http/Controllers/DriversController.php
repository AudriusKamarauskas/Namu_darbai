<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Http\Requests\DriversRequest;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        app()->setLocale('lt');
        $drivers = Driver::withTrashed()->orderBy('name', 'desc')->paginate(8);

        return view('drivers.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DriversRequest $request)
    {   
        $data = [
            'name' => $request->name,
            'city' => $request->city,
        ];

        Driver::create($data);

        return redirect()->route('drivers.index');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driver = Driver::where('driverId', $id)->first();

        return view('drivers.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $driver = Driver::where('driverId', $id)->first();

        $data = [
            'name' => $request->name,
            'city' => $request->city,
        ];
        
        $driver->update($data);

        return redirect()->route('drivers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Driver::where('driverId', $id)->first()->delete();
        
        return redirect()->route('drivers.index');
    }
    public function restore($id)
    {
         
        Driver::onlyTrashed()->where('driverId', $id)->first()->restore();
        return redirect()->route('drivers.index');
    }
}
