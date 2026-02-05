<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * run the migrations
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
        $table->id();
        $table->foreignId('post_id')->constrained()->onDelete('cascade'); //relationship to post
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); //link to user
        $table->text('body');
        $table->timestamps();
        });
    }

    /**
     * reverse the migrations
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
