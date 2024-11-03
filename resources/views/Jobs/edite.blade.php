<x-layout>
    <x-slot:title> Edite </x-slot:title>
    <x-slot:Dashbord> Edite Job </x-slot:Dashbord>
    <form method="POST" action="/jobs/{{ $job['id'] }}">
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Profile</h2>
                <p class="mt-1 text-sm/6 text-gray-600">This information will be displayed publicly so be careful what
                    you share.</p>
                @csrf
                @method("PATCH")
                <x-input name="name" id="name" label='User Name' placeholder="Mohamed diaa" value="{{ $job->emploer->name }}" ></x-input>
                <x-input name="cname" id="cname" label='Company name' placeholder="Company name" value="{{ $job['cname'] }}"></x-input>              
                <x-input name="title" id="title" label='Title' placeholder="Backend Developer" value="{{ $job['title'] }}" ></x-input>
                <x-input name="salary" id="salary" label='Salary' placeholder="150,000" value="{{ $job['salary'] }}" span='USD$' ></x-input>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
            <x-submit-button >Save</x-submit-button>
        </div>
    </form>

</x-layout>
