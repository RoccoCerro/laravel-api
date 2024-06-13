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

        $results = Project::with('technologies', 'type')->paginate($per_page);
        
        return response()->json([
            'results' => $results
        ]);

    }

    public function show(Request $request){
        $result = Project::where('slug', $request->slug)->first();

        return response()->json([
            'result' => $result
        ]);
    }
}
