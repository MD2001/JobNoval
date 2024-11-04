<x-layout>
    <x-slot:title> Home </x-slot:title>
    <x-slot:Dashbord> Home </x-slot:Dashbord>
    hi !! this is home pag
    <p> {{ Auth::user()?? 'no data' }}
    </p>
</x-layout>
