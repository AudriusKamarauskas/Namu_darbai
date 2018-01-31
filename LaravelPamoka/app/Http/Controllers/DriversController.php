<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Http\Requests\DriversRequest;
use App\Repositories\DriverRepository;

class DriversController extends Controller
{

    protected $driverRepository;

    public function __construct(DriverRepository $driverRepository) 
    {
        $this->driverRepository = $driverRepository;
    }

    public function index()
    {   
        app()->setLocale('lt');
        $drivers = $this->driverRepository->getAllWithTrashed(8);

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

        $driver = $this->driverRepository->store($data);

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
        $driver = $this->driverRepository->edit($id);

        return view('drivers.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DriversRequest $request, $id)
    {

        $data = [
            'name' => $request->name,
            'city' => $request->city,
        ];
        
        $driver = $this->driverRepository->update($id, $data);

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
        $driver = $this->driverRepository->destroy($id); 
        
        return redirect()->route('drivers.index');
    }
    public function restore($id)
    {
         
        $driver = $this->driverRepository->restore($id);
        return redirect()->route('drivers.index');
    }
}
