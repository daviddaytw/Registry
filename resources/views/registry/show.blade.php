<x-guest-layout>
    <div class="h-screen pb-14 bg-right bg-cover" style="background-image:url('{{ url('bg.svg') }}');">
        <!--Nav-->
        <div class="w-full container mx-auto p-6">

            <div class="w-full flex items-center justify-between">
                <a class="flex items-center text-indigo-400 no-underline hover:no-underline font-bold text-2xl lg:text-4xl" @auth href="{{ route('dashboard') }}" @endauth @guest href="{{ route('/') }}" @endguest>
                    Registry
                </a>

                <div class="flex w-1/2 justify-end content-center">
                    <a class="inline-block text-blue-400 no-underline hover:text-indigo-800 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4" href="{{ url('/docs') }}">
                        {{ __('Docs') }}
                    </a>
                    <a class="inline-block text-blue-400 no-underline hover:text-indigo-800 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4" href="{{ route('register') }}">
                        {{ __('SignUp') }}
                    </a>
                </div>

            </div>

        </div>

        <!--Main-->
        <div class="container pt-12 md:pt-24 px-6 pb-4 mx-auto items-center">
            <div class="bg-white overflow-hidden border rounded sm:rounded-lg px-8 py-4 mb-4">
                <div>
                    <span class="text-gray-500 italic float-right">{{ __('Last update at: :time', [ 'time' => $registry->updated_at ]) }}</span>
                    <h1 class="text-lg">{{ $registry->id }}</h1>
                    <h2 class="font-semibold text-gray-500">{{ $registry->label }}</h2>
                </div>
                <div class="border border-2 rounded w-full p-1">
                    <code><pre>{{ $registry->data }}</pre></code>
                </div>
                <div class="p-2">
                    @if( $registry->access_token )
                    <h2>{{ __('Read Access Token:') }}</h2>
                    <div class="bg-gray-100 rounded w-full p-1 overflow-hidden">
                        <code><pre>{{ $registry->access_token }}</pre></code>
                    </div>
                    @endif
                    @if( $registry->write_token )
                    <h2>{{ __('Write Access Token:') }}</h2>
                    <div class="bg-gray-100 rounded w-full p-1 overflow-hidden">
                        <code><pre>{{ $registry->write_token }}</pre></code>
                    </div>
                    @endif
                </div>
                <div class="flex flex-row-reverse">
                    @auth
                    @if( auth()->user()->allTeams()->contains($registry->team) )
                    <form action="{{ route('registry.destroy', [$registry]) }}" method="post">
                    @csrf
                    @method('DELETE')
                        <button type="submit">{{ __('Destroy') }}</button>
                    </form>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
        <div class="container mx-auto sm:px-8 mb-4">
            <x-use-sample :registry="$registry"></x-use-sample>
        </div>
</x-guest-layout>
