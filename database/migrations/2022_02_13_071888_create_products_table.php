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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('status')->nullable();
            $table->string('thumbnail')->nullable();
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('brand_series_id');
            $table->unsignedBigInteger('price');
            $table->text('summary');
            $table->unsignedBigInteger('primary_category_id');
            $table->unsignedBigInteger('secondary_category_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('primary_category_id')->references('id')->on('product_primary_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('secondary_category_id')->references('id')->on('product_secondary_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('brand_series_id')->references('id')->on('brand_series')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('attribute_value_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('product_attribute_id');
            $table->unsignedBigInteger('attribute_value_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product_attribute_id')->references('id')->on('product_attributes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('attribute_value_id')->references('id')->on('attribute_values')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('product_values');
        Schema::dropIfExists('products');
    }
}
