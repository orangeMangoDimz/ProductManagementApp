<?php
namespace App\http\Modules\User;

use App\Models\User;

class UserRepository
{
    public function insertNewUser(array $data): User
    {
        return User::create($data);
    }
}
?>