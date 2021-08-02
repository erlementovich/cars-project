<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Migration
{
    private $email;
    private $role = 'admin';

    public function __construct()
    {
        $this->email = config('mail.to.admin') ?? 'admin@example.com';
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $adminRole = Role::factory()->create(['name' => $this->role]);

        $userData = [
            'name' => 'Админ',
            'password' => Hash::make('password'),
            'email' => $this->email,
        ];

        $userAdmin = User::factory()->create($userData);

        $userAdmin->roles()->save($adminRole);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        User::where('email', $this->email)->first()->delete();
        Role::where('name', $this->role)->first()->delete();
    }
}
