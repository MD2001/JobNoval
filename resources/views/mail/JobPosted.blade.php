<h2>
    {{ $job->title }}
</h2>
<p>
    congraltulation you create new job is created at  {{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}
</p>

<a href="{{ url('/jobs/'.$job->id) }}" class="text-blue-500 font-sm ">Job</a>