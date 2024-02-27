<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required|string',
            'owner_avatar_url' => 'nullable|string',
            'html_url' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $project = Project::create([
            'name' => $request->input('name'),
            'owner_avatar_url' => $request->input('owner_avatar_url'),
            'html_url' => $request->input('html_url'),
            'description' => $request->input('description'),        
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('project_images', 'public');
            $project->update(['image' => $imagePath]);
        }
    
        return redirect()->route('admin.projects.index', $project->id)->with('success', 'Progetto creato con successo');
    }    

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'owner_avatar_url' => 'nullable|string',
            'html_url' => 'nullable|string',
            'description' => 'nullable|string',
        ]);
    
        $project = Project::findOrFail($id);

        $project->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('admin.projects.show', $project->id)->with('success', 'Progetto aggiornato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Progetto cancellato con successo');
    }
}
