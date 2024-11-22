<x-layout>
    <x-slot:title> Home </x-slot:title>
    <x-slot:Dashbord> Home </x-slot:Dashbord>
    @guest
        hi !! this is home pag
    @endguest
    @auth
        @if (Auth::user()->job->isEmpty())
            {{ 'you have no job yet' }}
        @else
            <div class="grid justify-items-center font-bold text-blue-500 text-xl">
                {{ 'you have ' . Auth::user()->job->count() . ' job' }}</div>
            @foreach (Auth::user()->job as $job)
                <x-job-paners id="{{ $job['id'] }}" cname="{{ $job['cname'] }}" Job_title="{{ $job['title'] }}"
                    Salary="{{ $job['salary'] }}" tags="{{ $job->tags->pluck('name') }}"></x-job-paners>
            @endforeach
        @endif
    @endauth
</x-layout>
