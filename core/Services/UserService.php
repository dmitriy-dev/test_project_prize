<?php


namespace Core\Services;


use Core\Entities\User;

class UserService
{
    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @return User
     */
    public function create(
        string $name,
        string $email,
        string $password
    ): User
    {
        /** @var User $user */
        $user = User::make();
        $user->name = $name;
        $user->email = $email;
        $user->password = password_hash($password, PASSWORD_BCRYPT);

        try {
            $user->saveOrFail();
        } catch (\Throwable $exception) {
            throw new \DomainException('Error saving user.', $exception->getCode(), $exception);
        }

        return $user;
    }

    /**
     * @param User $user
     * @param string $name
     * @param string $email
     * @param string $status
     * @param string|null $password
     */
    public function update(
        User $user,
        string $name,
        string $email,
        string $password = null
    ): void
    {
        $user->name = $name;
        $user->email = $email;

        if (null !== $password) {
            $user->password = password_hash($password, PASSWORD_BCRYPT);
        }

        try {
            $user->saveOrFail();
            $user->refresh();
        } catch (\Throwable $exception) {
            throw new \DomainException('Error saving user.', $exception->getCode(), $exception);
        }
    }
}
