@props(['jobs' => null, 'userJobs' => []])
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
        @auth
            @foreach ($userJobs as $userJob)
                <x-job-tag id="{{ $userJob['id'] }}" cname="{{ $userJob['cname'] }}" Job_title="{{ $userJob['title'] }}"
                    Salary="{{ $userJob['salary'] }}" tags="{{ $userJob->tags->pluck('name') }}"></x-job-tag>
            @endforeach
        @endauth
        <div class="mt-6 h-1 w-full">
        @foreach ($jobs as $job)
            <x-job-tag id="{{ $job['id'] }}" cname="{{ $job['cname'] }}" Job_title="{{ $job['title'] }}"
                Salary="{{ $job['salary'] }}" tags="{{ $job->tags->pluck('name') }}"></x-job-tag>
        @endforeach
        {{ $jobs->links() }}
    @endif


</x-layout>
