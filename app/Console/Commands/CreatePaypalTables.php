<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class CreatePaypalTables extends Command
{
    protected $signature = 'paypal:create-tables';

    protected $description = 'Create PayPal related database tables';

    public function handle()
    {
        // Kiểm tra xem các bảng cần thiết đã tồn tại chưa
        if (Schema::hasTable('paypal_transactions') && Schema::hasTable('paypal_webhooks')) {
            $this->info('PayPal tables already exist.');
            return;
        }

        // Tạo bảng paypal_transactions
        if (!Schema::hasTable('paypal_transactions')) {
            Schema::create('paypal_transactions', function ($table) {
                $table->increments('id');
                $table->string('payment_id');
                $table->string('payer_id');
                $table->string('token');
                $table->decimal('amount', 10, 2);
                $table->string('currency');
                $table->string('status');
                $table->timestamps();
            });

            $this->info('Created paypal_transactions table.');
        }

        // Tạo bảng paypal_webhooks
        if (!Schema::hasTable('paypal_webhooks')) {
            Schema::create('paypal_webhooks', function ($table) {
                $table->increments('id');
                $table->string('event_type');
                $table->text('payload');
                $table->timestamps();
            });

            $this->info('Created paypal_webhooks table.');
        }
    }
}
