<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['attachment_id']);
            $table->foreignId('attachment_id')->change()->nullable()->constrained('attachments')->nullOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
