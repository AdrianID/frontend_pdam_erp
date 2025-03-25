<div>
    @include('layouts.headers.cards')
    
    <div class="container mx-auto mt-10">
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
            <div class="col-span-2 bg-gradient-to-r from-gray-700 to-gray-900 shadow-lg rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h6 class="uppercase text-gray-400 text-sm">Overview</h6>
                        <h2 class="text-white text-lg font-semibold">Sales value</h2>
                    </div>
                    <div class="flex space-x-2">
                        <button class="px-3 py-2 bg-white text-gray-900 rounded shadow text-sm">Month</button>
                        <button class="px-3 py-2 bg-gray-600 text-white rounded shadow text-sm">Week</button>
                    </div>
                </div>
                <div>
                    <canvas id="chart-sales" class="w-full h-60"></canvas>
                </div>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h6 class="uppercase text-gray-500 text-sm">Performance</h6>
                <h2 class="text-gray-900 text-lg font-semibold">Total orders</h2>
                <div>
                    <canvas id="chart-orders" class="w-full h-60"></canvas>
                </div>
            </div>
        </div>
        
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mt-10">
            <div class="col-span-2 bg-white shadow-lg rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Page visits</h3>
                    <a href="#" class="text-blue-600 text-sm">See all</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full table-auto border-collapse">
                        <thead>
                            <tr class="bg-gray-100 text-gray-700 text-sm">
                                <th class="p-3 text-left">Page name</th>
                                <th class="p-3">Visitors</th>
                                <th class="p-3">Unique users</th>
                                <th class="p-3">Bounce rate</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pageVisits as $visit)
                            <tr class="border-b">
                                <td class="p-3">{{ $visit['page'] }}</td>
                                <td class="p-3">{{ $visit['visitors'] }}</td>
                                <td class="p-3">{{ $visit['users'] }}</td>
                                <td class="p-3 text-{{ $visit['status'] }}-500">{{ $visit['bounce'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Social traffic</h3>
                    <a href="#" class="text-blue-600 text-sm">See all</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full table-auto border-collapse">
                        <thead>
                            <tr class="bg-gray-100 text-gray-700 text-sm">
                                <th class="p-3 text-left">Referral</th>
                                <th class="p-3">Visitors</th>
                                <th class="p-3">%</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($socialTraffic as $traffic)
                            <tr class="border-b">
                                <td class="p-3">{{ $traffic['referral'] }}</td>
                                <td class="p-3">{{ $traffic['visitors'] }}</td>
                                <td class="p-3 text-{{ $traffic['status'] }}-500">{{ $traffic['percentage'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script>
        document.addEventListener('livewire:initialized', function() {
            // Sales chart
            var salesChart = new Chart(document.getElementById('chart-sales'), {
                type: 'line',
                data: {
                    labels: @json($salesData['labels']),
                    datasets: [{
                        label: 'Sales',
                        data: @json($salesData['values']),
                        backgroundColor: 'rgba(94, 114, 228, 0.1)',
                        borderColor: '#5e72e4',
                        pointBorderColor: '#5e72e4',
                        pointBackgroundColor: '#5e72e4',
                        pointBorderWidth: 1,
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: '#5e72e4',
                        pointHoverBorderColor: '#5e72e4',
                        pointHoverBorderWidth: 1,
                        pointRadius: 3,
                        fill: true,
                        tension: 0.4,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            // Orders chart
            var ordersChart = new Chart(document.getElementById('chart-orders'), {
                type: 'bar',
                data: {
                    labels: @json($ordersData['labels']),
                    datasets: [{
                        label: 'Orders',
                        data: @json($ordersData['values']),
                        backgroundColor: '#fb6340',
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        });
    </script>
    @endpush
</div>
