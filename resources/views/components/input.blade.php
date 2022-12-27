<div class="mt-1 relative rounded-md flex items-center justify-end">
    <input
            autocomplete="off"
            {{ $attributes->merge(
                    [
                        'class' => "block w-64 border-1 border-secondary-300
                                    focus:bg-transparent focus:border-primary-500 focus:ring-0 sm:text-sm
                                    placeholder-secondary-400",
                        'type' => 'text',
                    ]
                )
            }}
    >

    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
        <span class="text-secondary-500 sm:text-sm">
            <i class="fas fa-trash" aria-hidden="true"></i>
        </span>
    </div>
</div>
