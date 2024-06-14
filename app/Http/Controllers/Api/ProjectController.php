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

    public function show(Project $project){

        $project->load('technologies', 'type');

        return response()->json([
            'project' => $project
        ]);
    }
}
