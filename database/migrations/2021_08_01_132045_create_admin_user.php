<?php

use App\Contracts\Interfaces\RolesRepositoryContract;
use App\Contracts\Interfaces\UsersRepositoryContract;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateAdminUser extends Migration
{
    private $userRepository;
    private $roleRepository;
    private $email;
    private $role = 'admin';

    public function __construct()
    {
        $this->userRepository = App::make(UsersRepositoryContract::class);
        $this->roleRepository = App::make(RolesRepositoryContract::class);
        $this->email = config('mail.to.admin') ?? 'admin@example.com';
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $adminRole = $this->roleRepository->create($this->role);

        $userData = [
            'name' => 'Админ',
            'password' => Hash::make('password'),
            'email' => $this->email,
        ];

        $userAdmin = $this->userRepository->create($userData);

        $userAdmin->roles()->save($adminRole);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->userRepository->deleteByEmail($this->email);
        $this->roleRepository->delete($this->role);
    }
}
