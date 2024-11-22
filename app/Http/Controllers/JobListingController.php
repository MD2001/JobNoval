<?php

namespace App\Http\Controllers;

use App\Mail\DeleteJobMail;
use App\Models\JobsListing;
use Illuminate\Http\Request;
use App\Mail\JobPostedMail;
use App\Models\tag;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

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
        $tags = json_decode(Request('tags'));
        $data =  Request()->validate([
            'cname' => ['required', 'min:3'],
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);
        $data["emploer_id"] = Auth::user()->id;
        $data['created_at'] = new \dateTime;
        $data['updated_at'] = new \dateTime;

        $job = JobsListing::create($data);
        if (($tags != null) and (isEmpty($tags))) {
            $tagsArr = [];
            foreach ($tags as $tag) {
                $jobTag = tag::firstorcreate(["name" => $tag]);
                $tagsArr[] = $jobTag->id;
            }
            $job->tags()->sync($tagsArr);
        }

        Mail::to($job->emploer)->queue(
            new JobPostedMail($job)
        );

        //redirect to jobs.index page
        return redirect('/jobs');
    }

    public function edite_show(int $id)
    {
        return view("Jobs.edite", ["job" => JobsListing::find($id)]);
    }

    public function edite(int $id)
    {
        $tags = json_decode(Request('tags'));
        // vlaidate and add tags to the job
        $data =  Request()->validate([
            'cname' => ['required', 'min:3'],
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);
        $job = JobsListing::find($id);
        $job->update($data);
        if (($tags != null) and (isEmpty($tags))) {
            $tagsArr = [];
            foreach ($tags as $tag) {
                $jobTag = tag::firstorcreate(["name" => $tag]);
                $tagsArr[] = $jobTag->id;
            }
            $job->tags()->sync($tagsArr);
        }
        return redirect("/jobs/" . $id);
    }

    public function delete(int $id)
    {
        mail::to(JobsListing::find($id)->emploer->email)->send(
            new DeleteJobMail(JobsListing::find($id))
        );
        JobsListing::destroy($id);
        return redirect("/jobs/");
    }

    public function tag_sort($tag)
    {
        if (Auth::check()) {
            $userJobs = Auth::user()->job()->with('tags')->get();
            foreach($userJobs as $job)
            {
                foreach($job->tags as $tag)
                {
                    $tags[$tag->id]=$tag->name;
                }
            }
        }
        dd($tags);
        $jobs = JobsListing::with(['tags'])->whereHas('tags', function ($query) use ($tag) {
            $query->where('name', $tag);
        })->whereNotIn('id', $userJobs->pluck('id')->toArray())->simplePaginate(3);

        return view('Jobs.index', ['jobs' => $jobs, "userJobs" => $userJobs ?? collect()]);
    }
}
