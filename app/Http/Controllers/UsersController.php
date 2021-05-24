<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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

    // return the edit view for the selected user by id

    /**
     * FunctionDescription
     *
     * @param string $id
     * @return Application|Factory|View
     */
    public function user_edit_view (string $id)
    {
        $test = '';
        return view('user/user_edit_view');
    }
}
