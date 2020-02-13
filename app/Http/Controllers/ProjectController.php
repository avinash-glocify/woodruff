<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

use App\Models\Project;
use App\Models\SiteMaps;
use App\Models\Csv;
use App\Models\GoogleAnalytics;
use App\Models\GoogleAnalyticsFilter;
use App\Models\GoogleSearchConsoleFilter;
use App\Models\SearchConsole;
use App\Models\BestKeywords;
use App\Models\MainKeyword;
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

    public function csv($id)
    {
        $project = Project::findOrFail($id);
        $csvs = Csv::where('project_id', $id)->get();
        return view('projects.view', compact('csvs', 'project'));
    }

    public function googleAnalytics($id)
    {
        $project      = Project::findOrFail($id);
        $analytics    = GoogleAnalytics::where('project_id', $id)->get();
        return view('projects.view', compact('analytics', 'project'));
    }

    public function googleAnalyticsSearch($id)
    {
        $project      = Project::findOrFail($id);
        $analytics    = GoogleAnalyticsFilter::where('project_id', $id)->get();
        return view('projects.view', compact('analytics', 'project'));
    }

    public function googleConsole($id)
    {
        $project      = Project::findOrFail($id);
        $analytics    = SearchConsole::where('project_id', $id)->get();
        return view('projects.view', compact('analytics', 'project'));
    }

    public function consoleSearch($id)
    {
        $project      = Project::findOrFail($id);
        $analytics    = GoogleSearchConsoleFilter::where('project_id', $id)->get();
        return view('projects.view', compact('analytics', 'project'));
    }

    public function bestKeywords($id)
    {
        $project      = Project::findOrFail($id);
        $analytics    = BestKeywords::where('project_id', $id)->get();
        return view('projects.view', compact('analytics', 'project'));
    }

    public function mainKeywords($id)
    {
        $project      = Project::findOrFail($id);
        $analytics    = MainKeyword::where('project_id', $id)->get();
        return view('projects.view', compact('analytics', 'project'));
    }
}
