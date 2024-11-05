<x-layout>
    <x-slot:title> Login </x-slot:title>
    <x-slot:Dashbord> Login page </x-slot:Dashbord>
    <form method="POST" action="/login">
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Profile</h2>
                @csrf
                <x-input name="email" id="email" label='E-mail' placeholder="mdiea0581@gmail.com"></x-input>
                <x-input type="password" name="password" id="password" label='Password' placeholder=" "></x-input>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/jobs"> <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button></a>
            <x-submit-button class="bg-indigo-600">Login</x-submit-button>
        </div>
    </form>

</x-layout>
