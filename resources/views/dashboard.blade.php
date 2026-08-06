<x-app-layout>
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">

        <x-dashboard.stats-card title="Contacts" :value="$stats['contacts']"
            icon="fas fa-address-book text-areia-600 dark:text-areia-300" bgColor="bg-areia-100"
            borderColor="border-areia-600" />

        <x-dashboard.stats-card title="Admin Users" :value="$stats['admin_users']"
            icon="fas fa-users-cog text-blue-600 dark:text-blue-300" bgColor="bg-blue-100"
            borderColor="border-blue-600" />

    </div>

    <!-- Recent Contacts and Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <!-- Recent Contacts -->
        <x-dashboard.contact-table :contacts="$contacts" />

        <!-- Recent Activity -->
        <x-dashboard.recent-activity :recentActivities="$recentActivities" />

    </div>
</x-app-layout>