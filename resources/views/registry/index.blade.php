<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="py-6">
            <a href="{{ route('registry.create') }}">{{ __('Create Registry') }}</a>
        </div>
        @foreach( $registries as $registry )
        <div class="relative bg-white shadow-sm sm:rounded-lg hover:border px-8 py-4 mb-4">
            <h2>{{ $registry->id }}</h2>
            <div class="bg-gray-100 rounded w-full p-1">
                <code><pre>{{ $registry->data }}</pre></code>
            </div>
            <a class="after:absolute after:inset-0" href="{{ route('registry.show', [$registry]) }}"></a>
        </div>
        @endforeach
    </div>
</x-app-layout>
