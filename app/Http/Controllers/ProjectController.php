<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Project;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('users')->sortColumn()->latest()->get();

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $users = User::all();
        $statuses = Status::all()->pluck('name', 'id')->prepend('ステータスを選んでください', '0');

        return view('projects.create', compact('statuses', 'users'));
    }

    public function store(Request $request)
    {
        $project = new Project();
        $project->id = Project::all()->count() + 1;
        $project->name = $request->name;
        $project->body = $request->body;
        $project->progress = 0;
        $project->status_id = $request->status_id;

        foreach ($request->user_id as $item) {
            User::find($item)->projects()->attach($project->id);
        }

        $project->save();

        return redirect()->route('home')->with('success', 'プロジェクトを追加しました');

    }

    public function show(Project $project)
    {
        $activities = Activity::with('user', 'project')->where('project_id', $project->id)->get();

        return view('projects.show', compact('project', 'activities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
