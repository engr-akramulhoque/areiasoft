<x-app-layout>
    <div class="container mx-auto px-4 py-6 bg-white dark:bg-gray-800">
        <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Inbox</h1>

        {{-- Filters --}}
        <div class="flex flex-wrap gap-2 mb-4 overflow-x-auto">
            <a href="{{ route('admin.contacts.index', ['filter' => 'all']) }}"
                class="flex items-center gap-1 px-3 py-1 rounded-md border text-sm
                {{ $filter == 'all' ? 'bg-blue-500 text-white border-blue-500' : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 border-gray-300 dark:border-gray-700' }}">
                <i class="bi bi-inbox-fill"></i> All
            </a>
            <a href="{{ route('admin.contacts.index', ['filter' => 'unread']) }}"
                class="flex items-center gap-1 px-3 py-1 rounded-md border text-sm
                {{ $filter == 'unread' ? 'bg-yellow-400 text-white border-yellow-400' : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 border-gray-300 dark:border-gray-700' }}">
                <i class="bi bi-envelope-fill"></i> Unread
            </a>
            <a href="{{ route('admin.contacts.index', ['filter' => 'read']) }}"
                class="flex items-center gap-1 px-3 py-1 rounded-md border text-sm
                {{ $filter == 'read' ? 'bg-green-500 text-white border-green-500' : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 border-gray-300 dark:border-gray-700' }}">
                <i class="bi bi-envelope-open-fill"></i> Read
            </a>
            <a href="{{ route('admin.contacts.index', ['filter' => 'archived']) }}"
                class="flex items-center gap-1 px-3 py-1 rounded-md border text-sm
                {{ $filter == 'archived' ? 'bg-gray-500 text-white border-gray-500' : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 border-gray-300 dark:border-gray-700' }}">
                <i class="bi bi-archive-fill"></i> Archived
            </a>
            <a href="{{ route('admin.contacts.index', ['filter' => 'starred']) }}"
                class="flex items-center gap-1 px-3 py-1 rounded-md border text-sm
                {{ $filter == 'starred' ? 'bg-indigo-500 text-white border-indigo-500' : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 border-gray-300 dark:border-gray-700' }}">
                <i class="bi bi-star-fill"></i> Starred
            </a>
        </div>

        {{-- Inbox Table --}}
        <div class="overflow-x-auto rounded-lg shadow bg-white dark:bg-gray-800">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-300 dark:bg-gray-900">
                    <tr>
                        <th class="px-3 py-2 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300">
                            ⭐</th>
                        <th class="px-3 py-2 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300">
                            Status</th>
                        <th class="px-3 py-2 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300">
                            Name</th>
                        <th class="px-3 py-2 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300">
                            Email</th>
                        <th class="px-3 py-2 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300">
                            Subject</th>
                        <th class="px-3 py-2 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300">
                            Received</th>
                        <th class="px-3 py-2 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($contacts as $contact)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 text-xs sm:text-sm">
                            {{-- Star --}}
                            <td class="px-3 py-2 text-center">
                                <form action="{{ route('admin.contacts.toggleStar', $contact) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="focus:outline-none">
                                        @if ($contact->is_starred)
                                            <i class="bi bi-star-fill text-yellow-400"></i>
                                        @else
                                            <i class="bi bi-star text-gray-400 dark:text-gray-500"></i>
                                        @endif
                                    </button>
                                </form>
                            </td>

                            {{-- Status --}}
                            <td class="px-3 py-2">
                                <span
                                    class="px-2 py-1 rounded text-xs font-semibold inline-flex items-center gap-1
    @if ($contact->status == \App\Models\Contact::STATUS_UNREAD) bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300
    @elseif($contact->status == \App\Models\Contact::STATUS_READ) bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300
    @elseif($contact->status == \App\Models\Contact::STATUS_ARCHIVED) bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300 @endif">

                                    @if ($contact->status == \App\Models\Contact::STATUS_UNREAD)
                                        <i class="bi bi-envelope-fill" title="Unread"></i>
                                    @elseif($contact->status == \App\Models\Contact::STATUS_READ)
                                        <i class="bi bi-envelope-open-fill" title="Read"></i>
                                    @elseif($contact->status == \App\Models\Contact::STATUS_ARCHIVED)
                                        <i class="bi bi-archive-fill" title="Archived"></i>
                                    @endif
                                </span>
                            </td>

                            {{-- Name --}}
                            <td class="px-3 py-2 text-gray-700 dark:text-gray-200">{{ $contact->name }}</td>

                            {{-- Email --}}
                            <td class="px-3 py-2 text-gray-700 dark:text-gray-200">{{ $contact->email }}</td>

                            {{-- Subject --}}
                            <td class="px-3 py-2 font-medium text-gray-900 dark:text-gray-100">{{ $contact->subject }}
                            </td>

                            {{-- Received --}}
                            <td class="px-3 py-2 text-gray-500 dark:text-gray-400">
                                {{ $contact->created_at->diffForHumans() }}</td>

                            {{-- Actions --}}
                            <td class="px-3 py-2 flex flex-wrap gap-1">
                                @can('view contact')
                                    <a href="{{ route('admin.contacts.show', $contact) }}"
                                        class="flex items-center gap-1 px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-xs sm:text-sm"
                                        title="View">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                @endcan
                                @can('edit contact')
                                    @if ($contact->status != \App\Models\Contact::STATUS_ARCHIVED)
                                        <form action="{{ route('admin.contacts.archive', $contact) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="flex items-center gap-1 px-2 py-1 bg-gray-500 text-white rounded hover:bg-gray-600 text-xs sm:text-sm"
                                                title="Archive">
                                                <i class="bi bi-archive-fill"></i>
                                            </button>
                                        </form>
                                    @endif
                                @endcan

                                @can('delete contact')
                                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="flex items-center gap-1 px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-xs sm:text-sm"
                                            onclick="return confirm('Delete this message?')" title="Delete">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $contacts->links('pagination::tailwind') }}
        </div>
    </div>
</x-app-layout>
