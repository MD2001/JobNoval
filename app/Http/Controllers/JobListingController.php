<?php

namespace App\Http\Controllers;

use App\Models\JobsListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobListingController extends Controller
{
    public function index()
    {
        $jobs = JobsListing::latest()->simplePaginate(3);
        return view("Jobs.index", ["jobs" => $jobs]);
    }


    public function show(int $id)
    {
        return view('Jobs.show', ["job" => JobsListing::find($id)]);
    }

    public function create()
    {
        return view('Jobs.create');
    }

    public function store()
    {
        //validation 

        $data =  Request()->validate([
            'cname' => ['required', 'min:3'],
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);
        $data["emploer_id"]=Auth::user()->id;
        $data['created_at'] = new \dateTime;
        $data['updated_at'] = new \dateTime;
        // dd($data);
        //create job\
        JobsListing::create($data);

        //redirect to jobs.index page
        return redirect('/jobs');
    }

    public function edite_show(int $id)
    {
        return view("Jobs.edite", ["job" => JobsListing::find($id)]);
    }

    public function edite(int $id)
    {
        
        $data =  Request()->validate([
            'cname' => ['required', 'min:3'],
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);
        
        JobsListing::find($id)->update($data);
        
        return redirect("/jobs/" . $id);
    }

    public function delete(int $id)
    {
        JobsListing::destroy($id);
        return redirect("/jobs/");
    }
}
