<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToStudentsTable extends Migration
{
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('student_class_id')->nullable();
            $table->foreign('student_class_id', 'student_class_fk_7666858')->references('id')->on('student_classes');
        });
    }
}
