<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sku')->nullable();
            $table->float('base_price', 18, 2)->default(0);
            $table->float('price', 18, 2)->default(0);
            $table->bigInteger('qty')->default(0);

            $table->tinyText('description')->nullable();
            $table->longText('long_description')->nullable();

            $table->bigInteger('min_order_qty')->default(0);
            $table->bigInteger('max_order_qty')->default(0);

            $table->float('weight', 8, 2)->default(0);
            $table->float('height', 8, 2)->default(0);
            $table->float('length', 8, 2)->default(0);
            $table->float('width', 8, 2)->default(0);

            $table->boolean('mark_is_new')->default(0);
            $table->boolean('is_published')->default(0);

            $table->json('meta')->nullable();
            $table->timestamps();

            $table
                ->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
