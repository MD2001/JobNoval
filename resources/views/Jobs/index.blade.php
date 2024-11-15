@props(['jobs' => null])
<x-layout>
    <x-slot:title> jobs </x-slot:title>
    <x-slot:Dashbord> Jobs
        @auth
            <x-button href="/jobs/create"> Create Job</x-button>
        @endauth
    </x-slot:Dashbord>

    @if ($jobs == null)
        <x-job-tag></x-job-tag>
    @else
        @foreach ($jobs as $job)
            <x-job-tag id="{{ $job['id'] }}" cname="{{ $job['cname'] }}" Job_title="{{ $job['title'] }}"
                Salary="{{ $job['salary']  }}" tags="{{ $job->tags->pluck('name') }}" ></x-job-tag>
        @endforeach
        {{ $jobs->links() }}
    @endif

  
</x-layout>
