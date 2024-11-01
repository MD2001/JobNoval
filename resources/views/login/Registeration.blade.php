<x-layout>
    <x-slot:title> Registeration </x-slot:title>
    <x-slot:Dashbord> Registeration page </x-slot:Dashbord>
    <form method="POST" action="/login">
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Profile</h2>
                <p class="mt-1 text-sm/6 text-gray-600">This information will be displayed publicly so be careful what
                    you share.</p>
                @csrf
                <x-input name="name" id="name" label='User Name' placeholder="Mohamed diaa"></x-input>
                <x-input name="email" id="email" label='E-mail' placeholder="mdiea0581@gmail.com"></x-input>
                <x-input type="password" name="password" id="password" label='Password' placeholder=" "></x-input>
                <x-input type="password" name="password_confirmation" id="password_confirmation"
                    label='Confirmation Password' placeholder=" "></x-input>

            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/jobs"> <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button></a>
            <x-submit-button class="bg-indigo-600">Submit</x-submit-button>
        </div>
    </form>

</x-layout>
