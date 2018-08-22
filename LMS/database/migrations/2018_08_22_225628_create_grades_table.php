<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->increments('id');
	        $table->integer('a');
	        $table->integer('amin');
	        $table->integer('aplus');
	        $table->integer('b');
	        $table->integer('bmin');
	        $table->integer('bplus');
	        $table->integer('c');
	        $table->integer('cmin');
	        $table->integer('cplus');
	        $table->integer('d');
	        $table->integer('dmin');
	        $table->integer('dplus');
	        $table->integer('e');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grades');
    }
}
