<?php

namespace App\Http\Controllers;

use App\Models\Registry;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class RegistryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $registries = auth()->user()->currentTeam->registries;

        return view('registry.index', [
            'registries' => $registries,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('registry.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'data' => 'required',
        ]);

        do {
            $uuid = Str::uuid();
        } while (Registry::find($uuid));

        $registry = Registry::create([
            'id' => $uuid,
            'label' => $request->label,
            'data' => $request->data,
            'access_token' => $request->protectAccess ? Str::random(64) : null,
            'write_token' => $request->protectWrite ? Str::random(64) : null,
        ]);

        if ($request->owner) {
            $team = Team::find($request->owner);
            $user = User::find(auth()->id());
            if ($user->belongsToTeam($team)) {
                $registry->team()->associate($team);
                $registry->save();
            }
        }

        return redirect(route('registry.show', [$registry]));
    }

    /**
     * Display the specified resource.
     *
     * @param  Registry  $registry
     * @return Response
     */
    public function show(Registry $registry)
    {
        return view('registry.show', [
            'registry' => $registry,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Registry  $registry
     * @return Response
     */
    public function edit(Registry $registry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Registry  $registry
     * @return Response
     */
    public function update(Request $request, Registry $registry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Registry  $registry
     * @return Response
     */
    public function destroy(Registry $registry)
    {
        $user = User::find(auth()->id());
        if ($user->allTeams()->contains($registry->team)) {
            $registry->delete();
        }

        return redirect(route('registry.index'));
    }
}
