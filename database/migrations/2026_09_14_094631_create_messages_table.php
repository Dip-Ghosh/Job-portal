<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
                    $table->uuid('id')->primary();
                    $table->foreignUuid('chat_id')->constrained('chats')->cascadeOnDelete();
                    $table->foreignUuid('sender_id')->constrained('users')->cascadeOnDelete();
                    $table->enum('message_type', ['TEXT', 'IMAGE', 'VIDEO', 'AUDIO', 'DOCUMENT', 'LOCATION'])->default('TEXT');
                    $table->text('content')->nullable();
                    $table->text('media_url')->nullable();
                    $table->foreignUuid('reply_to_message_id')->nullable()->constrained('messages')->nullOnDelete();
                    $table->timestamps();

                    // Compound index for fast timeline queries within a chat
                    $table->index(['chat_id', 'created_at']);
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
