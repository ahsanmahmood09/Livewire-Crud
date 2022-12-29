<div class="p-4 max-h-screen overflow-y-auto no-scrollbar">
    <div class="flex justify-center mb-3">
        <h4 class="text-lg text-secondary-900 font-semibold">
            {{ $heading }}
        </h4>
    </div>

    <form wire:submit.prevent="submit">
        <x-input
                placeholder="Enter Name"
                class="mb-6 rounded-md w-full"
                type="text"
                wire:model.debounce.500ms="name"
        />
        <x-input
                placeholder="Enter Surname"
                class="mb-6 rounded-md"
                type="text"
                wire:model.debounce.500ms="surname"
        />
        <x-input
                placeholder="Enter Email"
                class="mb-6 rounded-md"
                type="email"
                wire:model.debounce.500ms="email"
        />
        <x-input
                placeholder="Enter Date of Birth"
                class="mb-6 rounded-md"
                type="{{ $dob ? 'text' : 'date'}}"
                wire:model.debounce.500ms="dob"
        />
        <x-input
                placeholder="Enter Mobile Number"
                class="mb-6 rounded-md"
                type="number"
                wire:model.debounce.500ms="mobile_number"
        />
        <x-input
                placeholder="Enter SouthAfrican Id"
                class="mb-6 rounded-md"
                type="text"
                wire:model.debounce.500ms="south_african_id"
        />

        <x-select
                class="mb-6"
                placeholder="Select Language"
                wire:model.defer="language"
        >
            <x-select.option label="English" value="English"/>
            <x-select.option label="Africans" value="Africans"/>
            <x-select.option label="Spanish" value="Spanish"/>
            <x-select.option label="Mandarin" value="Mandarin"/>
        </x-select>

        <x-select
                class="mb-6"
                placeholder="Select Interests"
                multiselect
                :options="[
            'Travel',
            'Reading',
            'Photography',
            'Cooking',
            'Gardening',
            'Sports',
            'Dance',
            'Art',
            'Writing',
            'Painting',
            'Camping',
            'Music',
            'Fishing',
            'Singing',
            'Baking',
            'Hiking',
            'Basketball',
            'Surfing',
        ]"
                wire:model.defer="interests"
        />
        <div class="rounded-md text-white mt-6">
            <button
                    class="bg-zinc-500 text-sm p-2 w-full mb-2 rounded"
                    type="submit"
            >
                Submit
            </button>
            <button
                    class="bg-zinc-500 text-sm p-2 w-full rounded"
                    type="button"
                    wire:click="$emit('closeModal')"
            >
                close modal
            </button>
        </div>
    </form>
</div>