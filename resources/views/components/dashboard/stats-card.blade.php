@props([
    'title' => 'Title',
    'value' => 0,
    'icon' => 'fas fa-chart-bar',
    'bgColor' => 'bg-gray-100',
    'borderColor' => 'border-gray-600',
])

<div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 border-l-4 {{ $borderColor }}">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $title }}</p>
            <p class="text-2xl font-bold">{{ $value }}</p>
        </div>
        <div class="p-3 rounded-full {{ $bgColor }}">
            <i class="{{ $icon }}"></i>
        </div>
    </div>
</div>
