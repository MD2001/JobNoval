@props(['jobs' => null, 'userJobs' => [], 'isSerch' => false, 'jobsall' => null])
<x-layout>
    
    <x-slot:title> jobs </x-slot:title>
    <x-slot:Dashbord> Jobs
        @auth
            <x-button href="/jobs/create"> Create Job</x-button>
        @endauth
    </x-slot:Dashbord>

    @include('Jobs.index.pageinations', [$jobs, $userJobs, $isSerch, $jobsall])
</x-layout>
