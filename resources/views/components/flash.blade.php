<div x-data="{ showFlash: true}"
     x-show="showFlash"
     x-transition.duration.1000ms
     x-cloak
        {{ $attributes->merge(['class' => "flex justify-center items-center mt-6 p-4 py-4 px-2 bg-primary-500 border-2 border-blue-400 w-80 rounded-full"]) }}
>
    <div class="flex">
        <div class="ml-3">
            <p class="text-sm font-medium text-blue-400">
                {{ $slot }}
            </p>
        </div>

        <div class="ml-auto px-3 ">
            <div class="-mx-1.5 -my-1.5 block">
                <button
                        @click="showFlash = false"
                        type="button"
                        class="inline-flex p-1.5 text-blue-400">

                    <x-heroicon-o-x class="h5 w-5"></x-heroicon-o-x>
                </button>
            </div>
        </div>
    </div>
</div>
