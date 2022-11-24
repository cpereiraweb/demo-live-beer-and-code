<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentClassController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('student_class_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.student-class.index');
    }

    public function create()
    {
        abort_if(Gate::denies('student_class_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.student-class.create');
    }

    public function edit(StudentClass $studentClass)
    {
        abort_if(Gate::denies('student_class_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.student-class.edit', compact('studentClass'));
    }

    public function show(StudentClass $studentClass)
    {
        abort_if(Gate::denies('student_class_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.student-class.show', compact('studentClass'));
    }
}
