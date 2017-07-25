<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Api\Models\Utils\BaseMigration;


class RuleMigration extends BaseMigration
{
    protected $table = 'rule';
    public function up(){
        Schema::create($this->table, function (Blueprint $table) {

            $table->increments('rule_id');
            $table->integer('account_id')->unsigned();

            $table->foreign('account_id')
                    ->references('account_id')
                    ->on('account')
                    ->onDelete('cascade');

        });
        $this->baseMigration();
        $this->auditMigration();
    }
}
