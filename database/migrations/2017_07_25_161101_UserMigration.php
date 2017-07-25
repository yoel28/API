<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserMigration extends \Api\Models\Utils\BaseMigration
{
    protected $table = 'user';

    public function up(){
        Schema::create($this->table, function (Blueprint $table) {

            $table->increments('user_id');

            $table->string('email',150)->unique();
            $table->string('username',50)->unique();

            $table->string('name',100);
            $table->string('password');

            $table->boolean('accountLocked')->default(true);

            $table->string('remember_token')->nullable();
            $table->string('phone',50)->nullable();

            $table->json('preferences')->default('{}');

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
