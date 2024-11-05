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
        <div class="text-centered">{{ "you have ". Auth::user()->job->count()." job" }}</div>
            @foreach (Auth::user()->job as $job)
                <div class="py-5 m-6 mb-5 bg-opacity-3 bg-gray-200 rounded-xl">
                    <div class="pl-3 font-mono text-3xl text-gray-700 pb-3">Title : {{ $job['title'] }}</div>
                    <div class="pl-3 font-mono text-3xl text-gray-700 pb-3">Company name: {{ $job['cname'] }}</div>
                    <div class="pl-3 font-mono text-3xl text-gray-700 pb-3 float-left pr-4">Salary : </div>
                    <div class="font-mono text-3xl text-gray-700 pb-3 float-left pr-4 text-sky-600">{{ $job['salary'] }}
                    </div>
                    <div class="font-mono text-3xl text-gray-700 pb-3"> USD$ par year </div>
                </div>
            @endforeach
        @endif
    @endauth
</x-layout>
