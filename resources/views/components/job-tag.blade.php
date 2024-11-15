@props([
    'id' => '0',
    'cname' => 'Company name',
    'Job_title' => 'Job title example',
    'Salary' => 'Job Salary example',
    'tags' => null,
])
<a href="/jobs/{{ $id }}">
    <div class="bg-gray-200 rounded-lg space-x-2  py-2 px-2 my-4">

        {{-- <div class="text-gray-100 bg-blue-500 pl-2 rounded-r-xl text-center w-10">{{ $id }} </div> --}}
        <div class=" text-blue-500 px-3 pt-1 text-sm font-bold">{{ $cname }} </div>
        <div class=" text-gray-700 px-2 text-2xl font-bold"> {{ $Job_title }} </div>
        <div class=" text-gray-500 px-2 py-1 font-mono text-lg font-bold"> {{ $Salary }} USD$ per year</div>
        @if ($tags != null)
            @foreach ($tags as $tag)
                <a href="#">
                    <div
                        class="float-right mx-2 p-1 px-2 text-xs bg-sky-500 rounded-lg text-white font-bold hover:text-gray-300  ">
                        {{ $tag }} </div>
                </a>
            @endforeach
        @endif

    </div>
</a>
