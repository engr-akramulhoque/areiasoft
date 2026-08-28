<aside
    class="w-64 bg-white dark:bg-gray-800 shadow-md transform transition-all duration-300 ease-in-out z-sidebar lg:z-sidebar fixed h-full -translate-x-full lg:translate-x-0">
    <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-700">
        <div class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-areia-600" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <span class="text-xl font-bold text-areia-600">Areia Tech</span>
        </div>
        <button id="sidebarToggle" class="p-1 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 lg:hidden">
            <i class="fas fa-times text-gray-500 dark:text-gray-400"></i>
        </button>
    </div>

    <!-- Scrollable sidebar content -->
    <div class="sidebar-container">
        <div class="p-4">
            <div class="mb-6">
                <div class="flex items-center space-x-3 p-2 rounded-lg bg-areia-50 dark:bg-gray-700">
                    <div class="h-10 w-10 rounded-full bg-areia-100 dark:bg-gray-600 flex items-center justify-center">
                        <img src="{{ asset('storage/' . auth()->user()->profile_photo_path) }}"
                            alt="{{ auth()->user()->name ?? 'Admin User' }}" class="rounded-full h-full">
                    </div>
                    <div>
                        <p class="font-medium">{{ auth()->user()->name ?? 'Admin User' }}</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            {{ str()->lower(auth()->user()->roles->first()->name) ?? 'admin' }}
                        </p>
                    </div>
                </div>
            </div>

            <nav class="space-y-1">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center space-x-3 p-2 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-blue-500 text-white' : 'hover:bg-gray-200 dark:hover:bg-gray-700' }}">
                    <i class="fas fa-tachometer-alt w-5"></i>
                    <span>Dashboard</span>
                </a>

                @can('view contact')
                    @php
                        $unreadContacts = \App\Models\Contact::unread()->count();
                    @endphp

                    <a href="{{ route('admin.contacts.index') }}"
                        class="flex items-center space-x-3 p-2 rounded-lg {{ request()->routeIs('admin.contacts.*') ? 'bg-blue-500 text-white' : 'hover:bg-gray-200 dark:hover:bg-gray-700' }}">
                        <i class="fas fa-message w-5"></i>
                        <span>
                            Contacts
                            @if ($unreadContacts > 0)
                                <small class="ml-1 bg-red-500 text-white px-2 py-0.5 rounded-full text-xs">
                                    {{ $unreadContacts }}
                                </small>
                            @endif
                        </span>
                    </a>
                @endcan

                @canany(['view role', 'view user'])
                    <div class="dropdown">
                        <button
                            class="dropdown-toggle flex items-center justify-between w-full p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 {{ request()->routeIs('admin.users.*') || request()->routeIs('admin.roles.*')
                                ? 'bg-gray-200 dark:bg-gray-700'
                                : '' }}">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-users w-5"></i>
                                <span>Manage User</span>
                            </div>
                            <i class="fas fa-chevron-down text-xs transition-transform duration-200"></i>
                        </button>
                        <div
                            class="dropdown-content pl-8 mt-1 space-y-1 {{ request()->routeIs('admin.users.*') || request()->routeIs('admin.roles.*') ? '' : 'hidden' }}">
                            @can('view user')
                                <a href="{{ route('admin.users.index') }}"
                                    class="block p-2 rounded-lg {{ request()->routeIs('admin.users.*') ? 'bg-blue-500 text-white' : 'hover:bg-gray-200 dark:hover:bg-gray-700' }}">Users</a>
                            @endcan
                            @can('view role')
                                <a href="{{ route('admin.roles.index') }}"
                                    class="block p-2 rounded-lg {{ request()->routeIs('admin.roles.*') ? 'bg-blue-500 text-white' : 'hover:bg-gray-200 dark:hover:bg-gray-700' }}">Roles</a>
                            @endcan
                            @can('view visitor')
                                <a href="{{ route('admin.roles.index') }}"
                                    class="block p-2 rounded-lg {{ request()->routeIs('admin.users.*') ? 'bg-blue-500 text-white' : 'hover:bg-gray-200 dark:hover:bg-gray-700' }}">Visitors</a>
                            @endcan
                        </div>
                    </div>
                @endcanany

                @canany(['view_blog_category', 'view_blog'])
                    <div class="dropdown">
                        <button
                            class="dropdown-toggle flex items-center justify-between w-full p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 {{ request()->routeIs('admin.blog.*') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">

                            <div class="flex items-center space-x-3">
                                <i class="fas fa-blog w-5"></i>
                                <span>Blog</span>
                            </div>

                            <i class="fas fa-chevron-down text-xs transition-transform duration-200"></i>
                        </button>

                        <div
                            class="dropdown-content pl-8 mt-1 space-y-1 {{ request()->routeIs('admin.blog.*') ? '' : 'hidden' }}">

                            @can('view_blog_category')
                                <a href="{{ route('admin.blog.categories.index') }}"
                                    class="block p-2 rounded-lg {{ request()->routeIs('admin.blog.categories.*') ? 'bg-blue-500 text-white' : 'hover:bg-gray-200 dark:hover:bg-gray-700' }}">
                                    Categories
                                </a>
                            @endcan

                            @can('view_blog')
                                <a href="{{ route('admin.blogs.index') }}"
                                    class="block p-2 rounded-lg {{ request()->routeIs('admin.blogs.*') ? 'bg-blue-500 text-white' : 'hover:bg-gray-200 dark:hover:bg-gray-700' }}">
                                    Posts
                                </a>
                            @endcan

                        </div>
                    </div>
                @endcanany

                @canany(['view seo-manager', 'view sitemap', 'view robots-txt'])
                    <div class="dropdown">
                        <button
                            class="dropdown-toggle flex items-center justify-between w-full p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 {{ request()->routeIs('admin.sitemap.*') || request()->routeIs('admin.robots.*') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-search w-5"></i>
                                <span>SEO</span>
                            </div>
                            <i class="fas fa-chevron-down text-xs transition-transform duration-200"></i>
                        </button>
                        <div
                            class="dropdown-content pl-8 mt-1 space-y-1 {{ request()->routeIs('admin.sitemap.*') || request()->routeIs('admin.robots.*') ? '' : 'hidden' }}">
                            @can('view seo-manager')
                                <a href="{{ url(config('seo.route.prefix')) }}"
                                    class="block p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700">SEO Manager</a>
                            @endcan
                            @can('view sitemap')
                                <a href="{{ route('admin.sitemap.index') }}"
                                    class="block p-2 rounded-lg {{ request()->routeIs('admin.sitemap.*') ? 'bg-blue-500 text-white' : 'hover:bg-gray-200 dark:hover:bg-gray-700' }}">Sitemap</a>
                            @endcan
                            @can('view robots-txt')
                                <a href="{{ route('admin.robots.index') }}"
                                    class="block p-2 rounded-lg {{ request()->routeIs('admin.robots.*') ? 'bg-blue-500 text-white' : 'hover:bg-gray-200 dark:hover:bg-gray-700' }}">Robots
                                    TXT</a>
                            @endcan
                        </div>
                    </div>
                @endcanany
            </nav>
        </div>

        <!-- Authentication -->
        <div class="p-4 border-t border-gray-200 dark:border-gray-700">
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf

                <button type="submit" @click.prevent="$root.submit();"
                    class="w-full text-left flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700">
                    <i class="fas fa-sign-out-alt w-5"></i>
                    <span>{{ __('Log Out') }}</span>
                    </a>
            </form>
        </div>

    </div>
</aside>
