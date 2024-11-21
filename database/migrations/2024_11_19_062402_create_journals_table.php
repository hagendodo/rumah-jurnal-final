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

        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('issn_print', 255)->nullable();
            $table->string('issn_online', 255)->nullable();
            $table->text('about_desc');
            $table->text('scope_desc');
            $table->string('journal_url', 255)->nullable();
            $table->string('cover_url', 255)->nullable();
            $table->string('submit_url', 255)->nullable();
            $table->string('guide_url', 255)->nullable();
            $table->string('archive_url', 255)->nullable();
            $table->string('publisher', 255)->nullable();
            $table->string('contact_name', 255)->nullable();
            $table->string('contact_email', 255)->nullable();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('slug', 255);
            $table->boolean('is_active')->default(false);
            $table->boolean('is_image_from_sync')->default(true);
            $table->string('path', 255);
            $table->boolean('is_manual_created')->nullable();
            $table->enum('accreditation', ["NOT_ACCREDITED","SINTA_1","SINTA_2","SINTA_3","SINTA_4","SINTA_5","SINTA_6"]);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journals');
    }
};
