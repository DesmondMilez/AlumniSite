<?php


use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    private $table = 'users';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->insert(
            [
                'index' => 0,
                'email' => 'admin@site.com',
                'name' => 'Admin',
                'surename' => 'Admin',
                'password' => bcrypt('password'),
                'is_admin' => 1,
            ]
        );
    }
}