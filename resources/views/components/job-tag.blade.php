@props(["id"=>'0',"cname"=>"Company name","Job_title"=>"Job title example","Salary"=>"Job Salary example"])
<a href="/jobs/{{ $id }}">
<div class="bg-gray-200 rounded-lg  py-2 px-2 my-4">
<div class="text-gray-100 bg-blue-500 pl-2 rounded-r-xl text-center w-10">{{ $id }} </div>
    <div class=" text-blue-500 px-3 pt-1 text-sm font-bold">{{ $cname }}  </div>
    <div class=" text-gray-700 px-2 text-2xl font-bold"> {{ $Job_title }} </div>
    <div class=" text-gray-500 px-2 py-1 font-mono text-lg font-bold"> {{ $Salary }} USD$ per year</div>
</div>
</a>