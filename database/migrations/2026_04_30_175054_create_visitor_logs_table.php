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
        Schema::create('visitor_logs', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('user_id')->nullable();
            $table->ipAddress('ip_address')->index();
            $table->unsignedSmallInteger('status_code')->nullable()->index();
            $table->string('url')->nullable()->index();
            $table->string('referer')->nullable()->index();
            $table->string('method')->nullable()->index();
            $table->integer('response_time')->nullable();
            $table->boolean('is_bot')->default(false);
            $table->timestamp('visited_at')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitor_logs');
    }
};
