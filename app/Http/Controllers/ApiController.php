<?php

namespace App\Http\Controllers;

use App\Classes\AlbumsProcess;
use App\Classes\UsersProcess;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Psr\Http\Message\StreamInterface;

use function Psy\debug;

/**
 * Fetch data from test API.
 * * Fetch user data & store in db table.
 * * Fetch album data & store in db table.
 * * Return view api.
 *
 * @package App\Http\Controllers
 */
class ApiController extends Controller
{
    /**
     * @const Success message when the user and album data can be processed.
     */
    protected const SUCCESS = 'All user and album records have been fetched and the database updated.';

    /**
     * @var string Default output message.
     */
    protected static $outputMessage = self::SUCCESS;

    public function __invoke()
    {
        $usersProcess = new UsersProcess();
        $albumsProcess = new AlbumsProcess();

        return $this->returnView();
    }

    protected function returnView()
    {
        return view(
            'api/api',
            [
                'outputMessage' => self::$outputMessage
            ]
        );
    }
}




