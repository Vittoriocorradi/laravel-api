<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {

        $projects = Project::with('type', 'technologies')->get();
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show(string $slug)
    {
        try {
            $project = Project::where('slug', $slug)->with('type', 'technologies')->first();
    
    
            if ($project) {
                return response()->json([
                    'success' => true,
                    'results' => $project
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'results' => null
                ], 404);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'results' => null
            ], 500);
        }
    }
}
