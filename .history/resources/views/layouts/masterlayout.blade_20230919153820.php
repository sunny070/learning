<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <x-partials.head />
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Desktop sidebar -->
        <x-partials.nav/>
        <div class="flex flex-col flex-1 w-full">
{{ $slot }}
        </div>    
    </div>
</body>

</html>