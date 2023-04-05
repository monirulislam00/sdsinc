<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('phone', 100);
            $table->text('reason')->nullable();
            $table->text('description')->nullable();
            $table->string('company', 50)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('companySize', 50)->nullable();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('services');
            $table->string('affiliate_id')->nullable();
            $table->string('service_type');
            $table->tinyInteger('quality');
            $table->string('earnings')->nullable();
            $table->string('status', 20)->default('pending');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
