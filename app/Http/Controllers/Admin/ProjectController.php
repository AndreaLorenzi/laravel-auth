<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::paginate(5);

        return view('admin.projects.index', compact('projects'));
    }


   
    public function create()
    {
        return view('admin.projects.create');
    }

    
    public function store(Request $request)

    {
        // $request->validate([
            
        // ]);

        $data = $request->all();

        $newProject = new Project();
        $newProject->title=$data['title'];
        $newProject->creation_date=$data['creation_date'];
        $newProject->last_update=$data['last_update'];
        $newProject->description=$data['description'];
        $newProject->languages=$data['languages'];
        $newProject->author=$data['author'];
        $newProject->collaborators=$data['collaborators'];
        $newProject->link_github=$data['link_github'];
        $newProject->sace();

        return to_route('admin.projects.show', ['project' =>$newProject]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
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
