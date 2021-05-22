<?php

declare(strict_types=1);

namespace App\Classes;

use App\Http\Controllers\ApiController;
use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

/**
 * Class UsersProcess
 * * Fetch User data using api call.
 * * Update or insert record.
 * @package App\Classes
 */
class UsersProcess extends ApiController
{
    /**
     * @var array Collection of users returned from Api call.
     */
    private $usersApi = array();

    /**
     * @const Error message when the user data can not be processed.
     */
    protected const ERROR_USERS_DATA = "Unable to process Users data.";

    public function __construct()
    {
        if (!($this->getUsersApi())) {
            self::$outputMessage = self::ERROR_USERS_DATA;
        } else {
            $this->processUsers();
        }
    }

    /**
     * Api call to get users data.
     *
     * @return bool
     */
    protected function getUsersApi(): bool
    {
        $client = new Client();
        try {
            $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/users');
            $this->usersApi = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

            return true;
        } catch (GuzzleException $ex) {
            Log::error($ex->getMessage());
        } catch (\JsonException $e) {
            Log::error($e->getMessage());
        }

        return false;
    }

    /**
     * If the user record exists in the database, update the record.
     * If the user record does not exist in the database, insert the record.
     *
     * @return void
     */
    protected function processUsers(): void
    {
        foreach ($this->usersApi as $userApi) {
            $user = User::whereId($userApi['id'])->first();

            if ($user) {
                $this->updateUser($user, $userApi);
            } else {
                $this->storeUser($userApi);
            }
        }
    }

    /**
     * Update the database record.
     *
     * @param User $user
     * @param array $userApi
     * @return void
     */
    protected function updateUser(User $user, array $userApi): void
    {
        try {
            $this->defineFieldsUser($user, $userApi);
            $user->save();
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            self::$outputMessage = self::ERROR_USERS_DATA;
        }
    }

    /**
     * Insert the database record.
     *
     * @param array $userApi
     * @return void
     */
    protected function storeUser(array $userApi): void
    {
        try {
            $user = new User();
            $this->defineFieldsUser($user, $userApi);
            $user->save();
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            self::$outputMessage = self::ERROR_USERS_DATA;
        }
    }

    /**
     * Define the user fields to store or update.
     *
     * @param User $user
     * @param array $userApi
     * @return void
     */
    protected function defineFieldsUser(User $user, array $userApi): void
    {
        $user->name = $userApi['name'];
        $user->username = $userApi['username'];
        $user->email = $userApi['email'];
        $user->address_street = $userApi['address']['street'];
        $user->address_suite = $userApi['address']['suite'];
        $user->address_city = $userApi['address']['city'];
        $user->address_zipcode = $userApi['address']['zipcode'];
        $user->address_geo_lat = $userApi['address']['geo']['lat'];
        $user->address_geo_lng = $userApi['address']['geo']['lng'];
        $user->phone = $userApi['phone'];
        $user->website = $userApi['website'];
        $user->company_name = $userApi['company']['name'];
        $user->company_catchPhrase = $userApi['company']['catchPhrase'];
        $user->company_bs = $userApi['company']['bs'];
    }
}
