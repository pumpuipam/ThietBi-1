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
            $table->string('name');
            $table->text('description');
            $table->string('short_description')->nullable();
            $table->integer('cate_id');
            $table->string('quantity')->nullable();
            $table->string('price');
            $table->string('discount')->nullable();
            $table->date('date')->nullable();
            $table->integer("status_product")->nullable()->comment('Còn hàng, hết hàng');
            $table->softDeletes();
            $table->integer("status");
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
