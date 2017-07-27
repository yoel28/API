<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Api\Models\Utils\BaseMigration;

class PermissionMigration extends BaseMigration
{
    protected $table = 'permission';
    public function up(){

        Schema::create($this->table, function (Blueprint $table) {

            $table->increments('id');

            $table->string('module',100);
            $table->string('controller',100);
            $table->string('action',100);

            $table->unique(['module','controller','action']);

        });

        $this->baseMigration();
        $this->auditMigration();

        Schema::table($this->table, function (Blueprint $table) {
            $table->unique('title');
        });

    }
}
