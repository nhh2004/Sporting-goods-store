<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCTHDSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('c_t_h_d_s', function (Blueprint $table) {
            $table->decimal('unit_price', 8, 2)->after('amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('c_t_h_d_s', function (Blueprint $table) {
            $table->dropColumn('unit_price');
        });
    }
}