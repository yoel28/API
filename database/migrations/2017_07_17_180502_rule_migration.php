<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RuleMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rule', function (Blueprint $table) {
            $table->integer('account_id')->unsigned();
            $table->foreign('account_id')
                    ->references('account_id')
                    ->on('account')
                    ->onDelete('cascade');
        });

        Schema::table('rule', function (Blueprint $table) {
            $table->increments('rule_id');

            $table->text("detail")->nullable(true);
            $table->boolean("editable")->default(true);
            $table->string("code",100)->unique();
            $table->boolean("enabled")->default(true);
            $table->text("images")->nullable(true);
            $table->string("title",100);
            $table->boolean("visible")->default(true);
        });

        Schema::table('rule', function (Blueprint $table) {

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
        Schema::dropIfExists('rule');
    }
}
