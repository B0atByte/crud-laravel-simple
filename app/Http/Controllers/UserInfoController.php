<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class UserInfoController extends Controller
{
    public function index(Request $request)
    {
        // รับค่าค้นหาจาก query string
        $search = $request->input('search');

        // ถ้ามีการค้นหา จะกรองชื่อหรืออีเมล แล้วแบ่งหน้า
        $users = UserInfo::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%");
        })->paginate(5)->appends(['search' => $search]); // ➕ Pagination และ preserve search

        // ส่ง $users และ $search ไปที่ view
        return view('users.index', compact('users', 'search'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:user_infos'
        ]);

        UserInfo::create($request->all());
        return redirect()->route('users.index')->with('success', 'เพิ่มข้อมูลเรียบร้อย');
    }

    public function edit($id)
    {
        $user = UserInfo::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = UserInfo::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:user_infos,email,' . $user->id
        ]);

        $user->update($request->all());
        return redirect()->route('users.index')->with('success', 'แก้ไขข้อมูลเรียบร้อย');
    }

    public function destroy($id)
    {
        $user = UserInfo::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'ลบข้อมูลเรียบร้อย');
    }
}
