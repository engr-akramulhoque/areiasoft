<div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
    <div class="p-4 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
        <h2 class="font-semibold text-lg">Recent Contacts</h2>
        <a href="{{ route('admin.contacts.index') }}"
            class="text-sm text-areia-600 dark:text-areia-400 hover:underline">View
            All</a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        ID
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Subject
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Customer
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Status
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Date
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @forelse ($contacts as $contact)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                        <!-- ID -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-areia-600 dark:text-areia-400">
                            {{ $loop->iteration }}
                        </td>

                        <!-- Subject -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            {{ Str::limit($contact->subject, 40) }}
                        </td>

                        <!-- Customer -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            {{ $contact->name }}
                        </td>

                        <!-- Status -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $statusColors = [
                                    'Unread' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200',
                                    'Read' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200',
                                    'Archived' => 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200',
                                    'Unknown' =>
                                        'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200',
                                ];
                                $colorClass = $statusColors[$contact->status_label] ?? $statusColors['Unknown'];
                            @endphp
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $colorClass }}">
                                {{ $contact->status_label }}
                            </span>
                        </td>

                        <!-- Date -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            {{ $contact->created_at->diffForHumans() }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                            No recent unread contacts found.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>
</div>
