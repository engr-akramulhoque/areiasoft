<x-app-layout>

    <div class="container mx-auto px-4 py-6 bg-white dark:bg-gray-800">

        <!-- HEADER -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">

            <div>

                <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                    Inbox
                </h1>

                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1 mb-3">
                    Manage contact messages and inquiries.
                </p>

            </div>

        </div>

        <!-- SUCCESS MESSAGE -->
        @if (session('success'))
            <div
                class="mb-4 flex items-center gap-3 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700 dark:border-green-800 dark:bg-green-900/30 dark:text-green-300">

                <i class="bi bi-check-circle-fill"></i>

                <span>
                    {{ session('success') }}
                </span>

            </div>
        @endif

        <!-- FILTERS -->
        <div class="flex flex-wrap gap-2 mb-4 overflow-x-auto">

            <a href="{{ route('admin.contacts.index', ['filter' => 'all']) }}"
                class="flex items-center gap-2 px-3 py-2 rounded-md border text-sm transition
                {{ $filter == 'all'
                    ? 'bg-blue-500 text-white border-blue-500'
                    : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 border-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700' }}">
                <i class="bi bi-inbox-fill"></i>

                <span>All</span>
            </a>


            <!-- Unread -->
            <a href="{{ route('admin.contacts.index', ['filter' => 'unread']) }}"
                class="flex items-center gap-2 px-3 py-2 rounded-md border text-sm transition
                {{ $filter == 'unread'
                    ? 'bg-yellow-400 text-white border-yellow-400'
                    : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 border-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700' }}">
                <i class="bi bi-envelope-fill"></i>

                <span>Unread</span>
            </a>


            <!-- Read -->
            <a href="{{ route('admin.contacts.index', ['filter' => 'read']) }}"
                class="flex items-center gap-2 px-3 py-2 rounded-md border text-sm transition
                {{ $filter == 'read'
                    ? 'bg-green-500 text-white border-green-500'
                    : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 border-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700' }}">
                <i class="bi bi-envelope-open-fill"></i>

                <span>Read</span>
            </a>


            <!-- Archived -->
            <a href="{{ route('admin.contacts.index', ['filter' => 'archived']) }}"
                class="flex items-center gap-2 px-3 py-2 rounded-md border text-sm transition
                {{ $filter == 'archived'
                    ? 'bg-gray-500 text-white border-gray-500'
                    : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 border-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700' }}">
                <i class="bi bi-archive-fill"></i>

                <span>Archived</span>
            </a>


            <!-- Starred -->
            <a href="{{ route('admin.contacts.index', ['filter' => 'starred']) }}"
                class="flex items-center gap-2 px-3 py-2 rounded-md border text-sm transition
                {{ $filter == 'starred'
                    ? 'bg-indigo-500 text-white border-indigo-500'
                    : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 border-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700' }}">
                <i class="bi bi-star-fill"></i>

                <span>Starred</span>
            </a>

        </div>


        <!-- BULK ACTION BAR -->
        <form id="bulkActionForm" method="POST" action="{{ route('admin.contacts.bulkAction') }}">

            @csrf

            <div id="bulkActionBar"
                class="hidden mb-4 rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 p-3">

                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-3">


                    <!-- Selection Info -->
                    <div class="flex items-center gap-3">

                        <div
                            class="flex items-center justify-center w-9 h-9 rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-900/40 dark:text-blue-400">
                            <i class="bi bi-check2-square"></i>
                        </div>


                        <div>

                            <div class="text-sm font-semibold text-gray-900 dark:text-gray-100">

                                <span id="selectedCount">
                                    0
                                </span>

                                selected

                            </div>

                            <button type="button" id="clearSelection"
                                class="text-xs text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                                Clear selection
                            </button>

                        </div>

                    </div>


                    <!-- Actions -->
                    <div class="flex flex-wrap items-center gap-2">


                        <!-- Mark Read -->
                        @can('edit contact')
                            <button type="submit" name="action" value="read"
                                class="bulk-action-btn bg-green-500 hover:bg-green-600" title="Mark as read">

                                <i class="bi bi-envelope-open-fill"></i>

                                <span class="hidden sm:inline">
                                    Read
                                </span>

                            </button>


                            <!-- Mark Unread -->
                            <button type="submit" name="action" value="unread"
                                class="bulk-action-btn bg-yellow-500 hover:bg-yellow-600" title="Mark as unread">

                                <i class="bi bi-envelope-fill"></i>

                                <span class="hidden sm:inline">
                                    Unread
                                </span>

                            </button>


                            <!-- Star -->
                            <button type="submit" name="action" value="star"
                                class="bulk-action-btn bg-indigo-500 hover:bg-indigo-600" title="Star selected">

                                <i class="bi bi-star-fill"></i>

                                <span class="hidden sm:inline">
                                    Star
                                </span>

                            </button>


                            <!-- Unstar -->
                            <button type="submit" name="action" value="unstar"
                                class="bulk-action-btn bg-gray-500 hover:bg-gray-600" title="Remove star">

                                <i class="bi bi-star"></i>

                                <span class="hidden sm:inline">
                                    Unstar
                                </span>

                            </button>


                            <!-- Archive -->
                            <button type="submit" name="action" value="archive"
                                class="bulk-action-btn bg-gray-600 hover:bg-gray-700" title="Archive selected">

                                <i class="bi bi-archive-fill"></i>

                                <span class="hidden sm:inline">
                                    Archive
                                </span>

                            </button>
                        @endcan


                        <!-- Delete -->
                        @can('delete contact')
                            <button type="submit" name="action" value="delete"
                                class="bulk-action-btn bg-red-500 hover:bg-red-600" title="Delete selected"
                                data-delete-action>

                                <i class="bi bi-trash-fill"></i>

                                <span class="hidden sm:inline">
                                    Delete
                                </span>

                            </button>
                        @endcan

                    </div>

                </div>

            </div>


            <!-- INBOX TABLE -->
            <div class="overflow-x-auto rounded-lg shadow bg-white dark:bg-gray-800">

                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">

                    <thead class="bg-gray-300 dark:bg-gray-900">

                        <tr>

                            <!-- Select All -->
                            <th class="px-3 py-3 text-center w-10">

                                <input type="checkbox" id="selectAll"
                                    class="contact-checkbox rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                                    title="Select all">

                            </th>


                            <!-- Star -->
                            <th
                                class="px-3 py-2 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300">
                                ⭐
                            </th>


                            <!-- Status -->
                            <th
                                class="px-3 py-2 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300">
                                Status
                            </th>


                            <!-- Name -->
                            <th
                                class="px-3 py-2 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300">
                                Name
                            </th>


                            <!-- Email -->
                            <th
                                class="px-3 py-2 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300">
                                Email
                            </th>


                            <!-- Subject -->
                            <th
                                class="px-3 py-2 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300">
                                Subject
                            </th>


                            <!-- Received -->
                            <th
                                class="px-3 py-2 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300">
                                Received
                            </th>


                            <!-- Actions -->
                            <th
                                class="px-3 py-2 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">

                        @forelse ($contacts as $contact)

                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 text-xs sm:text-sm transition">

                                <!-- Select -->
                                <td class="px-3 py-2 text-center">

                                    <input type="checkbox" name="contacts[]" value="{{ $contact->id }}"
                                        class="contact-checkbox contact-row-checkbox rounded border-gray-300 text-blue-600 focus:ring-blue-500">

                                </td>


                                <!-- Star -->
                                <td class="px-3 py-2 text-center">

                                    <form action="{{ route('admin.contacts.toggleStar', $contact) }}" method="POST">

                                        @csrf

                                        <button type="submit" class="focus:outline-none"
                                            title="{{ $contact->is_starred ? 'Remove star' : 'Star' }}">

                                            @if ($contact->is_starred)
                                                <i class="bi bi-star-fill text-yellow-400"></i>
                                            @else
                                                <i class="bi bi-star text-gray-400 dark:text-gray-500"></i>
                                            @endif

                                        </button>

                                    </form>

                                </td>


                                <!-- Status -->
                                <td class="px-3 py-2">

                                    <span
                                        class="px-2 py-1 rounded text-xs font-semibold inline-flex items-center gap-1
                                        @if ($contact->status == \App\Models\Contact::STATUS_UNREAD) bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300
                                        @elseif($contact->status == \App\Models\Contact::STATUS_READ)
                                            bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300
                                        @elseif($contact->status == \App\Models\Contact::STATUS_ARCHIVED)
                                            bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300 @endif">

                                        @if ($contact->status == \App\Models\Contact::STATUS_UNREAD)
                                            <i class="bi bi-envelope-fill" title="Unread"></i>

                                            <span class="hidden sm:inline">
                                                Unread
                                            </span>
                                        @elseif($contact->status == \App\Models\Contact::STATUS_READ)
                                            <i class="bi bi-envelope-open-fill" title="Read"></i>

                                            <span class="hidden sm:inline">
                                                Read
                                            </span>
                                        @elseif($contact->status == \App\Models\Contact::STATUS_ARCHIVED)
                                            <i class="bi bi-archive-fill" title="Archived"></i>

                                            <span class="hidden sm:inline">
                                                Archived
                                            </span>
                                        @endif

                                    </span>

                                </td>


                                <!-- Name -->
                                <td class="px-3 py-2 text-gray-700 dark:text-gray-200">
                                    {{ $contact->name }}
                                </td>


                                <!-- Email -->
                                <td class="px-3 py-2 text-gray-700 dark:text-gray-200">
                                    {{ $contact->email }}
                                </td>


                                <!-- Subject -->
                                <td class="px-3 py-2 font-medium text-gray-900 dark:text-gray-100">
                                    {{ $contact->subject }}
                                </td>


                                <!-- Received -->
                                <td class="px-3 py-2 text-gray-500 dark:text-gray-400 whitespace-nowrap">
                                    {{ $contact->created_at->diffForHumans() }}
                                </td>


                                <!-- Actions -->
                                <td class="px-3 py-2">

                                    <div class="flex flex-wrap gap-1">

                                        @can('view contact')
                                            <a href="{{ route('admin.contacts.show', $contact) }}"
                                                class="flex items-center gap-1 px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-xs sm:text-sm"
                                                title="View">

                                                <i class="bi bi-eye-fill"></i>

                                            </a>
                                        @endcan


                                        @can('edit contact')
                                            @if ($contact->status != \App\Models\Contact::STATUS_ARCHIVED)
                                                <form action="{{ route('admin.contacts.archive', $contact) }}"
                                                    method="POST">

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
                                            <form action="{{ route('admin.contacts.destroy', $contact) }}"
                                                method="POST">

                                                @csrf

                                                @method('DELETE')

                                                <button type="submit"
                                                    class="flex items-center gap-1 px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-xs sm:text-sm"
                                                    onclick="return confirm('Delete this message?')" title="Delete">

                                                    <i class="bi bi-trash-fill"></i>

                                                </button>

                                            </form>
                                        @endcan

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8" class="px-6 py-12 text-center">

                                    <div class="flex flex-col items-center">

                                        <i class="bi bi-inbox text-4xl text-gray-300 dark:text-gray-600"></i>

                                        <p class="mt-3 text-sm font-medium text-gray-500 dark:text-gray-400">
                                            No messages found.
                                        </p>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-4">

                {{ $contacts->links('pagination::tailwind') }}

            </div>

        </form>

    </div>


    <!-- BULK ACTION JAVASCRIPT -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const selectAll =
                document.getElementById('selectAll');

            const checkboxes =
                document.querySelectorAll('.contact-row-checkbox');

            const bulkActionBar =
                document.getElementById('bulkActionBar');

            const selectedCount =
                document.getElementById('selectedCount');

            const clearSelection =
                document.getElementById('clearSelection');

            const bulkForm =
                document.getElementById('bulkActionForm');


            /*
             * Update selection state
             */
            function updateSelection() {

                const selected =
                    document.querySelectorAll(
                        '.contact-row-checkbox:checked'
                    );


                const count =
                    selected.length;


                selectedCount.textContent = count;


                /*
                 * Show / hide bulk action bar
                 */
                if (count > 0) {

                    bulkActionBar.classList.remove('hidden');

                } else {

                    bulkActionBar.classList.add('hidden');

                }


                /*
                 * Update select-all state
                 */
                const total =
                    checkboxes.length;


                if (total === 0) {

                    selectAll.checked = false;

                    selectAll.indeterminate = false;

                    return;
                }


                selectAll.checked =
                    count === total;


                selectAll.indeterminate =
                    count > 0 && count < total;

            }


            /*
             * Select all
             */
            selectAll.addEventListener(
                'change',
                function() {

                    checkboxes.forEach(function(checkbox) {

                        checkbox.checked =
                            selectAll.checked;

                    });


                    updateSelection();

                }
            );


            /*
             * Individual selection
             */
            checkboxes.forEach(function(checkbox) {

                checkbox.addEventListener(
                    'change',
                    updateSelection
                );

            });


            /*
             * Clear selection
             */
            clearSelection.addEventListener(
                'click',
                function() {

                    checkboxes.forEach(function(checkbox) {

                        checkbox.checked = false;

                    });


                    selectAll.checked = false;

                    selectAll.indeterminate = false;

                    updateSelection();

                }
            );


            /*
             * Delete confirmation
             */
            const deleteButton =
                document.querySelector(
                    '[data-delete-action]'
                );


            if (deleteButton) {

                deleteButton.addEventListener(
                    'click',
                    function(event) {

                        const selected =
                            document.querySelectorAll(
                                '.contact-row-checkbox:checked'
                            );


                        if (selected.length === 0) {

                            event.preventDefault();

                            return;

                        }


                        const confirmed =
                            confirm(
                                `Are you sure you want to permanently delete ${selected.length} selected message(s)? This action cannot be undone.`
                            );


                        if (!confirmed) {

                            event.preventDefault();

                        }

                    }
                );

            }


            /*
             * Prevent submitting without selection
             */
            bulkForm.addEventListener(
                'submit',
                function(event) {

                    const selected =
                        document.querySelectorAll(
                            '.contact-row-checkbox:checked'
                        );


                    if (selected.length === 0) {

                        event.preventDefault();

                        alert(
                            'Please select at least one contact.'
                        );

                    }

                }
            );


            /*
             * Initial state
             */
            updateSelection();

        });
    </script>


    <style>
        .bulk-action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 7px 10px;
            color: white;
            border-radius: 7px;
            font-size: 0.75rem;
            font-weight: 600;
            transition:
                background-color 0.2s ease,
                transform 0.15s ease;
        }

        .bulk-action-btn:hover {
            transform: translateY(-1px);
        }

        .bulk-action-btn:active {
            transform: translateY(0);
        }

        .contact-checkbox {
            width: 16px;
            height: 16px;
            cursor: pointer;
        }

        #bulkActionBar {
            animation: bulkBarIn 0.2s ease-out;
        }

        @keyframes bulkBarIn {

            from {
                opacity: 0;

                transform: translateY(-5px);
            }

            to {
                opacity: 1;

                transform: translateY(0);
            }

        }
    </style>

</x-app-layout>
