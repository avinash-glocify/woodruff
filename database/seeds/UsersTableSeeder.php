<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
          [
            'name'     => 'admin',
            'email'    => 'admin@mail.com',
            'password' => \Hash::make('12345678'),
            'role_id'  => 1,
          ],
          [
            'name'     => 'avinash',
            'email'    => 'avinash@mail.com',
            'password' => \Hash::make('12345678'),
            'role_id'  => 1,
          ],
        ];

        foreach ($users as $key => $user) {
          User::updateOrCreate(['email' => $user['email']],$user);
        }
    }
}
