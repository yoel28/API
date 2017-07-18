<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AccountMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {

            $table->string("address",150);
            $table->string("contact",100)->nullable(true);
            $table->string("email",100);
            $table->text("favicon")->nullable(true);
            $table->string("hostname",150);
            $table->text("icon")->nullable(true);
            $table->integer("max_user_count")->default(1);
            $table->text("message")->nullable(true);
            $table->string("name",100);
            $table->string("phone",20)->nullable(true);
            $table->string("url",150)->nullable(true);
            $table->json("preferences")->nullable(true);
        });

        Schema::table('account', function (Blueprint $table) {
            $table->increments('account_id');

            $table->text("detail")->nullable(true);
            $table->boolean("editable")->default(true);
            $table->string("code",100)->unique();
            $table->boolean("enabled")->default(true);
            $table->text("images")->nullable(true);
            $table->string("title",100);
            $table->boolean("visible")->default(true);
        });

        Schema::table('account', function (Blueprint $table) {

            $table->text("ip")->nullable(true);
            $table->text("user_agent")->nullable(true);

            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account');
    }
}
