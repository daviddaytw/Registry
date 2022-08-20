<div x-data="{ tab: 'curl' }">
    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200">
        <li class="mr-2">
            <a @click="tab = 'curl'" :class="{ 'active text-blue-600 bg-gray-100': tab == 'curl' }" class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50">curl</a>
        </li>
        <li class="mr-2">
            <a @click="tab = 'python'" :class="{ 'active text-blue-600 bg-gray-100': tab == 'python' }" class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50">Python</a>
        </li>
        <li class="mr-2">
            <a @click="tab = 'js'" :class="{ 'active text-blue-600 bg-gray-100': tab == 'js' }" class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50">Javascript</a>
        </li>
        <li class="mr-2">
            <a @click="tab = 'php'" :class="{ 'active text-blue-600 bg-gray-100': tab == 'php' }" class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50">PHP</a>
        </li>
    </ul>
<pre x-show="tab == 'curl'"><code class="language-bash"># Get the stored data with curl.
curl -X GET {{ route('api.registry.show', ['registry' => $registry]) }}

# Update the stored data with curl.
curl -X PUT {{ route('api.registry.update', ['registry' => $registry]) }} \
    -H "Content-Type: application/json" \
@if( $registry->write_token )
    -H "Authorization: Bearer {{ $registry->write_token }}" \
@endif
    -d '{"data": "A new doggy!"}'
</code></pre>
<pre x-show="tab == 'python'"><code class="language-python">import requests

# Get the stored data with Python.
r = requests.get('{{ route('api.registry.show', ['registry' => $registry]) }}')

# Update the stored data with Python.
payload = {'data': 'A new doggy!'}
headers = {
    'Content-Type': 'application/json',
@if( $registry->write_token )
    'Authorization': 'Bearer {{ $registry->write_token }}'
@endif
}
requests.put('{{ route('api.registry.update', ['registry' => $registry]) }}', data=json.dumps(payload), headers=headers)
</code></pre>
<pre x-show="tab == 'js'"><code class="language-javascript">// Get the stored data with JavaScript.
var r = fetch('{{ route('api.registry.show', ['registry' => $registry]) }}')

// Update the stored data with Javascript.
fetch('{{ route('api.registry.show', ['registry' => $registry]) }}', {
    method: 'PUT',
    headers: {
        'Content-Type': 'application/json',
@if( $registry->write_token )
        'Authorization': 'Bearer {{ $registry->write_token }}'
@endif
    }
    body: JSON.stringify({data: 'A new doggy!'})
};
</code></pre>
<pre x-show="tab == 'php'"><code class="language-php">// Get the stored data with PHP.
$r = file_get_contents('{{ route('api.registry.show', ['registry' => $registry]) }}')

// Update the stored data with PHP.
$payload = array("data" => "A new doggy!");
$ch = curl_init('{{ route('api.registry.update', ['registry' => Str::uuid()]) }}');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
@if( $registry->write_token )
    'Authorization: Bearer {{ $registry->write_token }}',
@endif
));
curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
curl_exec($ch);
</code></pre>
</div>