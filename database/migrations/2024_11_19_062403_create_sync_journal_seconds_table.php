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
        Schema::disableForeignKeyConstraints();

        Schema::create('sync_journal_seconds', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('cover', 255)->nullable();
            $table->string('issn_print', 255)->nullable();
            $table->string('issn_online', 255)->nullable();
            $table->string('publisher', 255)->nullable();
            $table->string('contact_email', 255)->nullable();
            $table->string('contact_name', 255)->nullable();
            $table->text('description')->nullable();
            $table->text('aims_and_scope')->nullable();
            $table->string('archive_url', 255)->nullable();
            $table->string('submit_url', 255)->nullable();
            $table->string('author_guide_url', 255)->nullable();
            $table->string('path', 255);
            $table->string('base_url', 255)->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sync_journal_seconds');
    }
};
