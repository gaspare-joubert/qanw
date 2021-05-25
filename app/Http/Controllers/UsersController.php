<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

use function React\Promise\all;

/**
 * Class UsersController
 * @package App\Http\Controllers
 */
class UsersController extends Controller
{
    /**
     * Get all users and return list view.
     *
     * @return Application|Factory|View
     */
    public function users_list_view()
    {
        $userMetadata = new User();
        $data = array();

        // compile the table headers
        $data['headers'][] = 'id';
        $fillables = $userMetadata->getFillable();
        foreach ($fillables as $fillable) {
            $data['headers'][] = $fillable;
        }

        // compile the table rows
        $userItems = User::all(); // returns $this->items
        foreach ($userItems as $userItem) {
            $data['rows'][] = $userItem->getAttributes();
        }

        return view('user/user_list_view', ['data' => $data]);
    }

    /**
     * Get the selected user data and return the user edit view.
     *
     * @param string $id
     * @return Application|Factory|View
     */
    public function user_edit_view(string $id)
    {
        $user = User::whereId($id)->first();

        if ($user) {
            $attributes = $user->getAttributes();

            if ($attributes) {
                $name = $attributes['name'];
                $email = $attributes['email'];

                return view(
                    'user/user_edit_view',
                    [
                        'userId' => $id,
                        'userName' => $name,
                        'email' => $email,
                    ]
                );
            }

            Log::error("Unable to retrieve user $id attributes.");

            return Redirect::back()->with('status', 'Error. User details not found.');
        }

        Log::error("Unable to retrieve user $id details.");

        return Redirect::back()->with('status', 'Error. User details not found.');
    }

    /**
     * FunctionDescription
     *
     * @param StoreUserRequest $StoreUserRequest
     * @param Request $request
     */
    public function userStore(StoreUserRequest $StoreUserRequest, Request $request)
    {
        $test = '';
    }
}
