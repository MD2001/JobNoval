@props(['jobs' => null])
<x-layout>
    <x-slot:title> jobs </x-slot:title>
    <x-slot:Dashbord> Jobs 
       <x-button  href="/jobs/create"> Create Job</x-button>
    </x-slot:Dashbord>

    @if ($jobs == null)
        <x-job-tag></x-job-tag>
    @else
        @foreach ($jobs as $job)
            <x-job-tag id="{{ $job['id'] }}" cname="{{ $job['cname'] }}" Job_title="{{ $job['title'] }}"
                Salary="{{ $job['salary'] }}"></x-job-tag>
        @endforeach
    @endif

    {{ $jobs->links() }}
</x-layout>
