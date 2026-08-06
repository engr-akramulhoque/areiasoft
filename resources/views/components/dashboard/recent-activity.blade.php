<div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
    <div class="p-4 border-b border-gray-200 dark:border-gray-700">
        <h2 class="font-semibold text-lg">Recent Activity</h2>
    </div>
    <div class="p-4 space-y-4">
        @forelse ($recentActivities as $activity)
            <div class="flex items-start space-x-3">
                <div
                    class="flex-shrink-0 h-10 w-10 rounded-full bg-{{ $activity['color'] }}-100 dark:bg-gray-700 flex items-center justify-center">
                    <i
                        class="fas {{ $activity['icon'] }} text-{{ $activity['color'] }}-600 dark:text-{{ $activity['color'] }}-300"></i>
                </div>
                <div>
                    <p class="font-medium">{{ $activity['title'] }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $activity['text'] }}</p>
                    <p class="text-xs text-gray-400 dark:text-gray-500">{{ $activity['time_human'] }}</p>
                </div>
            </div>
        @empty
            <p class="text-sm text-gray-500 dark:text-gray-400 text-center py-4">No recent activity.</p>
        @endforelse
    </div>
</div>
