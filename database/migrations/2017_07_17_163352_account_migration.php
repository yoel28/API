<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Api\Models\Utils\BaseMigration;

class AccountMigration extends BaseMigration
{
    protected $table = 'account';

    public function up(){
        Schema::create($this->table, function (Blueprint $table) {

            $table->increments('account_id');

            $table->string("address",150);
            $table->string("email",100);
            $table->string("hostname",150);
            $table->string("name",100)->unique();

            $table->integer("max_user_count")->default(1);

            $table->string("contact",100)->nullable(true);
            $table->string("phone",20)->nullable(true);
            $table->string("url",150)->nullable(true);

            $table->text("favicon")->nullable(true);
            $table->text("icon")->nullable(true);
            $table->text("message")->nullable(true);

            $table->json("preferences")->nullable(true);

        });
        $this->baseMigration();
        $this->auditMigration();
    }

    public function down(){
        Schema::dropIfExists($this->table);
    }
}
