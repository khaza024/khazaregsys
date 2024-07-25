<?php

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
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
        Schema::create('cpds', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignIdFor(Province::class);
            $table->foreignIdFor(Regency::class);
            $table->foreignIdFor(District::class);
            $table->foreignIdFor(Village::class);

            $table->string('name');
            $table->string('gender');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->string('tk');
            $table->boolean('abk')->default(false);
            $table->string('note_abk')->nullable();
            $table->string('year');

            $table->string('father');
            $table->string('mother');
            $table->string('email')->unique();
            $table->string('telp');
            $table->string('address');

            $table->boolean('accepted')->default(false);

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cpds');
    }
};
