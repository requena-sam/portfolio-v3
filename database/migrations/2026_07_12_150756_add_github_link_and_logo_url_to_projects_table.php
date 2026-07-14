<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('logo_url')->nullable()->after('icon');
            $table->string('github_link')->nullable()->after('link');
            $table->string('link')->nullable()->change();
        });

        // Projects created before this migration used '#' as a placeholder for
        // "no real link yet" — now that the field is genuinely optional, represent
        // that as null instead so the "Voir le projet" button hides correctly.
        DB::table('projects')->where('link', '#')->update(['link' => null]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('projects')->whereNull('link')->update(['link' => '#']);

        Schema::table('projects', function (Blueprint $table) {
            $table->string('link')->nullable(false)->change();
            $table->dropColumn(['logo_url', 'github_link']);
        });
    }
};
