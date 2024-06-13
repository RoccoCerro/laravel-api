<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request){
        // $progect = Project::all();

        $per_page = $request->perPage ?? 10;

        $result = Project::with('technologies', 'type')->paginate($per_page);
        
        return response()->json([
            'results' => $result
        ]);

    }

    public function show(Request $request){
        $results = Project::where('slug', $request->slug)->get();

        return response()->json([
            'results' => $results
        ]);
    }
}
