<!DOCTYPE html>
<html lang="en">
<head>{{-- this is defined outside of the @inertia domain, I need to use the Head inertia element to modify it and make it dynamic --}}
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @vite('resources/js/app.js')
    @inertiaHead
</head>
<body>
    @inertia
</body>
</html>
