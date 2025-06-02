<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up(): void
        {
            Schema::create('transactions', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->unsignedBigInteger('customer_id');
                $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
                $table->string('transaction_code')->unique();
                $table->date('date');
                $table->integer('total');
                $table->string('status')->default('Diproses');
                $table->string('payment_type');
                $table->text('shipping_address')->nullable();  // kolom baru disisipkan di sini
                $table->string('recipient_name')->nullable();
                $table->timestamps();
            });
        }


    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
}
