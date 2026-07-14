@props(['title','description','action','method' => 'POST'])
<div class="min-h-[calc(100dvh-4rem)] flex items-center justify-center px-10">
    <div class="w-full max-w-md">
        <div class="text-center">
            <h1 class="text-3xl font-bold mb-2">{{$title}}</h1>
            <p class="text-gray-600 mb-6">{{$description}}</p>
        </div>
        <form action="{{$action}}" method="{{$method}}">
            @csrf
            {{ $slot }}
        </form>

    </div>
</div>