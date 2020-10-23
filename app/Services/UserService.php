<?php

namespace App\Services;

use DB;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function create(array $data)
    {
        $user = User::create([
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);

        $this->addRole('student', $user);
        $this->addDirection($data, $user);
        $this->saveDocumentNumber($data, $user);

        return $user;
    }

    /**
     * Добавление роли пользователю
     *
     * @param string $role
     * @param object $user
     */
    private function addRole($role, $user)
    {
        // Находим ID роли по кодовому названию
        $role_id = Role::where('slug', $role)->first()->id;

        DB::table('role_user')
            ->insert([
                'role_id' => $role_id,
                'user_id' => $user->id,
            ]);
    }

    /**
     * Добавление направления обучения пользователю
     *
     * @param array $data
     * @param object $user
     */
    private function addDirection($data, $user)
    {
        DB::table('direction_user')
            ->insert([
                'direction_id' => $data['direction'],
                'user_id' => $user->id,
            ]);
    }

    /**
     * Сохранение номера документа (диплом или аттестат)
     *
     * @param array $data
     * @param object $user
     */
    private function saveDocumentNumber($data, $user)
    {
        DB::table('documents')
            ->insert([
                'user_id' => $user->id,
                'doc_number' => $data['document'],
            ]);
    }
}
