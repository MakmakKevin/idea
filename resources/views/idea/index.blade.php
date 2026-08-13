<x-layout>
    <div>
        <header class="py-8 md:py-12">
            <h1 class="text-3xl font-bold">Ideas</h1>
            <p class="text-muted-foreground text-sm">
                All the ideas you have submitted.
            </p>
        </header>

        <div>
            <a href="/ideas" class="btn btn-sm {{ request()->has('status') ? 'btn-outline' : '' }}" > All
                <span class="text-xs text-muted-foreground">{{ $statusCounts['all'] }}</span>
            </a>
            @foreach (App\IdeaStatus::cases() as $status)   
                <a 
                    href="/ideas?status={{$status->value}}" 
                    class=" btn btn-sm ml-2 mb-2 {{ request('status') === $status->value ? '' : 'btn-outline' }}">
                    {{ $status->label() }}
                    <span class="text-xs text-muted-foreground"> {{ $statusCounts[$status->value] }} </span>
                </a>
            @endforeach
        </div>

        <div class="mt-5">
            <div class="grid md:grid-cols-2 gap-6 text-muted-foreground">
                @forelse ($ideas as $idea)
                    {{-- <x-idea-card :idea="$idea" /> --}}
                    <x-card href="{{ route('ideas.show', $idea) }}">
                        <h3 class="text-foreground text-lg font-semibold">{{ $idea->title }}</h3>
                        
                        <div class="mt-2 mb-2 line-clamp-3">{{ $idea->description }}</div>

                        {{-- display the status label and time created at below the idea card --}}
                        <div class="mt-auto flex items-center justify-between">
                            <div>
                                <x-pill status="{{ $idea->status }}">
                                    {{ $idea->status->label() }}
                                </x-pill>
                            </div>
                            <div class="mt-2 text-xs "> {{ $idea->created_at->diffForHumans() }} </div>
                        </div>
                    </x-card>
                @empty
                    <x-card>
                        <p>Start building ideas!</p>
                    </x-card>
                @endforelse
            </div>

        </div>
    </div>
</x-layout>