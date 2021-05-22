<?php

declare(strict_types=1);

namespace App\Classes;

use App\Http\Controllers\ApiController;
use App\Models\Album;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

/**
 * Class AlbumsProcess
 * * Fetch Album data using api call.
 * * Update or insert record.
 * @package App\Classes
 */
class AlbumsProcess extends ApiController
{
    /**
     * @var array Collection of albums returned from Api call.
     */
    private $albumsApi = array();

    /**
     * @const Error message when the album data can not be processed.
     */
    protected const ERROR_ALBUMS_DATA = "Unable to process Albums data.";

    public function __construct()
    {
        if (!($this->getAlbumsApi())) {
            self::$outputMessage = self::ERROR_ALBUMS_DATA;
        } else {
            $this->processAlbums();
        }
    }

    /**
     * Api call to get albums data.
     *
     * @return bool
     */
    protected function getAlbumsApi(): bool
    {
        $client = new Client();
        try {
            $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/albums');
            $this->albumsApi = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

            return true;
        } catch (GuzzleException $ex) {
            Log::error($ex->getMessage());
        } catch (\JsonException $e) {
            Log::error($e->getMessage());
        }

        return false;
    }

    /**
     * If the album record exists in the database, update the record.
     * If the album record does not exist in the database, insert the record.
     *
     * @return void
     */
    protected function processAlbums(): void
    {
        foreach ($this->albumsApi as $albumApi) {
            $album = Album::whereId($albumApi['id'])->first();

            if ($album) {
                $this->updateAlbum($album, $albumApi);
            } else {
                $this->storeAlbum($albumApi);
            }
        }
    }

    /**
     * Update the database record.
     *
     * @param Album $album
     * @param array $albumApi
     * @return void
     */
    protected function updateAlbum(Album $album, array $albumApi): void
    {
        try {
            $this->defineFieldsAlbum($album, $albumApi);
            $album->save();
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            self::$outputMessage = self::ERROR_ALBUMS_DATA;
        }
    }

    /**
     * Insert the database record.
     *
     * @param array $albumApi
     * @return void
     */
    protected function storeAlbum(array $albumApi): void
    {
        try {
            $album = new Album();
            $this->defineFieldsAlbum($album, $albumApi);
            $album->save();
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            self::$outputMessage = self::ERROR_ALBUMS_DATA;
        }
    }

    /**
     * Define the album fields to store or update.
     *
     * @param Album $album
     * @param array $albumApi
     * @return void
     */
    protected function defineFieldsAlbum(Album $album, array $albumApi): void
    {
        $album->user_id = $albumApi['userId'];
        $album->title = $albumApi['title'];
    }
}
