<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $email
 * @property string $address_street
 * @property string $address_suite
 * @property string $address_city
 * @property string $address_zipcode
 * @property string $address_geo_lat
 * @property string $address_geo_lng
 * @property string $phone
 * @property string $website
 * @property string $company_name
 * @property string $company_catchPhrase
 * @property string $company_bs
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Album[] $albums
 * @property-read int|null $albums_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddressCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddressGeoLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddressGeoLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddressStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddressSuite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddressZipcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCompanyBs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCompanyCatchPhrase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereWebsite($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'address_street',
        'address_suite',
        'address_city',
        'address_zipcode',
        'address_geo_lat',
        'address_geo_lng',
        'phone',
        'website',
        'company_name',
        'company_catchPhrase',
        'company_bs',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * Get the albums for the user.
     */
    public function albums()
    {
        return $this->hasMany(Album::class);
    }
}
