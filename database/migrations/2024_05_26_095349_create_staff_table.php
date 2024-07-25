<?php

use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignIdFor(Province::class);
            $table->foreignIdFor(Regency::class);
            $table->foreignIdFor(District::class);
            $table->foreignIdFor(Village::class);

            $table->string('nip');
            $table->string('name');
            $table->string('gender');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->string('email')->unique();
            $table->string('telp');
            $table->string('address');

            $table->string('graduate');
            $table->string('position');
            $table->string('image')->nullable();

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
