<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project; 
class ProjectController extends Controller
{
    
    public function create()
{
    return view('admin.projects.create');
}

    public function store(CreateProjectRequest $request)
    {
      

        $formdata = $request->all();
        $request->validate([
            'name' => 'required|max:64',
            'surname' => 'required|max:64',
            'age' => 'numeric|min:12|max:120',
            'profession' => 'nullable|max:128',
            'nationality' => 'required|max:64',
        ],[
            'name.required' => 'Il nome è obbligatorio',
            'name.max' => 'Il tuo nome non puo essere così lungo',
            'surname.required' => 'Il cognome è obbligatorio',
            'surname.max' => 'Il tuo cognome non puo essere così lungo',
            'age.required' => "l'età è obbligatoria",
            'age.min' => 'età minima 12 anni',
            'age.max' => 'età massima 120 anni',
            'profession.max' => 'Lunghezza massima 128 caratteri',
            'nationality.required' => 'la nazionalita è obbligatoria',
            'nationality.max' => 'massimo 64 caratteri',
        ]
    );
        
        $person = new project();
        $person->name = $formdata['name'];
        $person->surname = $formdata['surname'];
        $person->age = $formdata['age'];
        $person->profession = $formdata['profession'];
        $person->nationality = $formdata['nationality'];

        $person->save();


        return redirect()->route('person.show', ['person' => $person->id]);

        $validatedData = $request->validated();

        Project::create($validatedData);
        
        return redirect()->route('projects.index')->with('success', 'Progetto creato con successo');
    }

    public function index()
    {
        // $projects = Project::all();

        return view('welcome');
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
{
    return view('admin.projects.edit', compact('project'));
}

public function update(UpdateProjectRequest $request, Project $project)
{
    $validatedData = $request->validated();
    $project->update($validatedData);

    return redirect()->route('admin.projects.index')->with('success', 'Progetto aggiornato con successo');
}


    public function destroy(Project $project)
{
    $project->delete();

    return redirect()->route('projects.index')->with('success', 'Progetto eliminato con successo');
}
}