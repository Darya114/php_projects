<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        return response()->json(User::all(), 200, ['Content-Type' => 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }

    public function store(Request $request) {
        $user = User::create($request->all());
        return response()->json($user, 201, [], JSON_UNESCAPED_UNICODE);
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json($user, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function destroy($id) {
        User::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
