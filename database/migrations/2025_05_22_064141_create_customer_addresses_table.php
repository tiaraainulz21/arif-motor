<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->string('recipient_name');
            $table->string('phone');
            $table->text('address');
            $table->boolean('is_default')->default(false); // untuk penanda alamat utama
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customer_addresses');
    }
}
