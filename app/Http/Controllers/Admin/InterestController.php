<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Interest;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InterestController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('interest_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.interest.index');
    }

    public function create()
    {
        abort_if(Gate::denies('interest_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.interest.create');
    }

    public function edit(Interest $interest)
    {
        abort_if(Gate::denies('interest_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.interest.edit', compact('interest'));
    }

    public function show(Interest $interest)
    {
        abort_if(Gate::denies('interest_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.interest.show', compact('interest'));
    }
}
