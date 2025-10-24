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
        Schema::table('users', function (Blueprint $table) {
            $table->string('fullname')->nullable()->after('name');
            $table->date('birthdate')->nullable()->after('fullname');
            $table->string('phone')->nullable()->after('birthdate');
            $table->text('address')->nullable()->after('phone');
            $table->string('subdistrict')->nullable()->after('address');
            $table->string('district')->nullable()->after('subdistrict');
            $table->string('city_regency')->nullable()->after('district');
            $table->string('province')->nullable()->after('city_regency');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['fullname', 'birthdate', 'phone', 'address', 'subdistrict', 'district', 'city_regency', 'province']);
        });
    }
};
