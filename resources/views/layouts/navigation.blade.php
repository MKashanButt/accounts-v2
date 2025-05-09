@php
    $head = request()->name;
@endphp

<nav class="flex px-4 py-8 justify-between items-center">
    <h1 class="text-4xl">Overall Finances</h1>
    <div class="flex gap-4">
        <div class="relative" x-data="{ open: false }">
            <x-secondary-button class="flex gap-2" @click="open=true" class="h-full flex gap-4">Select Head
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
            </x-secondary-button>
            <div class="w-[200px] absolute top-0 left-0 mt-12 bg-white shadow-lg rounded-lg overflow-hidden z-10"
                x-show="open" @click.away="open = false">
                <div class="flex flex-col divide-y">
                    <a href="{{ route('finance.head', 'all') }}" class="px-4 py-2 hover:bg-gray-50">All</a>
                    @foreach ($heads as $item)
                        <a href="{{ route('finance.head', $item->name) }}"
                            class="px-4 py-2 hover:bg-gray-50 flex justify-between items-center">
                            {{ $item->name }}
                            <form action="{{ route('head.destroy', $item) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-danger-button class="px-[5px] py-[5px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </x-danger-button>
                            </form>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <form action="{{ route('head.store') }}" class="flex gap-2" method="POST">
            @csrf
            <x-text-input type="text" name="name" id="name" placeholder="Head Name" required />
            <x-secondary-button :type="'submit'">Add Head</x-secondary-button>
        </form>
    </div>
</nav>
