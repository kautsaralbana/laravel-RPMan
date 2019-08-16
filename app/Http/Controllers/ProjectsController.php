<?php

namespace App\Http\Controllers;

use Auth;
use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get the authentication user.
        $user = Auth::user();

        //get all the todos that belong to the user with pagination.
        $projects = $user->projects()->orderBy('created_at', 'desc')->paginate(8);

        //return a view with all the todos.
        return view('projects.index', [
            'projects' => $projects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation rules
        $rules = [
            'name' => 'required|string|unique:tr_projects,name|min:2|max:191',
            'detail'  => 'required|string|min:5|max:1000',
        ];
        //custom validation error messages
        $messages = [
            'name.unique' => 'Project Name Should be Unique', //syntax: field_name.rule
        ];
        //First Validate the form data
        $request->validate($rules, $messages);
        // Create a Project
        $project = new Project;
        $project->name = $request->name;
        $project->detail = $request->detail;
        $project->created_by = Auth::id();
        $project->save(); // Save to Database
        // Redirect with flash
        return redirect()->route('projects.index')->with('success', 'New Project Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.show', [
            'project' => $project,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find Project by Id
        $project = Project::findOrFail($id);
        return view('projects.edit', [
            'project' => $project,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validation rules
        $rules = [
            'name' => 'required|string|unique:tr_projects,name|min:2|max:191',
            'detail'  => 'required|string|min:5|max:1000',
        ];
        //custom validation error messages
        $messages = [
            'name.unique' => 'Project Name Should be Unique', //syntax: field_name.rule
        ];
        //First Validate the form data
        $request->validate($rules, $messages);
        // Create a Project
        $project = Project::findOrFail($id);
        $project->name = $request->name;
        $project->detail = $request->detail;
        $project->updated_by = Auth::id();
        $project->save(); // Save to Database
        // Redirect with flash
        return redirect()->route('projects.show', $project->id)->with('success', 'Project has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete the Todo
        $project = Project::findOrFail($id);
        $project->delete();
        //Redirect to a specified route with flash message.
        return redirect()
            ->route('projects.index')
            ->with('error', 'Deleted the selected Project!');
    }
}
