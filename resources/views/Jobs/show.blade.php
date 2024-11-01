@props(['job' => null])
<x-layout>
    <x-slot:title> job </x-slot:title>
    <x-slot:Dashbord> Job
    <x-button href='/jobs/edite/{{ $job["id"] }}' class="bg-indigo-600 mx-2" > Edite </x-button>
    {{-- <x-button href="/jobs/delete/{{ $job["id"] }}" class="bg-red-600"> Delete </x-button> --}}
    <x-submit-button form="delete-form" class="bg-red-500">Delete</x-submit-button>
    </x-slot:Dashbord>
    @if ($job == null)
        {{ abort(404) }}
    @else
        <div class="py-5 m-6 mb-5 bg-opacity-3 bg-gray-200 rounded-xl">
            <div class="pl-3 font-mono text-3xl text-gray-700 pb-3">Title : {{ $job['title'] }}</div>
            <div class="pl-3 font-mono text-3xl text-gray-700 pb-3">Company name: {{ $job['cname'] }}</div>
            <div class="pl-3 font-mono text-3xl text-gray-700 pb-3 float-left pr-4">Salary : </div>
            <div class="font-mono text-3xl text-gray-700 pb-3 float-left pr-4 text-sky-600">{{ $job['salary'] }} </div>
            <div class="font-mono text-3xl text-gray-700 pb-3"> USD$ par year </div>
        </div>
    @endif

    <div class=" m-1 mt-2 p-3 bg-gray-200 rounded-xl font-mono text-xl text-center">@foreach ($job->emploer as $employer )
        {{ $employer->name }}<br>
    @endforeach</div>

    <form id="delete-form" method="POST" action="/jobs/{{ $job["id"] }}">
        @csrf
        @method("DELETE")
    </form>
</x-layout>
