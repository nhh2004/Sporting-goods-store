<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaypalTable extends Migration
{
    public function up()
    {
        Schema::create('paypal', function (Blueprint $table) {
            $table->id();
            $table->string('payment_id');
            $table->string('payer_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paypal');
    }
}
