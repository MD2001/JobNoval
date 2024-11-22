@props(['jobs' => null, 'userJobs' => [], 'isSerch' => false, 'jobsall' => null])
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
            @if ($jobs->onFirstPage() && $isSerch)
                @foreach ($userJobs as $userJob)
                    <x-job-tag id="{{ $userJob['id'] }}" cname="{{ $userJob['cname'] }}" Job_title="{{ $userJob['title'] }}"
                        Salary="{{ $userJob['salary'] }}" tags="{{ $userJob->tags->pluck('name') }}"></x-job-tag>
                @endforeach
                <hr style="border: 1px solid #ccc; margin: 20px 0;">
            @endif
        @endauth
        <div class=" flex justify-between gap-3">
            @foreach ($jobs as $job)
                <x-job-tag id="{{ $job['id'] }}" cname="{{ $job['cname'] }}" Job_title="{{ $job['title'] }}"
                    Salary="{{ $job['salary'] }}" tags="{{ $job->tags->pluck('name') }}"></x-job-tag>
            @endforeach
        </div>
        {{ $jobs->appends(['panel_page' => request('panel_page')])->links() }}
        <div class=" px-8 w-full justify-between">
            @foreach ($jobsall as $job)
                <x-job-paners id="{{ $job['id'] }}" cname="{{ $job['cname'] }}" Job_title="{{ $job['title'] }}"
                    Salary="{{ $job['salary'] }}" tags="{{ $job->tags->pluck('name') }}"></x-job-paners>
            @endforeach

            {{ $jobsall->appends(['card_page' => request('card_page')])->links() }}
    @endif
</x-layout>
