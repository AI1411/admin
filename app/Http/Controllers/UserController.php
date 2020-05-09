<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\Company;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->search_name;

        $users = User::with([
            'skills',
            'work',
        ])->searchName()->get();

        return view('users.index', compact('users', 'keyword'));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $works = Work::all()->pluck('name', 'id');

        return view('users.edit', compact('user', 'works'));
    }

    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->description = $request->description;
//        $user->role_id = $request->role_id;
//        $user->company_id = $request->company_id;
        $user->work_id = $request->work_id;
        $user->save();

        return redirect()->route('users.index')->with('success', 'プロフィールを更新しました');
    }

    public function csvDownload(Request $request)
    {
        $file_name = 'ユーザ一覧' . '_' . time() . '.xlsx';

        return Excel::download(new UsersExport, $file_name);
    }
}
