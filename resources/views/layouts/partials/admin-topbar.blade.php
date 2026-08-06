<header class="bg-white dark:bg-gray-800 shadow-sm sticky top-0 z-topbar">
    <div class="flex items-center justify-between p-3">
        <div class="flex items-center space-x-4">
            <button id="mobileSidebarToggle" class="p-1 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 lg:hidden">
                <i class="fas fa-bars text-gray-500 dark:text-gray-400"></i>
            </button>
            <h1 class="text-xl font-semibold">{{ $header ?? 'Dashboard' }}</h1>
        </div>

        <div class="flex items-center space-x-4">
            <button id="themeToggle" class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700">
                <i class="fas fa-moon dark:hidden"></i>
                <i class="fas fa-sun hidden dark:block"></i>
            </button>

            @php
                $unreadCount = \App\Models\Contact::where('status', \App\Models\Contact::STATUS_UNREAD)->count();
                $latestMessages = \App\Models\Contact::latest()->take(5)->get();
            @endphp

            <!-- Messages Dropdown -->
            <div class="relative">
                <button id="messagesDropdown"
                    class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 relative">
                    <i class="fas fa-envelope"></i>
                    <span
                        class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                        {{ $unreadCount }}
                    </span>
                </button>
                <div id="messagesMenu"
                    class="hidden absolute right-0 mt-2 w-72 bg-white dark:bg-gray-800 rounded-md shadow-lg z-dropdown border border-gray-200 dark:border-gray-700">
                    <div class="p-3 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="font-medium">Messages</h3>
                    </div>
                    <div class="max-h-60 overflow-y-auto">
                        @forelse ($latestMessages as $message)
                            <a href="{{ route('admin.contacts.show', $message) }}"
                                class="block p-3 hover:bg-gray-200 dark:hover:bg-gray-700 border-b border-gray-200 dark:border-gray-700 @if ($message->status == \App\Models\Contact::STATUS_UNREAD) bg-gray-200 dark:bg-gray-700 @endif">
                                <div class="flex items-start space-x-3">
                                    <div
                                        class="flex-shrink-0 h-10 w-10 rounded-full bg-areia-100 dark:bg-gray-600 flex items-center justify-center">
                                        <i class="fas fa-user text-areia-600 dark:text-areia-300"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium">{{ $message->subject }}</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            {{ Str::limit($message->message, 60) }}
                                        </p>
                                        <p class="text-xs text-gray-400 dark:text-gray-500">
                                            {{ $message->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <p class="p-3 text-gray-500 dark:text-gray-400 text-sm text-center">No messages</p>
                        @endforelse
                    </div>
                    <div class="p-3 text-center border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('admin.contacts.index') }}"
                            class="text-sm font-medium text-areia-600 dark:text-areia-400 hover:underline">View
                            all messages</a>
                    </div>
                </div>
            </div>

            <!-- Notifications Dropdown -->
            <div class="relative">
                <button id="notificationsDropdown"
                    class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 relative">
                    <i class="fas fa-bell"></i>
                    <span
                        class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">5</span>
                </button>
                <div id="notificationsMenu"
                    class="hidden absolute right-0 mt-2 w-72 bg-white dark:bg-gray-800 rounded-md shadow-lg z-dropdown border border-gray-200 dark:border-gray-700">
                    <div class="p-3 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="font-medium">Notifications</h3>
                    </div>
                    <div class="max-h-60 overflow-y-auto">
                        <a href="#"
                            class="block p-3 hover:bg-gray-100 dark:hover:bg-gray-700 border-b border-gray-200 dark:border-gray-700">
                            <div class="flex items-start space-x-3">
                                <div
                                    class="flex-shrink-0 h-10 w-10 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center">
                                    <i class="fas fa-check text-green-600 dark:text-green-400"></i>
                                </div>
                                <div>
                                    <p class="font-medium">Ticket resolved</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        Ticket #1234 has been marked as resolved
                                    </p>
                                    <p class="text-xs text-gray-400 dark:text-gray-500">
                                        10 mins ago
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="#"
                            class="block p-3 hover:bg-gray-100 dark:hover:bg-gray-700 border-b border-gray-200 dark:border-gray-700">
                            <div class="flex items-start space-x-3">
                                <div
                                    class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center">
                                    <i class="fas fa-info-circle text-blue-600 dark:text-blue-400"></i>
                                </div>
                                <div>
                                    <p class="font-medium">System update</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        New version 2.3.0 is available
                                    </p>
                                    <p class="text-xs text-gray-400 dark:text-gray-500">
                                        1 day ago
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="block p-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <div class="flex items-start space-x-3">
                                <div
                                    class="flex-shrink-0 h-10 w-10 rounded-full bg-yellow-100 dark:bg-yellow-900/30 flex items-center justify-center">
                                    <i class="fas fa-exclamation-triangle text-yellow-600 dark:text-yellow-400"></i>
                                </div>
                                <div>
                                    <p class="font-medium">High priority</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        Ticket #5678 has been marked as high priority
                                    </p>
                                    <p class="text-xs text-gray-400 dark:text-gray-500">
                                        2 days ago
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-3 text-center border-t border-gray-200 dark:border-gray-700">
                        <a href="#"
                            class="text-sm font-medium text-areia-600 dark:text-areia-400 hover:underline">View
                            all notifications</a>
                    </div>
                </div>
            </div>

            <!-- Profile Dropdown -->
            <div class="relative">
                <button id="profileDropdown" class="flex items-center space-x-2 focus:outline-none">
                    <div class="h-10 w-10 rounded-full bg-areia-100 dark:bg-gray-600 flex items-center justify-center">
                        <img src="{{ asset('storage/' . auth()->user()->profile_photo_path) }}"
                            alt="{{ auth()->user()->name ?? 'Admin User' }}" class="rounded-full h-full">
                    </div>
                    <span
                        class="hidden md:inline-block">{{ Str::limit(auth()->user()->name, 10, '.') ?? 'Admin User' }}</span>
                    <i class="fas fa-chevron-down text-xs hidden md:inline-block"></i>
                </button>
                <div id="profileMenu"
                    class="hidden absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg z-dropdown border border-gray-200 dark:border-gray-700">
                    <a href="{{ route('profile.show') }}"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">My
                        Profile</a>
                    <a href="{{ route('profile.password.update') }}"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">Change
                        Password</a>
                    <a href="{{ route('profile.two_factor_authentication') }}"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">Two
                        Factor Auth</a>
                    <a href="{{ route('profile.settings') }}"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">Settings</a>

                    <div class="border-t border-gray-200 dark:border-gray-700"></div>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <button class="w-full text-left block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700"
                            @click.prevent="$root.submit();">{{ __('Log Out') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
