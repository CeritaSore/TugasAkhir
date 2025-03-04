<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrganizationRole;

class OrganizationRoleController extends Controller
{
    public function index()
    {
        $role = OrganizationRole::all();
        return response()->json($role);
    }
    public function storeRole(Request $request)
    {
        $validation = $request->validate([
            'role' => 'required',
        ]);
        $role = OrganizationRole::create($validation);
        $data = [
            'status' => 'success',
            'message' => 'Role berhasil ditambahkan',
            'data' => $role
        ];
        return response()->json($data);
    }
    public function updateRole(Request $request, $id) {
        $role = OrganizationRole::find($id);
        if ($role) {
            $validation = $request->validate([
                'role' => 'required',
            ]);
            $role->role = $validation['role'];
            $role->save();
            $data = [
                'status' => 'success',
                'message' => 'Role berhasil diubah',
                'data' => $role
            ];
            return response()->json($data);
        } else {
            $data = [
                'status' => 'error',
                'message' => 'Role tidak ditemukan',
            ];
            return response()->json($data, 404);
        }   
    }
    public function deleteRole($id)
    {
        $deleteRole = OrganizationRole::find($id)->delete();
        $data = [
            'status' => 'success',
            'message' => 'Role berhasil dihapus',
        ];
        return response()->json($data);
    }
}
