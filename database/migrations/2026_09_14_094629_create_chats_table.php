<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('chats', function (Blueprint $table) {
                  $table->uuid('id')->primary();
                  $table->enum('chat_type', ['DIRECT', 'GROUP'])->default('DIRECT');
                  $table->string('group_name')->nullable();
                  $table->text('group_avatar_url')->nullable();
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
        Schema::dropIfExists('chats');
    }
}
