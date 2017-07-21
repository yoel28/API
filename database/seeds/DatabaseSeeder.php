<?php

use Illuminate\Database\Seeder;
use \Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
//        factory(\Api\Models\Access\UserModel::class, 10)->create();
        factory(\Api\Models\Access\AccountModel::class, 10)->create();
        factory(\Api\Models\Business\RuleModel::class, 200)->create();
        Model::reguard();

        // $this->call(UsersTableSeeder::class);
    }
}
