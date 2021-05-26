<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Album;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use function React\Promise\all;

/**
 * Class AlbumsController
 * @package App\Http\Controllers
 */
class AlbumsController extends Controller
{
    /**
     * Get all albums and return list view.
     */
    public function albumsListView()
    {
        $data = array();

        // compile the table headers
        $data['headers'][] = 'id';
        $data['headers'][] = 'title';

        $albums = DB::table('albums')
            ->select('id', 'title')
            ->paginate(15);

        if ($albums) {
            return view('album/album_list_view', ['data' => $data, 'albums' => $albums]);
        }

        Log::error("Unable to retrieve albums.");

        return Redirect::back()->with('status', 'Error. Unable to retrieve albums.');
    }
}
