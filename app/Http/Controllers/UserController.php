<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use App\Models\Group;

class UserController extends Controller
{


    public function index()
    {
        $groups = Group::all();
        $users = Users::withTrashed()->get();
        return view('clients.user', compact('groups', 'users'));

    }

    public function delete($id)
    {
        $count = Users::destroy($id);

        return back()->with("msg", "Xoá bản ghi thành công");
    }

    public function restore($id)
    {
        $user = Users::onlyTrashed()->where('id', $id)->first();
        if ($user) {
            $user->restore();
            return back()->with("msg", "Xoá bản ghi thành công");
        }else {
            abort(404);
        }
    }

    public function forceDelete($id)
    {
        $user = Users::onlyTrashed()->where('id', $id)->first();
        if ($user) {
            $user->forceDelete();
            return back()->with("msg", "Xoá bản ghi thành công");
        }else {
            abort(404);
        }
    }

}
