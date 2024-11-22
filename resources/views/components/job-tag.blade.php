@props([
    'id' => '0',
    'cname' => 'Company name',
    'Job_title' => 'Job title example',
    'Salary' => 'Job Salary example',
    'tags' => null,
])
@php
    if ($tags != null) {
        // Step 1: Decode the HTML entities
        $decodedString = html_entity_decode($tags);

        // Step 2: Convert the decoded string to a PHP array
        $tags = json_decode($decodedString);
    }
@endphp
<a href="/jobs/{{ $id }}">
    <div class="bg-gray-200 rounded-lg p-2 my-4 w-96 h-64  place-content-center ">
        <div>
            <div class=" text-blue-500 px-3 pt-1 text-sm font-bold text-center ">{{ $cname }} </div>
            <div class=" text-gray-700 px-2 text-2xl font-bold text-center"> {{ $Job_title }} </div>
            <div class=" text-gray-500 px-2 py-1 font-mono text-lg font-bold text-center"> {{ $Salary }} USD$ per
                year
            </div>
        </div>
        @if ($tags != null)
            <div class="flex justify-end place-self-end mt-5 ">
                @foreach ($tags as $tag)
                    <a href="/jobs/sort/{{ $tag }}">
                        <div
                            class="flex  mx-2 p-1 px-2 text-xs bg-sky-500 rounded-lg text-white font-bold hover:text-gray-300  ">
                            {{ $tag }} </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</a>
