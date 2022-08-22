<?php

namespace App\Http\Controllers;

use App\Models\Registry;
use Illuminate\Http\Request;

class APIController extends Controller
{
    /**
     * Show the registry.
     * 
     * @header Authorization Bearer (token)
     *
     * @param  Request  $request
     * @param  Registry  $registry
     * @return type
     */
    public function show(Request $request, Registry $registry)
    {
        if ($registry->access_token && $request->bearerToken() != $registry->access_token) {
            return response('Access denied', 403);
        }

        return $registry->data;
    }

    /**
     * Update the registry.
     *
     * @header Authorization Bearer (token)
     * 
     * @param  Request  $request
     * @param  Registry  $registry
     * @return type
     */
    public function update(Request $request, Registry $registry)
    {
        $request->validate([
            'data' => 'required',
        ]);
        if ($registry->write_token && $request->bearerToken() != $registry->write_token) {
            return response('Access denied', 403);
        }

        $registry->update([
            'data' => $request->data,
        ]);

        return response('Success', 200);
    }
}
