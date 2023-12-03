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
            $table->id(); // Auto-incremental primary key
            $table->string('name'); // Product name 
            $table->decimal('price', 10, 2); // Product price with 2 decimal places
            $table->text('description'); // Product description
            // $table->timestamps(); // Created at and updated at timestamps
            $table->timestamp('created_at')->useCurrent(); // Created at timestamps
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate(); // Updated at timestamps
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
