<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeofServices;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $datas = Level::all();
        $datas = TypeofServices::orderBy('id', 'desc')->get();
        $title = "Data Service";
        return view('service.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create Service";
        return view('service.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        TypeofServices::create($request->all());
        return redirect()->to('service')->with('success', 'Data saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Edit Service";
        $service = TypeofServices::find($id);
        // $level = Levels::findorFail($id);
        // $level = Levels::where('id',$id)->first();
        return view('service.edit', compact('title', 'service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = TypeofServices::find($id);
        $service->service_name = $request->service_name;
        $service->price = $request->price;
        $service->description = $request->description;
        $service->save();
        return redirect()->to('service')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = TypeofServices::find($id);
        $service->delete();
        return redirect()->to('service')->with('success', 'Data deleted successfully');
    }
}
