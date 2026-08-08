<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        {{-- Message Card --}}
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4 flex items-center gap-2">
                <i class="bi bi-envelope-fill text-blue-500"></i> Message from {{ $contact->name }}
            </h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                <div>
                    <p class="text-gray-700 dark:text-gray-200"><strong>Email:</strong> {{ $contact->email }}</p>
                </div>
                <div>
                    <p class="text-gray-700 dark:text-gray-200"><strong>Subject:</strong> {{ $contact->subject }}</p>
                </div>
                <div>
                    <p class="text-gray-700 dark:text-gray-200"><strong>Status:</strong>
                        <span
                            class="px-2 py-1 rounded-full text-xs font-semibold
                        @if ($contact->status == \App\Models\Contact::STATUS_UNREAD) bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300
                        @elseif($contact->status == \App\Models\Contact::STATUS_READ) bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300
                        @elseif($contact->status == \App\Models\Contact::STATUS_ARCHIVED) bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300 @endif">
                            {{ $contact->status_label }}
                        </span>
                    </p>
                </div>
                <div>
                    <p class="text-gray-700 dark:text-gray-200"><strong>Received:</strong>
                        {{ $contact->created_at->format('M d, Y H:i') }}</p>
                </div>
            </div>

            <div class="mb-4">
                <p class="text-gray-700 dark:text-gray-200 font-medium mb-2"><strong>Message:</strong></p>
                <div
                    class="text-start border rounded-lg p-4 bg-gray-50 dark:bg-gray-800 text-gray-800 dark:text-gray-200 whitespace-pre-wrap">
                    {{ $contact->message }}
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex flex-wrap gap-2 mt-4">
                <a href="{{ route('admin.contacts.index') }}"
                    class="flex items-center gap-1 px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 dark:hover:bg-gray-700">
                    <i class="bi bi-arrow-left-circle-fill"></i> Back
                </a>

                @can('edit contact')
                    @if ($contact->status != \App\Models\Contact::STATUS_ARCHIVED)
                        <form action="{{ route('admin.contacts.archive', $contact->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="flex items-center gap-1 px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-800 dark:bg-gray-600 dark:hover:bg-gray-700">
                                <i class="bi bi-archive-fill"></i> Archive
                            </button>
                        </form>
                    @endif
                @endcan

                @can('delete contact')
                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="flex items-center gap-1 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 dark:bg-red-600 dark:hover:bg-red-700"
                            onclick="return confirm('Delete this message?')">
                            <i class="bi bi-trash-fill"></i> Delete
                        </button>
                    </form>
                @endcan
            </div>
        </div>
    </div>
</x-app-layout>
