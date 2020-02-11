<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imports\ProjectDetailImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Project;
use App\Models\ProjectDetail;

class ProjectDetailController extends Controller
{
    public function storeSitemap(Request $request, $id)
    {
        $rules   = ['sitemap_file' => 'required'];
        $request->validate($rules);

        $project = Project::findOrFail($id);
        $import  = new ProjectDetailImport($project);

        Excel::import($import,  request()->file('sitemap_file'));
        return redirect()->back()->with(['success' => 'Sitemap Imported SuccessFully' ]);
    }

    public function storeAnalytics(Request $request, $id)
    {
        $rules   = ['analytics_file' => 'required'];
        $request->validate($rules);

        $project = Project::findOrFail($id);
        $import  = new ProjectDetailImport($project);

        Excel::import($import,  request()->file('analytics_file'));
        return redirect()->back()->with(['success' => 'Google Analytics File Imported SuccessFully' ]);
    }

    public function storeConsole(Request $request, $id)
    {
        $rules   = ['console_file' => 'required'];
        $request->validate($rules);

        $project = Project::findOrFail($id);
        $import  = new ProjectDetailImport($project);

        Excel::import($import,  request()->file('console_file'));
        return redirect()->back()->with(['success' => 'Google Console File Imported SuccessFully' ]);
    }

    public function storeSearchFilter(Request $request, $id)
    {
        $rules   = ['filter_file' => 'required'];
        $request->validate($rules);

        $project = Project::findOrFail($id);
        $import  = new ProjectDetailImport($project);

        Excel::import($import,  request()->file('filter_file'));
        return redirect()->back()->with(['success' => 'Search Filter File Imported SuccessFully' ]);
    }

    public function storeCsv(Request $request, $id)
    {
        $rules   = ['csv_file' => 'required'];
        $request->validate($rules);

        $project = Project::findOrFail($id);
        $import  = new ProjectDetailImport($project);

        Excel::import($import,  request()->file('csv_file'));
        return redirect()->back()->with(['success' => 'Csv File Imported SuccessFully' ]);
    }
}
