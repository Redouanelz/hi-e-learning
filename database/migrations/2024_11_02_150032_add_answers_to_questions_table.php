<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAnswersToQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->string('answer_one')->nullable()->after('question_text');
            $table->string('answer_two')->nullable()->after('answer_one');
            $table->string('answer_three')->nullable()->after('answer_two');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn(['answer_one', 'answer_two', 'answer_three']);
        });
    }
}
