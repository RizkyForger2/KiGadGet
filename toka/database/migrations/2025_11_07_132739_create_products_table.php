<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
   {
       Schema::create('products', function (Blueprint $table) {
           $table->id();
           $table->string('nama_produk');
           $table->string('merek');
           $table->text('deskripsi');
           $table->decimal('harga', 12, 2);
           $table->integer('stok');
           $table->string('gambar')->nullable();
           $table->string('kategori'); // DSLR, Mirrorless, Compact, dll
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
