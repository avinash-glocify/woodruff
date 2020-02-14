<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imports\SitemapImport;
use App\Imports\GoogleSearchConsoleImport;
use App\Imports\ScreaminFrogCrawlsImport;
use App\Imports\SemRushImport;
use App\Imports\AhrefsImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Project;

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

    public function storeConsole(Request $request, $id)
    {
        $rules   = ['console_file' => 'required'];
        $request->validate($rules);

        $project = Project::findOrFail($id);
        $import  = new GoogleSearchConsoleImport($project);

        Excel::import($import,  request()->file('console_file'));
        return redirect()->back()->with(['success' => 'Google Console File Imported SuccessFully' ]);
    }

    public function storeAhrefs(Request $request, $id)
    {
        $rules   = ['ahrefs_file' => 'required'];
        $request->validate($rules);

        $project = Project::findOrFail($id);
        $import  = new AhrefsImport($project);

        Excel::import($import,  request()->file('ahrefs_file'));
        return redirect()->back()->with(['success' => 'Main Keywords File Imported SuccessFully' ]);
    }

    public function storeScreamingFrogs(Request $request, $id)
    {
        $rules   = ['screaming_frogs_file' => 'required'];
        $request->validate($rules);

        $project = Project::findOrFail($id);
        $import  = new ScreaminFrogCrawlsImport($project);

        Excel::import($import,  request()->file('screaming_frogs_file'));
        return redirect()->back()->with(['success' => 'Main Keywords File Imported SuccessFully' ]);
    }

    public function storeSemRush(Request $request, $id)
    {
        $rules   = ['sem_rush_file' => 'required'];
        $request->validate($rules);

        $project = Project::findOrFail($id);
        $import  = new SemRushImport($project);

        Excel::import($import,  request()->file('sem_rush_file'));
        return redirect()->back()->with(['success' => 'Main Keywords File Imported SuccessFully' ]);
    }
}
