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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->unsignedBigInteger('category_id');
            $table->bigInteger('price');
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->string('created_by');
            $table->text('project_description');
            $table->json('images');
            $table->json('documents');
            $table->boolean('is_featured')->default(0);
            $table->boolean('status')->default(0);

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
        Schema::dropIfExists('campaigns');
    }
};
