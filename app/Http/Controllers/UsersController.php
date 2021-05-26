<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
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
    public function usersListView()
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
     * @return Application|Factory|View|RedirectResponse
     */
    public function userEditView(string $id)
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
     * Validate request and store user details.
     *
     * @param StoreUserRequest $request
     * @return RedirectResponse
     */
    public function userStore(StoreUserRequest $request)
    {
        if ($request->validated()) {
            try {
                $user = User::whereId($request->userId)->first();
                $this->defineUserFieldsToUpdate($user, $request);
                $user->save();

                return redirect()->route('users_list_view')->with('success', 'User details have been updated.');
            } catch (\Exception $ex) {
                Log::error($ex->getMessage());

                return redirect()->route('users_list_view')->with('status', 'Error. User details have not updated.');
            }
        }
    }

    /**
     * Define the user fields to store or update.
     *
     * @param User $user
     * @param StoreUserRequest $request
     * @return void
     */
    private function defineUserFieldsToUpdate(User $user, StoreUserRequest $request): void
    {
        $user->name = $request->userName;
        $user->email = $request->email;
    }
}
