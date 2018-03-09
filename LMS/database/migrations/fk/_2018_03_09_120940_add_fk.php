<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lecturers', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('position_id')->references('id')->on('positions');
        });

        Schema::table('students', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('quizzes', function (Blueprint $table) {
            $table->foreign('lecturer_id')->references('id')->on('lecturers');
            $table->foreign('course_id')->references('id')->on('courses');
        });

        Schema::table('assignments', function (Blueprint $table) {
            $table->foreign('lecturer_id')->references('id')->on('lecturers');
            $table->foreign('course_id')->references('id')->on('courses');
        });

        Schema::table('forums', function (Blueprint $table) {
            $table->foreign('course_id')->references('id')->on('courses');
        });

        Schema::table('lecturers', function (Blueprint $table) {
            $table->foreign('question_id')->references('id')->on('questions');
        });

        Schema::table('courses_students', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('course_id')->references('id')->on('courses');
        });

        Schema::table('lecturers_courses', function (Blueprint $table) {
            $table->foreign('lecturer_id')->references('id')->on('lecturers');
            $table->foreign('course_id')->references('id')->on('courses');
        });

        Schema::table('students_quizzes', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('quiz_id')->references('id')->on('quizzes');
        });

        Schema::table('assignments_students', function (Blueprint $table) {
            $table->foreign('assignment_id')->references('id')->on('assignments');
            $table->foreign('student_id')->references('id')->on('students');
        });

        Schema::table('questions_students', function (Blueprint $table) {
            $table->foreign('questions_id')->references('id')->on('questions');
            $table->foreign('student_id')->references('id')->on('students');
        });

        Schema::table('questions_lecturers', function (Blueprint $table) {
            $table->foreign('lecturer_id')->references('id')->on('lecturers');
            $table->foreign('question_id')->references('id')->on('questions');
        });

        Schema::table('answers_students', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('answer_id')->references('id')->on('answers');
        });

        Schema::table('answers_lecturers', function (Blueprint $table) {
            $table->foreign('lecturer_id')->references('id')->on('lecturers');
            $table->foreign('answer_id')->references('id')->on('answers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
