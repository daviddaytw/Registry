<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h1>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-3">
        <div class="py-6">
            <a href="{{ route('registry.create') }}">{{ __('Create Registry') }}</a>
        </div>
        @foreach( $registries as $registry )
        <div class="relative bg-white shadow-sm rounded sm:rounded-lg hover:border px-4 sm:px-8 py-4 mb-4">
            <div>
                <span class="text-gray-500 italic float-right text-sm">{{ __('Last update at: :time', [ 'time' => $registry->updated_at ]) }}</span>
                <h2>{{ $registry->id }}</h2>
                <h3 class="text-gray-500">{{ $registry->label }}</h3>
            </div>
            <div class="bg-gray-100 rounded w-full p-1">
                <code><pre>{{ $registry->data }}</pre></code>
            </div>
            <div class="text-right">
                <a class="after:absolute after:inset-0 text-sky-600 hover:text-sky-500" href="{{ route('registry.show', [$registry]) }}">>></a>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>
