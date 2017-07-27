<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Api\Models\Utils\BaseMigration;

class PermissionRoleMigration extends BaseMigration
{
    protected $table = 'permission_role';

    public function up(){

        Schema::create($this->table, function (Blueprint $table) {

            $table->integer('permission_id')->unsigned();
            $table->foreign('permission_id')
                ->references('id')
                ->on('permission')
                ->onDelete('cascade');

            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')
                ->references('id')
                ->on('role')
                ->onDelete('cascade');

            $table->primary(['permission_id','role_id']);

        });
        $this->auditMigration();
    }

}
