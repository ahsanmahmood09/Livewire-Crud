<x-guest-layout>
    <div class="flex justify-center items-center mt-20">
        <div class="bg-white shadow-md p-10 sm:p-20 md:p-32 rounded-md">
            <p class="text-4xl font-bold text-blue-600 text-center">Livewire</p>
            <p class="text-xl mt-6">
                Hello  <span class="text-2xl font-bold">{{ $data['name'] }}</span>,
            </p>
            <p class="mt-5 text-xl">
                Your account with email {{ $data['email'] }} has been created successfully.
            </p>
        </div>
    </div>
</x-guest-layout>
