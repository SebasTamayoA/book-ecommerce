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
        Schema::table('products', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('name');
        });

        // Proporcionar un valor predeterminado para slugs existentes
        DB::table('products')->update(['slug' => 'default_slug']);

        // Ahora, genera los slugs para registros existentes
        $products = \App\Models\Product::all();
        foreach ($products as $product) {
            $product->slug = \Illuminate\Support\Str::slug($product->name);
            $product->save();
        }

        // Cambia la columna a "not null"
        Schema::table('products', function (Blueprint $table) {
            $table->string('slug')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
