<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string("product_name");
            $table->integer("qty");
            $table->decimal("price", 8, 2);
            $table->decimal("total", 8, 2);
            $table->boolean("paid")->default(0);
            $table->boolean("delivered")->default(0);
            $table->timestamps();
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
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
};
