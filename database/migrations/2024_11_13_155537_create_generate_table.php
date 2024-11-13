<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenerateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generate', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('company_name'); // Company name
            $table->string('agent_name'); // Agent name
            $table->decimal('price'); // Price
            $table->decimal('admin_share'); // Admin share
            $table->decimal('company_share'); // Company share
            $table->decimal('agent_share'); // Agent share
            $table->decimal('user_share'); // User share
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('generate');
    }
}
