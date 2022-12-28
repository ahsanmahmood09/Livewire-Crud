<div class="mt-1 flex justify-end">
    <div>
        <input
                autocomplete="off"
                {{ $attributes->merge(
                        [
                            'class' => "block w-64 border-2 border-blue-400 rounded-3xl
                                        focus:bg-transparent focus:border-primary-500 focus:ring-0 sm:text-sm
                                        placeholder-secondary-400",
                            'type' => 'text',
                        ]
                    )
                }}
        >
    </div>
</div>
