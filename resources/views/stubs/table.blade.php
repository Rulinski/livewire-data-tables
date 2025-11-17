<div class="flex flex-col gap-8">
    <table class="min-w-full table-fixed divide-y divide-gray-300 text-gray-800">
        <thead>
            <tr>
                <th class="p-3 text-left text-sm font-semibold text-gray-900">
                    <div>Order #</div>
                </th>

                <th class="p-3 text-left text-sm font-semibold text-gray-900">
                    <div>Status</div>
                </th>

                <th class="p-3 text-left text-sm font-semibold text-gray-900">
                    <div>Customer</div>
                </th>

                <th class="p-3 text-left text-sm font-semibold text-gray-900">
                    <div>Date</div>
                </th>

                <th class="p-3 text-left text-sm font-semibold text-gray-900">
                    <div>Amount</div>
                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 bg-white text-gray-700">
            <tr>
                <td class="whitespace-nowrap p-3 text-sm">
                    <div class="flex gap-1">
                        <span class="text-gray-300">#</span>
                        123456
                    </div>
                </td>

                <td class="whitespace-nowrap p-3 text-sm">
                    <div class="rounded-full py-0.5 pl-2 pr-1 inline-flex font-medium items-center gap-1 text-green-600 text-xs bg-green-100 opacity-75">
                        <div>Paid</div>

                        <x-icon.check />
                    </div>
                </td>

                <td class="whitespace-nowrap p-3 text-sm">
                    <div class="flex items-center gap-2">
                        <div class="w-5 h-5 rounded-full overflow-hidden">
                            <img src="https://i.pravatar.cc/300" alt="Customer avatar">
                        </div>

                        <div>customer@example.com</div>
                    </div>
                </td>

                <td class="whitespace-nowrap p-3 text-sm">
                    Aug 26, 10:03 AM
                </td>

                <td class="w-auto whitespace-nowrap p-3 text-sm text-gray-800 font-semibold text-right">
                    $456.78
                </td>
            </tr>
        </tbody>
    </table>
</div>
