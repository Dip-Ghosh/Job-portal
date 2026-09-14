<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_participants', function (Blueprint $table) {
                    $table->foreignUuid('chat_id')->constrained('chats')->cascadeOnDelete();
                    $table->foreignUuid('user_id')->constrained('users')->cascadeOnDelete();
                    $table->enum('role', ['ADMIN', 'MEMBER'])->default('MEMBER');
                    $table->timestamp('joined_at')->useCurrent();

                    $table->primary(['chat_id', 'user_id']);
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_participants');
    }
}
