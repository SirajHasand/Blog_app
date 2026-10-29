<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Convert legacy 'role' column to 'role_id' foreign key for RBAC
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop old role column if exists
            if (Schema::hasColumn('users', 'role')) {
                $table->dropColumn('role');
            }
            // Add role_id as foreign key to roles table
            $table->unsignedBigInteger('role_id')->nullable()->after('email');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop foreign key and role_id column
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
            // Restore old role column
            $table->string('role')->nullable()->after('email');
        });
    }
};
