<?php

namespace Modules\User;

use Illuminate\Routing\Controller;
use Modules\User\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        $formattedUsers = $users->mapWithKeys(function ($user) {
            return [
                (string) $user->id => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'enabled' => $user->enabled,
                ],
            ];
        });

        return response()->json($formattedUsers);
    }

    public function disable(User $user)
    {
        $user->enabled = false;
        $user->save();

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'enabled' => $user->enabled,
        ]);
    }

    public function enable(User $user)
    {
        $user->enabled = true;
        $user->save();

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'enabled' => $user->enabled,
        ]);
    }
}
