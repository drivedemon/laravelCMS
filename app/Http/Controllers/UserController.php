<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index() {
    // return view and query data send to view
    return view('users.index')->with('users', User::all());
  }
  public function makeadmin(User $user) {
    $user->role = 'admin';
    $user->save();
    Session()->flash('success', 'เปลี่ยนสถานะเรียบร้อย');
    return redirect(route('users.index'));
  }
}
