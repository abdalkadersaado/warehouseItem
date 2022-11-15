<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('commercial_name');
            $table->string('code');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('warehouse_id');

            $table->integer('qty')->nullable();
            $table->integer('price')->nullable();

            $table->foreign('category_id')
                ->references('id')
                ->on('item_categroys')
                ->onUpdate('cascade')
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
        Schema::dropIfExists('items');
    }
}
