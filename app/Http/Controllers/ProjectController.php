<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Auth;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::paginate(20);
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

    public function show(Project $project)
    {
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
        //
    }
}
