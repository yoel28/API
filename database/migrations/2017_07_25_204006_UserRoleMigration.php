<?php

use Api\Models\Utils\BaseMigration;
use Illuminate\Database\Schema\Blueprint;


class UserRoleMigration extends BaseMigration
{
    protected $table = 'user_role';

    public function up(){

        Schema::create($this->table, function (Blueprint $table) {

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('user')
                ->onDelete('cascade');

            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')
                ->references('id')
                ->on('role')
                ->onDelete('cascade');

            $table->primary(['user_id','role_id']);

        });
        $this->auditMigration();
    }

}
