<?php
namespace App\http\Modules\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService
{

    protected UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function login(array $data): bool
    {
        $credentials = [
            "email" => $data["email"],
            "password" => $data["password"]
        ];
        
        $remember = boolval($data["remember"] ?? 0);

        $succes = Auth::attempt($credentials, $remember);

        if ($succes) session()->regenerate();

        return $succes;
    }

    public function insertNewUser(array $data): User
    {
        return $this->repository->insertNewUser($data);
    }

}
?>