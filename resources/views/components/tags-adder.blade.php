@props([
    'name' => 'tag',
    'id' => 'tag',
    'placeholder' => 'add tag',
    'label' => 'Tags',
    'tags' => null,
])

@php
    if ($tags != null) {
        // Step 1: Decode the HTML entities
        $decodedString = html_entity_decode($tags);

        // Step 2: Convert the decoded string to a PHP array
        $tags = collect(json_decode($decodedString))->pluck('name');
    }
@endphp

<div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 space-y-1">
    <div class="sm:col-span-4">
        <label for="{{ $name }}" class="text-sm/6 font-medium text-gray-900 ">{{ $label }}</label>

        <div class="flex justify-start "> <!-- This aligns children to the left -->
            <x-button id="{{ $id }}"
                class="mt-4 bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">
                Add tag
            </x-button>
        </div>

        <div class="flex justify-start space-x-2">
            <div id="input-container"
                class="w-96 mt-2 flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
            </div>
            <div id="button-input-container" class="w-24 sm:max-w-md"></div>
        </div>

        <div id="tagcontainer" class="block my-2"></div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const inputContainer = document.getElementById('input-container');
                const buttonInputContainer = document.getElementById('button-input-container');
                const addInputBtn = document.getElementById(@json($id));
                const tagsContainer = document.getElementById('tagcontainer'); // Create a container for the tags
                const tags = @json($tags ?? []); // Initialize tags with server-provided values

                // Render existing tags dynamically
                tags.forEach(tagValue => {
                    createTagElement(tagValue);
                });

                addInputBtn.addEventListener('click', (event) => {
                    event.preventDefault();

                    // Create an input field for entering tags
                    const inputField = document.createElement('input');
                    inputField.type = 'text';
                    inputField.placeholder = 'Enter a tag';
                    inputField.className =
                        "flex-1 border-1 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm/6";

                    // Create a button to save the tag
                    const saveTagButton = document.createElement('button');
                    saveTagButton.textContent = 'Save Tag';
                    saveTagButton.className =
                        'dynamic-button mt-4 w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition';

                    inputContainer.appendChild(inputField);
                    buttonInputContainer.appendChild(saveTagButton);

                    saveTagButton.addEventListener('click', (e) => {
                        e.preventDefault();

                        // Get the value of the input field and add it to the tags array
                        const tagValue = inputField.value.trim();
                        if (tagValue && !tags.includes(tagValue)) {
                            tags.push(tagValue);
                            createTagElement(tagValue);

                            // Clear the input field
                            inputField.value = '';
                        }

                        // Update the hidden input field with the tags array
                        updateHiddenInput(tags);
                    });
                });

                // Function to create and display a tag element
                function createTagElement(tagValue) {
                    const tagDisplay = document.createElement('span');
                    tagDisplay.textContent = tagValue;
                    tagDisplay.className =
                        'inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 cursor-pointer';

                    // Add click event to remove tag
                    tagDisplay.addEventListener('click', () => {
                        const index = tags.indexOf(tagValue);
                        if (index > -1) {
                            tags.splice(index, 1); // Remove the tag from the array
                        }
                        tagDisplay.remove(); // Remove the tag element

                        // Update the hidden input field
                        updateHiddenInput(tags);
                    });

                    tagsContainer.appendChild(tagDisplay); // Append to tags container
                }

                // Function to update the hidden input field
                function updateHiddenInput(tagsArray) {
                    let hiddenInput = document.getElementById('tags-input');
                    if (!hiddenInput) {
                        hiddenInput = document.createElement('input');
                        hiddenInput.type = 'hidden';
                        hiddenInput.name = 'tags';
                        hiddenInput.id = 'tags-input';
                        inputContainer.appendChild(hiddenInput);
                    }
                    hiddenInput.value = JSON.stringify(tagsArray); // Store as JSON string
                }
            });
        </script>
    </div>
</div>
