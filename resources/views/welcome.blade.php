<x-guest-layout>
    <div class="h-screen pb-14 bg-right bg-cover" style="background-image:url('bg.svg');">
        <!--Nav-->
        <div class="w-full container mx-auto p-6">

            <div class="w-full flex items-center justify-between">
                <a class="flex items-center text-indigo-400 no-underline hover:no-underline font-bold text-2xl lg:text-4xl"  href="#">
                    Registry
                </a>

                <div class="flex w-1/2 justify-end content-center">
                    <a class="inline-block text-blue-300 no-underline hover:text-indigo-800 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4 " data-tippy-content="#facebook_id" href="https://www.facebook.com/sharer/sharer.php?u=#">
                        <svg class="fill-current h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M19 6h5V0h-5c-3.86 0-7 3.14-7 7v3H8v6h4v16h6V16h5l1-6h-6V7c0-.542.458-1 1-1z"></path></svg>
                    </a>
                    <a class="inline-block text-indigo-400 no-underline hover:text-indigo-600 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4 " href="{{ route('register') }}">
                        {{ __('Signup') }}
                    </a>
                </div>

            </div>

        </div>

        <!--Hero-->
        <div class="container pt-6 md:pt-12 px-6 pb-4 mx-auto items-center">

            <h1 class="my-3 text-3xl md:text-5xl text-purple-800 font-bold leading-tight text-center">{{ __('A very SIMPLE, LAZY manner.') }}</h1>
            <p class="leading-normal text-base md:text-2xl mb-8 text-center">{{ __('Web storage service for tiny data.') }}</p>
            <div class="px-36">
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
