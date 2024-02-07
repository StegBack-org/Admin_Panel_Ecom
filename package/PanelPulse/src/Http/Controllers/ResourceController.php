<?php

namespace Kartikey\PanelPulse\Http\Controllers;

use App\Http\Controllers\Controller;
use Kartikey\PanelPulse\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::all();
        return view('resources.index', compact('resources'));
    }

    public function create()
    {
        return view('resources.create');
    }

    public function store(Request $request)
    {
        // Validate and store resource
    }

    public function edit(Resource $resource)
    {
        return view('resources.edit', compact('resource'));
    }

    public function update(Request $request, Resource $resource)
    {
        // Validate and update resource
    }

    public function destroy(Resource $resource)
    {
        // Delete resource
    }
}
