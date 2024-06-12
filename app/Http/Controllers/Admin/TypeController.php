<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();

        return view("admin.types.index" , compact("types"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.types.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
        $data_types = $request->validated();

        $base_slug = Str::slug($data_types['name']);
        $slug = $base_slug;
        $n = 0;
        
        do {
            $find = Type::where('slug', $slug)->first();

            if( $find !== null) {
                $n++;
                $slug = $base_slug . '-' . $n;
            }
        } while( $find !== null );

        $data_types['slug'] = $slug;
        
        $new_type = Type::create($data_types);

        return to_route('admin.types.show', $new_type);

    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return view("admin.types.show", compact("type"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view("admin.types.edit", compact("type"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $form_data = $request->validated();

        $base_slug = Str::slug($form_data['name']);
        $slug = $base_slug;
        $n = 0;
        
        do {
            $find = Type::where('slug', $slug)->first();

            if( $find !== null) {
                $n++;
                $slug = $base_slug . '-' . $n;
            }
        } while( $find !== null );

        $form_data['slug'] = $slug;
        
        $type->update($form_data);

        return to_route('admin.types.show', $type);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return to_route('admin.types.index');
    }
}
