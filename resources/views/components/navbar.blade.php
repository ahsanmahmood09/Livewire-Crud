<div class="flex justify-between items-center bg-white p-2 shadow-lg">
    <span></span>
    <!-- Authentication -->
    <form method="POST" action="{{ route('logout') }}" x-data>
        @csrf

        <x-jet-dropdown-link class="bg-blue-600 p-3 px-6 rounded-md text-white mb-4 hover:bg-blue-600" href="{{ route('logout') }}"
                             @click.prevent="$root.submit();">
            {{ __('Log Out') }}
        </x-jet-dropdown-link>
    </form>
</div>

