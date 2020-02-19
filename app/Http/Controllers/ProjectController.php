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
use App\Models\SemRush;
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
        return view('projects.view', compact('project'));
    }


    public function googleConsole($id)
    {
        $project      = Project::findOrFail($id);
        return view('projects.view', compact('project'));
    }

    public function aHrefs($id)
    {
        $project      = Project::findOrFail($id);
        return view('projects.view', compact('project'));
    }

    public function aggregation($id)
    {
        $project      = Project::findOrFail($id);
        return view('projects.view', compact('project'));
    }

    public function screamingFrogs($id)
    {
        $project      = Project::findOrFail($id);
        return view('projects.view', compact('project'));
    }

    public function mappedData($id)
    {
        $analytics  = ScreamingFrog::leftJoin('google_search_consoles','google_search_consoles.page', 'screaming_frogs.address')
             ->leftJoin('ahrefs','ahrefs.link_url', 'screaming_frogs.address')
             ->leftJoin('site_maps','site_maps.url', 'screaming_frogs.address')
             ->leftJoin('sem_rushes','sem_rushes.url', 'screaming_frogs.address')
            ->where('screaming_frogs.project_id', $id)
            ->select('screaming_frogs.address','screaming_frogs.id','screaming_frogs.path','screaming_frogs.title_1', 'screaming_frogs.word_count', 'screaming_frogs.canonical_link_element_1',
             'screaming_frogs.meta_description_1','screaming_frogs.content', 'screaming_frogs.status_code','screaming_frogs.indexability','screaming_frogs.last_modified',
             'screaming_frogs.inlinks', 'screaming_frogs.outlinks','screaming_frogs.crawl_depth', 'screaming_frogs.last_modified', 'screaming_frogs.h1_1',
            'sem_rushes.keyword','sem_rushes.search_volume','sem_rushes.position' ,'google_search_consoles.impressions','google_search_consoles.ctr',
            'site_maps.url as site_url',\DB::raw('COUNT(DISTINCT  ahrefs.id) as link_count'),
            \DB::raw("'' as url_1, '' as url_2, 'test' as final_url, 'test' as category, 'test' as best_keyword, 'test' as best_valume,
            'test' as best_position, 'test' as session,'test' as goal_completion, 'test' as 'conversion_rate', 'test' as goal_conversion_rate,
            'test' as change_session, 'test' as bounce_rate, 'test' as avg_time_page, 'test' as losing_trafic"))
            ->groupBy('screaming_frogs.address')
            ->get();
          return $analytics;
    }

    public function aggregationData($id)
    {
        $project      = Project::findOrFail($id);
        $analytics    = $this->mappedData($id);
        return response()->json(['data' => $analytics]);
    }

    public function sitemapData($id)
    {
        $project      = Project::findOrFail($id);
        $sitemaps     = SiteMaps::where('project_id', $id)->get();
        return response()->json(['data' => $sitemaps]);
    }

    public function searchConsoleData($id)
    {
        $project      = Project::findOrFail($id);
        $analytics    = GoogleSearchConsole::where('project_id', $id)->get();
        return response()->json(['data' => $analytics]);
    }

    public function ahrefsData($id)
    {
        $project      = Project::findOrFail($id);
        $analytics    = Ahref::where('project_id', $id)->get();
        return response()->json(['data' => $analytics]);
    }

    public function screamingFrogData($id)
    {
        $project      = Project::findOrFail($id);
        $analytics    = ScreamingFrog::where('project_id', $id)->get();
        return response()->json([
                  'html' => view('projects.tables.screaming-frog-table', compact('analytics', 'project'))->render()
          ]);
    }

    public function semRushData($id)
    {
        $project      = Project::findOrFail($id);
        $analytics    = SemRush::where('project_id', $id)->get();
        return response()->json([
                  'html' => view('projects.tables.sem-rush-table', compact('analytics', 'project'))->render()
          ]);
    }

    public function semRush($id)
    {
        $project      = Project::findOrFail($id);
        return view('projects.view', compact('project'));
    }
}
