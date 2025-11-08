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
       Schema::create('transactions', function (Blueprint $table) {
           $table->id();
           $table->string('nama_pelanggan');
           $table->string('email');
           $table->string('telepon');
           $table->text('alamat');
           $table->decimal('total_harga', 12, 2);
           $table->string('status')->default('pending');
           $table->timestamps();
       });
   }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
