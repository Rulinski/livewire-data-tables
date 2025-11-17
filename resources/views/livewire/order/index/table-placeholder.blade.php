<div class="flex flex-col gap-8">
    <div class="flex flex-col sm:grid grid-cols-8 gap-2">
        <div class="relative text-sm text-gray-800 col-span-3">
            <div class="absolute pl-2 left-0 top-0 bottom-0 flex items-center pointer-events-none text-gray-500">
                <x-icon.magnifying-glass />
            </div>

            <input type="text" placeholder="Search email or order #" class="block w-full rounded-lg border-0 py-1.5 pl-10 text-gray-900 ring-1 ring-inset ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>

        <div class="flex gap-2 justify-end col-span-5">
            <div class="hidden sm:flex">
                <button type="button" class="flex items-center gap-2 rounded-lg border px-3 py-1.5 bg-white font-medium text-sm text-gray-700 hover:bg-gray-200">
                    <x-icon.arrow-down-tray />

                    Export
                </button>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto w-full">
        <div class="relative animate-pulse min-w-[49.5rem]">
            <div class="p-3">
                <div class="w-full bg-gray-100 rounded-lg">&nbsp;</div>
            </div>

            <table class="min-w-full table-fixed divide-y divide-gray-300 text-gray-800">
                <tbody class="divide-y divide-gray-200 bg-white text-gray-700">
                    @foreach (range(0, 5) as $i)
                        <tr>
                            <td class="whitespace-nowrap p-3 text-sm">
                                <div class="w-full bg-gray-200 rounded-lg">&nbsp;</div>
                            </td>
                            <td class="whitespace-nowrap p-3 text-sm" colspan="2">
                                <div class="w-full bg-gray-200 rounded-lg">&nbsp;</div>
                            </td>
                            <td class="whitespace-nowrap p-3 text-sm" colspan="3">
                                <div class="w-full bg-gray-200 rounded-lg">&nbsp;</div>
                            </td>
                            <td class="whitespace-nowrap p-3 text-sm">
                                <div class="w-full bg-gray-200 rounded-lg">&nbsp;</div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
