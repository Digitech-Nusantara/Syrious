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
			$table->string('code')->unique();
			$table->string('name');
			$table->string('slug');
			$table->integer('price');
			$table->integer('size');
			$table->string('color');
			$table->string('in_stock');
			$table->string('photo'); // Max size of photo file is 10 mb or 10485760 kb
			$table->text('description');
			$table->foreignId('subcategory_id')->constrained(
				table: 'subcategories', indexName: 'products_subcategory_id'
			);
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
