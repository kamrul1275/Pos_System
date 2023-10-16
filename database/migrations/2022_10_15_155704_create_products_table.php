<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->text('product_description');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->date('paymatent_date');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null')->onUpdate('cascade');

            $table->integer('price');  
            $table->integer('quantity'); 

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('modified_by')->nullable();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');

            $table->foreign('modified_by')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');

            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
