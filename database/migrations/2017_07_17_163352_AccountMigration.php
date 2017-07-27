<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Api\Models\Utils\BaseMigration;

class AccountMigration extends BaseMigration
{
    protected $table = 'account';

    public function up(){
        Schema::create($this->table, function (Blueprint $table) {

            $table->increments('id');

            $table->string("address",150);
            $table->string("email",100);
            $table->string("hostname",150);
            $table->string("name",100)->unique();

            $table->integer("max_user_count")->default(1);

            $table->string("contact",150)->nullable();
            $table->string("phone",50)->nullable();
            $table->string("url",150)->nullable();

            $table->text("favicon")->nullable();
            $table->text("icon")->nullable();
            $table->text("message")->nullable();

            $table->json("preferences")->default('{}');

        });
        $this->baseMigration();
        $this->auditMigration();
    }
}
