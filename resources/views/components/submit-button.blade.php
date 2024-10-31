@props(['form' => null])

<button
    {{ $attributes->merge([
        'class' => "rounded-md 
                    px-3 
                    py-2
                    text-sm
                    font-semibold
                    text-white
                    shadow-sm
                    hover:bg-indigo-500
                    focus-visible:outline
                    focus-visible:outline-2 
                    focus-visible:outline-offset-2 
                    focus-visible:outline-indigo-600
                    float-right",
    ]) }}
    type="submit"
    @if($form !== null) form="{{ $form }}" @endif
>
    {{ $slot }}
</button>
