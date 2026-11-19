
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('stock', 'stock_product');
            $table->renameColumn('price', 'price_product');
            $table->renameColumn('description', 'desc_product');

            $table->unsignedBigInteger('id_category')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('id_category');
            $table->renameColumn('stock_product', 'stock');
            $table->renameColumn('price_product', 'price');
            $table->renameColumn('desc_product', 'description');
        });
    }
};
