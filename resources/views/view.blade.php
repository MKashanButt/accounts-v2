@php
    $debit = $finance->where('type', 'debit')->sum('amount');
    $credit = $finance->where('type', 'credit')->sum('amount');
    $balance = $debit - $credit;
@endphp
<x-app-layout>
    <section class="p-6 text-gray-900 w-full">
        <table class="min-w-full divide-y divide-black border border-black">
            <thead class="bg-[#FDFDFC]">
                <tr class="divide-x divide-black">
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider bg-gray-200">
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider bg-gray-200">
                        Date(M/D/Y)</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider bg-gray-200">
                        Naration</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider bg-gray-200">
                        File</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider bg-gray-200">
                        Debit</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider bg-gray-200">
                        Credit</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider bg-gray-200">
                        Head</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider bg-gray-200">
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-black">
                @foreach ($finance as $key => $item)
                    <tr class="divide-x divide-black">
                        <td class="px-6 py-2 whitespace-nowrap text-sm bg-gray-200 w-[50px]">{{ $key + 1 }}</td>
                        <td class="px-6 py-2 whitespace-nowrap text-sm">{{ $item->date->format('m/d/Y') }}</td>
                        <td class="px-6 py-2 whitespace-nowrap text-sm">{{ $item->description }}</td>
                        <td class="px-6 py-2 whitespace-nowrap text-sm">
                            @isset($item->file)
                                <a href="{{ asset('storage/' . ltrim($item->file, '/')) }}" target="_blank">
                                    <button>View File</button>
                                </a>
                            @endisset
                        </td>
                        <td class="px-6 py-2 whitespace-nowrap text-sm text-green-700">
                            {{ $item->type == 'debit' ? '+' . number_format($item->amount) : null }}</td>
                        <td class="px-6 py-2 whitespace-nowrap text-sm text-red-700">
                            {{ $item->type == 'credit' ? '-' . number_format($item->amount) : null }}</td>
                        <td class="px-6 py-2 whitespace-nowrap text-sm">{{ $item->head->name }}</td>
                        <td class="px-6 py-2 whitespace-nowrap text-sm"></td>
                    </tr>
                @endforeach
                <form action="{{ route('finance.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <tr class="divide-x divide-black">
                        <td class="px-2 py-2 whitespace-nowrap text-sm bg-gray-200 w-[50px]">
                        </td>
                        <td class="px-2 py-2 whitespace-nowrap text-sm">
                            <x-text-input class="w-full text-sm uppercase" type="date" required name="date" />
                        </td>
                        <td class="px-2 py-2 whitespace-nowrap text-sm">
                            <x-text-input class="w-full text-sm" type="text" placeholder="Naration"
                                name="description" required />
                        </td>
                        <td class="px-2 py-2 whitespace-nowrap text-sm">
                            <x-text-input class="w-full" type="file" name="file"></x-text-input>
                        </td>
                        <td class="px-2 py-2 whitespace-nowrap text-sm">
                            <x-text-input class="w-full text-sm" type="number" placeholder="Debit" name="debit" />
                        </td>
                        <td class="px-2 py-2 whitespace-nowrap text-sm">
                            <x-text-input class="w-full text-sm" type="number" placeholder="Credit" name="credit" />
                        </td>
                        <td class="px-2 py-2 whitespace-nowrap text-sm">
                            <x-text-input class="w-full text-sm" type="text" value="{{ request()->name }}"
                                name="head" readonly />
                        </td>
                        <td class="px-2 py-2 whitespace-nowrap text-sm">
                            <x-secondary-button class="h-full" type="submit">Add Finance</x-secondary-button>
                        </td>
                    </tr>
                </form>
                <tr>
                    <td class="px-6 py-8 whitespace-nowrap text-sm w-[50px]"></td>
                    <td class="px-6 py-8 whitespace-nowrap text-sm"></td>
                    <td class="px-6 py-8 whitespace-nowrap text-sm"></td>
                    <td class="px-6 py-8 whitespace-nowrap text-sm">
                    </td>
                    <td class="px-6 py-8 whitespace-nowrap text-sm">
                    </td>
                    <td class="px-6 py-8 whitespace-nowrap text-sm"></td>
                </tr>
                <tr class="divide-x divide-black">
                    <td class="px-6 py-2 whitespace-nowrap text-sm w-[50px]"></td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm"></td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm">
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm"></td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm">
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm">
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-md font-bold bg-gray-200">
                        Total
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm"></td>
                </tr>
                <tr class="divide-x divide-black">
                    <td class="px-6 py-2 whitespace-nowrap text-sm w-[50px]"></td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm"></td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm">
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm"></td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm">
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm">
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm font-bold bg-gray-200">
                        Debit
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-green-700">
                        {{ $debit ? '+' . number_format($debit) : 0 }}
                    </td>
                </tr>
                <tr class="divide-x divide-black">
                    <td class="px-6 py-2 whitespace-nowrap text-sm w-[50px]"></td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm"></td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm">
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm"></td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm">
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm">
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm font-bold bg-gray-200">
                        Credit
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-red-700">
                        {{ $credit ? '-' . number_format($credit) : 0 }}
                    </td>
                </tr>
                <tr class="divide-x divide-black">
                    <td class="px-6 py-2 whitespace-nowrap text-sm w-[50px]"></td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm"></td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm">
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm">
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm">
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm"></td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm font-bold bg-gray-200">
                        Balance
                    </td>
                    <td
                        class="px-6 py-2 whitespace-nowrap text-sm {{ $balance < 0 ? 'text-red-700' : 'text-green-700' }}">
                        {{ $balance > 0 ? '+' . number_format($balance) : number_format($balance) }}
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</x-app-layout>
