<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weeks', function (Blueprint $table) {
            $table->bigIncrements('id');
							$table->integer('order');
            $table->decimal('deposited_amount', 8, 2);	
            $table->timestamp('deposit_at');	
            $table->enum('deposit_status', ['yes', 'no'])->default('no');
            $table->unsignedBigInteger('challenge_id');
            $table->foreign('challenge_id')
                    ->references('id')
                    ->on('challenges')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('weeks');
    }
}
