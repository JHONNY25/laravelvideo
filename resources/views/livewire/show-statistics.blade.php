
<div class="relative overflow-x-auto ">

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name Video
                </th>
                <th scope="col" class="px-6 py-3">
                    Searches
                </th>
                <th scope="col" class="px-6 py-3">
                    Visualizations
                </th>
            </tr>
        </thead>
        <tbody>

            @foreach ($statistics as $statistic)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                    <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="ps-3">
                            <div class="text-base font-semibold">{{ $statistic->name }}</div>
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        {{ $statistic->searches }}
                    </td>

                    <td class="px-6 py-4 text-center inline-flex items-center">
                        {{ $statistic->visualizations }}
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <div class="py-4" >
        {!! $statistics->render() !!}
    </div>

</div>


