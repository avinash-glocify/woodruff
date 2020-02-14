<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

use App\Models\Project;
use App\Models\SiteMaps;
use App\Models\Ahref;
use App\Models\GoogleSearchConsole;
use App\Models\ScreamingFrog;
use Auth;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $user  = Auth::user();
        $rules = ['name' => 'required'];

        $request->validate($rules);

        $project = Project::create(['name' => $request->name, 'user_id' => $user->id]);
        return redirect()->route('project.index')->with(['success' => 'Project Created SuccessFully']);
    }

    public function show($id)
    {
        $project  = Project::findOrFail($id);
        return view('projects.view', compact('project'));
    }

    public function edit(Project $project)
    {
        //
    }

    public function update(Request $request, Project $project)
    {
        //
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return response(['success' => 'Project Deleted SuccessFully']);
    }

    public function downloadSample($type)
    {
        $file    = public_path(). "/sampleFiles/".$type.".csv";
        $headers = array('Content-Type: application/csv');
        return Response::download($file, $type.'.csv', $headers);
    }

    public function sitemap($id)
    {
        $project = Project::findOrFail($id);
        $sitemaps = SiteMaps::where('project_id', $id)->get();
        return view('projects.view', compact('sitemaps', 'project'));
    }


    public function googleConsole($id)
    {
        $project      = Project::findOrFail($id);
        $analytics    = GoogleSearchConsole::where('project_id', $id)->get();
        return view('projects.view', compact('analytics', 'project'));
    }

    public function aHrefs($id)
    {
        $project      = Project::findOrFail($id);
        $analytics    = Ahref::where('project_id', $id)->get();
        return view('projects.view', compact('analytics', 'project'));
    }

    public function aggregation($id)
    {
        $project      = Project::findOrFail($id);
        $analytics    = Ahref::where('project_id', $id)->get();
        return view('projects.view', compact('analytics', 'project'));
    }

    public function screamingFrogs($id)
    {
        $project      = Project::findOrFail($id);
        $analytics    = ScreamingFrog::where('project_id', $id)->get();
        return view('projects.view', compact('analytics', 'project'));
    }
}
