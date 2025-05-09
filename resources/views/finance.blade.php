@php
    $debit = $finance->sum('debit');
    $credit = $finance->sum('credit');
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
                        Naration</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider bg-gray-200">
                        Debit</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider bg-gray-200">
                        Credit</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider bg-gray-200">
                        Balance
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-black">
                @foreach ($finance as $key => $item)
                    <tr class="divide-x divide-black">
                        <td class="px-6 py-2 whitespace-nowrap text-sm bg-gray-200 w-[50px]">{{ $key + 1 }}</td>
                        <td class="px-6 py-2 whitespace-nowrap text-sm">{{ $item->head->name }}</td>
                        <td class="px-6 py-2 whitespace-nowrap text-sm text-green-700">
                            {{ $item->debit ? '+' . number_format($item->debit) : null }}</td>
                        <td class="px-6 py-2 whitespace-nowrap text-sm text-red-700">
                            {{ $item->credit ? '-' . number_format($item->credit) : null }}</td>
                        <td
                            class="px-6 py-2 whitespace-nowrap text-sm {{ $item->balance < 0 ? 'text-red-700' : 'text-green-700' }}">
                            {{ $item->balance > 0 ? '+' . number_format($item->balance) : null }}
                            {{ $item->balance < 0 ? number_format($item->balance) : null }}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td class="px-6 py-8 whitespace-nowrap text-sm w-[50px]"></td>
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
                    <td class="px-6 py-2 whitespace-nowrap text-sm font-bold bg-gray-200">
                        Balance
                    </td>
                    <td
                        class="px-6 py-2 whitespace-nowrap text-sm {{ $balance < 0 ? 'text-red-700' : 'text-green-700' }}">
                        {{ number_format($balance) }}
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</x-app-layout>
