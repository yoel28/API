<?php
namespace Api\Models\Utils;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BaseMigration extends Migration
{
    protected $table;

    public function up()
    {
        if($this->table){
            $this->baseMigration();
            $this->auditMigration();
        }
    }

    public function down()
    {
        if($this->table){

        }
    }

    public function baseMigration(){
        Schema::table($this->table, function (Blueprint $table) {

            $table->string("code",100)->unique();
            $table->string("title",100);

            $table->text("detail")->nullable(true);
            $table->text("images")->nullable(true);

            $table->boolean("editable")->default(true);
            $table->boolean("enabled")->default(true);
            $table->boolean("visible")->default(true);

        });
    }

    public function auditMigration(){
        Schema::table($this->table, function (Blueprint $table) {

            $table->text("ip")->nullable(true);
            $table->text("user_agent")->nullable(true);

            $table->timestamps();
            $table->softDeletes();

        });
    }

}
