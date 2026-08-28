<x-layout>
    <div class="max-w-3xl mx-auto py-8 md:py-12">
        <div class="flex justify-between items-center">
            <a href="{{ route('ideas.index') }}" class="flex items-center gap-2 text-md font-medium">
                <x-icon.arrow-back />
                Back to Ideas
            </a>

            <div>
                {{-- <a href="{{ route('ideas.update', $idea) }}" class="btn btn-sm">Edit Idea</a>
                <a href="{{ route('ideas.destroy', $idea) }}" class="btn btn-sm btn-error">Delete Idea</a> --}}
                <button class="btn btn-sm btn-ghost">
                    <x-icon.edit-text />
                    Edit Idea
                </button>

                <form action="{{ route('ideas.destroy', $idea->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-sm btn-ghost text-red-500 hover:text-red-600 hover:bg-red-200">
                        <x-icon.trash />
                        Delete
                    </button>
                </form>
            </div>
        </div>

        <div class="mb-6 mt-8 space-y-5">
            <h1 class="text-3xl font-bold">{{ $idea->title }}</h1>
            <p class="text-muted-foreground text-sm">
                {{ $idea->description }}
            </p>
        </div>

        <div class="mt-5">
            <x-pill status="{{ $idea->status }}">
                {{ $idea->status->label() }}
            </x-pill>
        </div>

        <div class="mt-5">
            <p class="text-muted-foreground text-sm">Created at: {{ $idea->created_at->format('F j, Y, g:i a') }}</p>
        </div>

        @if ($idea->links->count())
            <div>
                <h3 class="text-xl font-bold mt-6 mb-3">Links</h3>
                <div class="space-y-2"">
                    @foreach ($idea->links as $link )
                    <x-card href="{{ $link }} " class=" flex-row text-primary hover:text-primary/80 gap-x-3">
                        <x-icon.external />
                        {{ $link }}
                    </x-card>
                @endforeach
                </div>
            </div>
        @endif

    </div>
</x-layout>