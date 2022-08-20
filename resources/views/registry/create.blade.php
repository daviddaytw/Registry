<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="my-4 text-3xl md:text-5xl font-bold leading-tight text-center md:text-left">{{ __('Create a Registry') }}</h1>

        <form action="{{ route("registry.store") }}" method="post">
            @csrf
            <div class="mb-3">
                <textarea id="content" name="data" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="{{ __('Leave the data...') }}" required></textarea>
            </div>
            <fieldset>
                <div class="flex items-center mb-3">
                    <label for="ownerSelector" class="ml-2 font-medium text-gray-900">{{ __('Owner:') }}</label>
                    <select id="ownerSelector" name="owner" class="mx-2 rounded">
                        <option value="">{{ __('Anonymous') }}</option>
                        @foreach( auth()->user()->allTeams() as $team )
                        <option value="{{ $team->id }}" @if( $team == auth()->user()->currentTeam) selected @endif>{{ $team->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center mb-3">
                    <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 focus:ring-2" id="protectAccessCheckbox" name="protectAccess" />
                    <label for="protectAccessCheckbox" class="ml-2 font-medium text-gray-900">{{ __('Protect accessibility.') }}</label>
                </div>
                <div class="flex items-center mb-3">
                    <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 focus:ring-2" id="protectWriteCheckbox" name="protectWrite" checked />
                    <label for="protectWriteCheckbox" class="ml-2 font-medium text-gray-900">{{ __('Protect writability.') }}</label>
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

</x-app-layout>
