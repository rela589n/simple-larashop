<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $properties = Property::paginate(10);
        return view('auth.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('auth.properties.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(PropertyRequest $request)
    {
        Property::create($request->all());
        return redirect()->route('properties.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Property  $property
     * @return Response
     */
    public function show(Property $property)
    {
        return view('auth.properties.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Property  $property
     * @return Response
     */
    public function edit(Property $property)
    {
        return view('auth.properties.form', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Property  $property
     * @return Response
     */
    public function update(PropertyRequest $request, Property $property)
    {
        $property->update($request->all());
        return redirect()->route('properties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Property  $property
     * @return Response
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('properties.index');
    }
}
