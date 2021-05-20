<?php


namespace Core\Entities;


use Core\Entities\UserBalance\UserBalance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class User
 * @package Core\Entities
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $token
 * @property string $password
 * @property UserBalance $balance
 */
class User extends Model
{
    /**
     * @return HasOne
     */
    public function balance(): HasOne
    {
        return $this->hasOne(UserBalance::class);
    }

    /**
     * @param string $password
     * @return bool
     */
    public function isCorrectPassword(string $password): bool
    {
        return password_verify($password, $this->password);
    }
}