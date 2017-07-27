<?php

use Api\Models\Utils\BaseMigration;
use Illuminate\Database\Schema\Blueprint;


class RoleMigration extends BaseMigration
{
    protected $table = 'role';
    public function up(){
        //TODO: ADD relationship role-user
        //TODO: ADD relationship role-permissions
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
        });

        $this->baseMigration();
        $this->auditMigration();

        Schema::table($this->table, function (Blueprint $table) {
            $table->unique('title');
        });
    }

}
