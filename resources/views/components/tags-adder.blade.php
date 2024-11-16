@props([
    'type' => 'text',
    'name' => 'username',
    'id' => 'username',
    'placeholder' => 'Add value',
    'label' => 'Username',
    'span' => null,
])
<div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 space-y-1">
    <div class="sm:col-span-4">
        <label for="{{ $name }}" class="block text-sm/6 font-medium text-gray-900">{{ $label }}</label>
        <div class="float-left">
            <x-submit-button id="{{ $id }}" name="{{ $name }}"
                class="mt-4 bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition"> add tag
            </x-submit-button>
            <div id="input-container"></div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const inputContainer = document.getElementById('input-container');
                const addInputBtn = document.getElementById(@json($id));

                addInputBtn.addEventListener('click', (event) => {
                    // Prevent default action
                    event.preventDefault();

                    // Check if a button already exists
                    const existingButton = inputContainer.querySelector('button.dynamic-button');
                    if (!existingButton) {
                        // Create and append a new input field
                        const inputField = document.createElement('input');
                        inputField.type = 'text';
                        inputField.name = 'dynamic_inputs[]'; // Name it for array submission if needed
                        inputField.placeholder = 'Enter text';
                        inputField.className = 'w-full p-2 border rounded focus:ring focus:ring-blue-300';

                        // Create and append a new button
                        const buttonInputField = document.createElement('button');
                        buttonInputField.className =
                            'dynamic-button mt-4 w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition';
                        buttonInputField.textContent = 'Add';

                        inputContainer.appendChild(inputField);
                        inputContainer.appendChild(buttonInputField);
                    }
                });
            });
        </script>
