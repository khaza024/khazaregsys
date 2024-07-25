<?php

use App\Models\Cpd;
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
        Schema::create('doc_cpds', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignIdFor(Cpd::class);

            $table->string('father_card_identity');
            $table->string('mother_card_identity');
            $table->string('family_card');
            $table->string('birth_certificate');
            $table->string('registration_form')->nullable();

            $table->softDeletes();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doc_cpds');
    }
};
