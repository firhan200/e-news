<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('value');
            $table->boolean('isActive');
            $table->boolean('isDeleted');
            $table->timestamps();
        });

        //populate default setting
        DB::table('setting')->insert(
            array(
                'name' => 'pagination',
                'value' => '10',
                'isActive' => 1,
                'isDeleted' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting');
    }
}
