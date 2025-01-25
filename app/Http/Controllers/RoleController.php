<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'role' => 'required|integer',
            'permissions' => 'required|array', // Must be an array
            'permissions.*' => 'string', // Each permission must be a string
        ]);

        // Check if the role already exists
        $role = Role::where('role_id', $validated['role'])->first();

        if ($role) {
            // Update existing role
            $role->update([
                'permissions' => implode(',', $validated['permissions']), // Convert array to comma-separated string
            ]);

            return redirect()->back()->with('success', 'Role permissions updated successfully!');
        } else {
            // Create new role
            Role::create([
                'role_id' => $validated['role'],
                'permissions' => implode(',', $validated['permissions']), // Convert array to comma-separated string
            ]);

            return redirect()->back()->with('success', 'Role and permissions saved successfully!');
        }
    }

}