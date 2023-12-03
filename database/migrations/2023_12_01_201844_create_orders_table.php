<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->unsignedBigInteger('product_id'); // Foreign key to the "id" column of the "products" table
            $table->integer('quantity'); // Quantity of products ordered
            //$table->timestamps(); // Created at and updated at timestamps
            $table->timestamp('created_at')->useCurrent(); // Created at timestamps
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate(); // updated at timestamps
            // Define foreign key constraint
            $table->foreign('product_id')->references('id')->on('products')
            ->restrictOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
