<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imports\SitemapImport;
use App\Imports\GoogleSearchConsoleImport;
use App\Imports\ScreaminFrogCrawlsImport;
use App\Imports\SemRushImport;
use App\Imports\AhrefsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

use App\Models\Project;

class ProjectDetailController extends Controller
{
    public function storeSitemap(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'sitemap_file' => ['required',
                function ($attribute, $value, $fail) {
                  $extension = $value->getClientOriginalExtension();
                    if(!in_array($extension, ['csv', 'xslx'])) {
                      $fail('File must be type of csv or xslx');
                    }
                },
              ]
        ]);

        if($validator->fails()) {
          return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $project = Project::findOrFail($id);
        $import  = new SitemapImport($project);

        Excel::import($import,  request()->file('sitemap_file'));
        return redirect()->back()->with(['success' => 'Sitemap Imported SuccessFully' ]);
    }

    public function storeConsole(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'console_file' => ['required',
                function ($attribute, $value, $fail) {
                  $extension = $value->getClientOriginalExtension();
                    if(!in_array($extension, ['csv', 'xslx'])) {
                      $fail('File must be type of csv or xslx');
                    }
                },
              ]
        ]);

        if($validator->fails()) {
          return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $project = Project::findOrFail($id);
        $import  = new GoogleSearchConsoleImport($project);

        Excel::import($import,  request()->file('console_file'));
        return redirect()->back()->with(['success' => 'Google Console File Imported SuccessFully' ]);
    }

    public function storeAhrefs(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'ahrefs_file' => ['required',
                function ($attribute, $value, $fail) {
                  $extension = $value->getClientOriginalExtension();
                    if(!in_array($extension, ['csv', 'xslx'])) {
                      $fail('File must be type of csv or xslx');
                    }
                },
              ]
        ]);

        if($validator->fails()) {
          return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $project = Project::findOrFail($id);
        $import  = new AhrefsImport($project);

        Excel::import($import,  request()->file('ahrefs_file'));
        return redirect()->back()->with(['success' => 'Ahrefs File Imported SuccessFully' ]);
    }

    public function storeScreamingFrogs(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'screaming_frogs_file' => ['required',
                function ($attribute, $value, $fail) {
                  $extension = $value->getClientOriginalExtension();
                    if(!in_array($extension, ['csv', 'xslx'])) {
                      $fail('File must be type of csv or xslx');
                    }
                },
              ]
        ]);

        if($validator->fails()) {
          return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $project = Project::findOrFail($id);
        $import  = new ScreaminFrogCrawlsImport($project);

        Excel::import($import,  request()->file('screaming_frogs_file'));
        return redirect()->back()->with(['success' => 'Screaming Frogs File Imported SuccessFully' ]);
    }

    public function storeSemRush(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'sem_rush_file' => ['required',
                function ($attribute, $value, $fail) {
                  $extension = $value->getClientOriginalExtension();
                    if(!in_array($extension, ['csv', 'xslx'])) {
                      $fail('File must be type of csv or xslx');
                    }
                },
              ]
        ]);

        if($validator->fails()) {
          return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $project = Project::findOrFail($id);
        $import  = new SemRushImport($project);

        Excel::import($import,  request()->file('sem_rush_file'));
        return redirect()->back()->with(['success' => 'SEM Rush File Imported SuccessFully' ]);
    }
}
