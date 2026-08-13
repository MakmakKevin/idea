<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Idea</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-foreground">
    
    <x-layout.nav />

    <main class="max-w-6xl mx-auto px-10 pb-10 py-5">
        {{ $slot }}
    </main>

    @session('success')
        <div 
        x-init="setTimeout(() => { $el.remove() }, 3000)"
        class="bg-primary px-4 py-3 absolute bottom-4 right-4 rounded-lg"> {{$value}} </div>
    @endsession
</body>
</html>