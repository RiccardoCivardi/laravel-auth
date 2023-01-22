<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
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
        $projects = Project::orderBy('id','desc')->paginate(10);

        $direction = 'desc';

        return view('admin.projects.index', compact('projects', 'direction'));
    }

    public function orderby($column, $direction){
        $direction = $direction === 'desc' ? 'asc' : 'desc';

        $projects = Project::orderBy($column,$direction)->paginate(10);

        $th_active = $column;

        return view('admin.projects.index', compact('projects','direction', 'th_active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        // validazione

        // la request validate la metto nel file ProjectRequest che creo con questo comando
        // php artisan make:request ProjectRequest
        // poi la metto in store(...) e la importo

        $form_data=$request->all();
        $form_data['slug'] = Project::generateSlug($form_data['name']);


        // posso evitare questi 3 passaggi scrivendo
        // $new_project= new Project();
        // $new_project->fill($form_data);
        // $new_project->save();

        $new_project = Project::create($form_data);




        //faccio il redirect a index passando in sessione l'eliminazione per mostrare l'alert
        return redirect()->route('admin.projects.show', $new_project)->with('created', "Il progetto è stato creato correttamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $form_data = $request->all();
        // dump($comic);
        // dd($form_data);

        // modifico lo slug generandone uno nuovo se e solo se il titolo è stato modifcato
        if($form_data['name'] != $project->name){
            $form_data['slug'] = Project::generateSlug($form_data['name']);
        } else {
            $form_data['slug'] = $project->slug;
        }

        $project->update($form_data);

        return redirect()->route('admin.projects.show', $project)->with('updated', "Il progetto è stato modificato correttamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        //faccio il redirect a index passando in sessione l'eliminazione per mostrare l'alert
        return redirect()->route('admin.projects.index')->with('deleted', "Il progetto $project->name è stato eliminato correttamente");
    }
}
