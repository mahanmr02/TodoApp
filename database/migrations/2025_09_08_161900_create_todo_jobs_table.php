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
        Schema::create('todo_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('todo_category_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('title');
            $table->text('description');
            $table->enum('status',['todo','doing','done']);
            $table->enum('priority', ['low', 'medium', 'high'])->default('low');
            $table->timestamp('due_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todo_jobs');
    }
};
