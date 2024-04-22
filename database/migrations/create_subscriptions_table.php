<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->morphs('billable');
            $table->timestamp('paused_at');
            $table->timestamp('ends_at');
            $table->timestamps();
        });
    }
};