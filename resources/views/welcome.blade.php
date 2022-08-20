<x-guest-layout>
    <div class="h-screen pb-14 bg-right bg-cover" style="background-image:url('bg.svg');">
        <!--Nav-->
        <div class="w-full container mx-auto p-6">

            <div class="w-full flex items-center justify-between">
                <a class="flex items-center text-indigo-400 no-underline hover:no-underline font-bold text-2xl lg:text-4xl" @auth href="{{ route('dashboard') }}" @endauth @guest href="{{ url('/') }}" @endguest>
                    Registry
                </a>

                <div class="flex w-1/2 justify-end content-center">
                    <a class="inline-block text-blue-400 no-underline hover:text-indigo-800 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4" href="{{ route('register') }}">
                        {{ __('SignUp') }}
                    </a>
                </div>

            </div>

        </div>

        <!--Hero-->
        <div class="container pt-6 md:pt-12 px-6 pb-4 mx-auto items-center">

            <h1 class="my-3 text-3xl md:text-5xl text-purple-800 font-bold leading-tight text-center">{{ __('A very SIMPLE, LAZY manner.') }}</h1>
            <p class="leading-normal text-base md:text-2xl mb-8 text-center">{{ __('Web storage service for tiny data.') }}</p>
            <div class="sm:px-36 px-12">
                <x-use-sample></x-use-sample>
            </div>
        </div>
        <!--Form-->
        <div class="container pt-6 md:pt-12 px-12 pb-4 mx-auto items-center">
            <h2 class="text-2xl text-blue-400 font-bold pb-8 lg:pb-6 text-center md:text-left">{{ __('Create regsitry for free:') }}</h2>

            <form action="{{ route("registry.store") }}" method="post">
                @csrf
                <div class="mb-3">
                    <textarea id="content" name="data" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="{{ __('Leave the data...') }}" required></textarea>
                </div>
                <fieldset>
                    <div class="flex items-center mb-3">
                        <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 focus:ring-2" id="protectAccessCheckbox" name="protectAccess" />
                        <label for="protectAccessCheckbox" class="ml-2 font-medium text-gray-900">{{ __('Protect the accessibility of registry with access token.') }}</label>
                    </div>
                    <div class="flex items-center mb-3">
                        <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 focus:ring-2" id="protectWriteCheckbox" name="protectWrite" checked />
                        <label for="protectWriteCheckbox" class="ml-2 font-medium text-gray-900">{{ __('Protect the writability of registry with access token.') }}</label>
                    </div>
                </fieldset>
                @if ($errors->any())
                <div class="text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">{{ __('Create') }}</button>
            </form>
        </div>

</x-guest-layout>
