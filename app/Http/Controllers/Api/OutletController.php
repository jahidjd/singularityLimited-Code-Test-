<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Outlet::all();
        return response()->json([
            'status'=>'success',
            'data'=>$data
        ]);
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
        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'photo'=>'required',
            
        ]);
        $array=[
            'name'=>$request->name,
            'address'=>$request->address,
            'open_time'=>$request->open_time,
            'close_time'=>$request->close_time,
            'visit_date'=>$request->visit_date,
            // 'photo'=>  implode($Photos),
        ];
        $files = [];
        if($request->file('photos')){
            foreach ($request->file('photos') as $key => $photo) {
                $key++;
                // $photo = $request->file('photos');
                $path = 'photo/outletPhoto/';
                $name = $request->name.$key. date('Ymdhis').'.'.$photo->getClientOriginalExtension();
                $photo->move($path,$name);
                $files[] = $name;
                $array['photo'] = json_encode($files);
            }
           
        }
        
        $re = Outlet::create($array);
        return response()->json([
            'status'=>'success',
            'data'=>$re
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function show(Outlet $outlet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function edit(Outlet $outlet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outlet $outlet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outlet $outlet)
    {
        //
    }
}
