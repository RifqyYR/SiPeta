<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('pages.user.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users,email|email',
            ]);
            
            DB::transaction(function () use ($request) {
                User::create([
                    'uuid' => Uuid::uuid4(),
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make('password'),
                ]);
            });

            return redirect()->route('user.index')->with('success', 'Berhasil registrasi user');
        } catch(\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Gagal registrasi user: ' . $e->getMessage());
        }
    }

    public function destroy($uuid)
    {
        try {
            $user = User::where('uuid', $uuid)->first();
            $user->delete();
            return redirect()->route('user.index')->with('success', 'Berhasil menghapus user');;
        } catch(\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Gagal menghapus user: ' . $e->getMessage());
        }
    }

    public function changePassword()
    {
        return view('pages.user.change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'newPassword' => 'required|min:8',
            'confirmNewPassword' => 'required|min:8',
        ]);

        try {
            $loggedInUser = Auth::user();

            if ($request->newPassword != $request->confirmNewPassword) {
                return redirect()->back()->with('error', 'Password Baru dan Konfirmasi Password Baru tidak sama. Silahkan coba lagi');
            }

            DB::transaction(function () use ($request, $loggedInUser) {
                $user = User::where('uuid', $loggedInUser->uuid)->first();

                $user->update([
                    'password' => Hash::make($request->newPassword),
                ]);
            });

            return redirect()->route('home')->with('success', 'Berhasil mengubah password');
        } catch(\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Gagal mengubah password: ' . $e->getMessage());
        }
    }
}
