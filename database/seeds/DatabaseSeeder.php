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

        // Access
//        factory(\Api\Models\Access\AccountModel::class, 10)->create();
//        factory(\Api\Models\Access\RoleModel::class, 5)->create();
//        factory(\Api\Models\Access\UserModel::class, 20)->create();
        factory(\Api\Models\Access\PermissionModel::class, 20)->create();

        //Business
//        factory(\Api\Models\Business\RuleModel::class, 200)->create();

        Model::reguard();

    }
}
