<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->string('referencia', 255);
            $table->integer('precio');
            $table->integer('peso');
            $table->string('categoria', 255);
            $table->integer('stock');
            $table->integer('num_ventas')->nullable();
            $table->foreignId('category_id')->constrained('category')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreignId('table_id')->constrained('table')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('product');
    }
}