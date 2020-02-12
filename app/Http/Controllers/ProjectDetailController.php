<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imports\ProjectDetailImport;
use App\Imports\SitemapImport;
use App\Imports\csvImport;
use App\Imports\GoogleAnalyitcsImport;
use App\Imports\SearchConsoleImport;
use App\Imports\GoogleAnalyticsFilterImport;
use App\Imports\GoogleConsoleFilterImport;
use App\Imports\BestKeywordsImport;
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
        $import  = new SitemapImport($project);

        Excel::import($import,  request()->file('sitemap_file'));
        return redirect()->back()->with(['success' => 'Sitemap Imported SuccessFully' ]);
    }

    public function storeAnalytics(Request $request, $id)
    {
        $rules   = ['analytics_file' => 'required'];
        $request->validate($rules);

        $project = Project::findOrFail($id);
        $import  = new GoogleAnalyitcsImport($project, 'analytics');

        Excel::import($import,  request()->file('analytics_file'));
        return redirect()->back()->with(['success' => 'Google Analytics File Imported SuccessFully' ]);
    }

    public function storeConsole(Request $request, $id)
    {
        $rules   = ['console_file' => 'required'];
        $request->validate($rules);

        $project = Project::findOrFail($id);
        $import  = new SearchConsoleImport($project);

        Excel::import($import,  request()->file('console_file'));
        return redirect()->back()->with(['success' => 'Google Console File Imported SuccessFully' ]);
    }

    public function storeSearchFilter(Request $request, $id)
    {
        $rules   = ['console_filter_file' => 'required'];
        $request->validate($rules);

        $project = Project::findOrFail($id);
        $import  = new GoogleConsoleFilterImport($project);

        Excel::import($import,  request()->file('console_filter_file'));
        return redirect()->back()->with(['success' => 'Googlr Search Console Filter File Imported SuccessFully' ]);
    }

    public function storeCsv(Request $request, $id)
    {
        $rules   = ['csv_file' => 'required'];
        $request->validate($rules);

        $project = Project::findOrFail($id);
        $import  = new csvImport($project);

        Excel::import($import,  request()->file('csv_file'));
        return redirect()->back()->with(['success' => 'Csv File Imported SuccessFully' ]);
    }

    public function storeAnalyticsFilter(Request $request, $id)
    {
        $rules   = ['analtyics_filter_file' => 'required'];
        $request->validate($rules);

        $project = Project::findOrFail($id);
        $import  = new GoogleAnalyticsFilterImport($project);

        Excel::import($import,  request()->file('analtyics_filter_file'));
        return redirect()->back()->with(['success' => 'Google Analytics Filter File Imported SuccessFully' ]);
    }

    public function storeBestKeyword(Request $request, $id)
    {
        $rules   = ['best_keyword_file' => 'required'];
        $request->validate($rules);

        $project = Project::findOrFail($id);
        $import  = new BestKeywordsImport($project);

        Excel::import($import,  request()->file('best_keyword_file'));
        return redirect()->back()->with(['success' => 'Best Keywords File Imported SuccessFully' ]);
    }
}
