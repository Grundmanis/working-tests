<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizations = Organization::with('user', 'members')->get();
        return view('pages.dashboard.organizations.index', [
            'organizations' => $organizations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('pages.dashboard.organizations.add', [
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrganizationRequest $request)
    {
        DB::transaction(function () use ($request) {
            $organization = new Organization();
            $organization->fill($request->all());
            $organization->user_id = auth()->id();
    
            $organization->save();
    
            if ($request->users) {
                $organization->members()->sync($request->users);
            }
        });
 
        return redirect()
            ->route('organizations.index')
            ->with('success', 'Organization created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization)
    {
        $users = User::all();
        return view('pages.dashboard.organizations.edit', [
            'users' => $users,
            'organization' => $organization,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrganizationRequest $request, Organization $organization)
    {
        DB::transaction(function () use ($request, $organization) {
            $organization->fill([
                'name'=> $request->name
            ])->save();

            if ($request->users) {
                $organization->members()->sync($request->users);
            }
        });
        return redirect()
            ->route('organizations.edit', $organization->id)
            ->with('success', 'Organization updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
