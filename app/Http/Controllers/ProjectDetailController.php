<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectDetail;

class ProjectDetailController extends Controller
{
    public function storeSem(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        echo "<pre>"; print_r($project); die;
        echo "<pre>"; print_r($request->all()); die;
    }
}
