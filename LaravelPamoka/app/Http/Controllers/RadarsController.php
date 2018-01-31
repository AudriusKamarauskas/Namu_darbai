<?php

namespace App\Http\Controllers;

use App\Http\Requests\RadarsRequest;
use App\Radar;
use App\Repositories\RadarRepository;

class RadarsController extends Controller
{

    protected $radarRepository;

    public function __construct(RadarRepository $radarRepository) 
    {
        $this->radarRepository = $radarRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $radars = $this->radarRepository->getAllWithTrashed(8);
        return view('radars.index', compact('radars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('radars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RadarsRequest $request)
    {
        $data = [
            'date' => $request->date,
            'number' => $request->number,
            'distance' => $request->distance,
            'time' => $request->time,
            'created_by' => auth()->user()->id,
        ];

        $radar = $this->radarRepository->store($data);

        return redirect()->route('radars.index');
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
        $radar = $this->radarRepository->edit($id);

        return view('radars.edit', compact('radar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RadarsRequest $request, $id)
    {
        $data = [
            'date' => $request->date,
            'number' => $request->number,
            'distance' => $request->distance,
            'time' => $request->time,
            'updated_by' => auth()->user()->id,
        ];
        
        $radar = $this->radarRepository->update($id, $data);

        return redirect()->route('radars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $radar = $this->radarRepository->destroy($id);
        
        // Session::flash('message', 'Radaras sekmingai istrintas!');
        return redirect()->route('radars.index');
    }
    public function restore($id)
    {
        $radar = $this->radarRepository->restore($id);
        return redirect()->route('radars.index');
    }
}
