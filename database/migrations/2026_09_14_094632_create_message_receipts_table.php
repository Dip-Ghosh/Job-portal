<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageReceiptsTable extends Migration
{
    protected $connection = 'pgsql';

    public function up()
    {
       Schema::create('message_receipts', function (Blueprint $table) {
                   $table->foreignUuid('message_id')->constrained('messages')->cascadeOnDelete();
                   $table->foreignUuid('user_id')->constrained('users')->cascadeOnDelete(); // Recipient
                   $table->enum('status', ['SENT', 'DELIVERED', 'READ'])->default('SENT');
                   $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

                   $table->primary(['message_id', 'user_id']);
               });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_receipts');
    }
}
