<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{

    /**
     * Show login form
     */
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    /**
     * Authenticate admin
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            if ($user->hasRole('admin')) {
                $request->session()->regenerate();
                return redirect()->intended(route('admin.dashboard'));
            } else {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'You do not have admin access.',
                ]);
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Show admin dashboard
     */
    public function dashboard()
    {
        $stats = [
            'total' => ContactMessage::count(),
            'unread' => ContactMessage::unread()->count(),
            'read' => ContactMessage::read()->count(),
            'replied' => ContactMessage::replied()->count(),
        ];

        $recentMessages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages'));
    }

    /**
     * Show all messages
     */
    public function messages(Request $request)
    {
        $query = ContactMessage::query();

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        $messages = $query->latest()->paginate(15);
        return view('admin.messages', compact('messages'));
    }

    /**
     * Show single message
     */
    public function showMessage(ContactMessage $message)
    {
        if ($message->status === 'unread') {
            $message->markAsRead();
        }
        
        return view('admin.message-detail', compact('message'));
    }

    /**
     * Mark message as replied
     */
    public function markAsReplied(ContactMessage $message)
    {
        $message->markAsReplied();
        
        return response()->json([
            'success' => true,
            'message' => 'Message marked as replied successfully.'
        ]);
    }

    /**
     * Delete message
     */
    public function deleteMessage(ContactMessage $message)
    {
        $message->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Message deleted successfully.'
        ]);
    }

    /**
     * Logout admin
     */
    public function logout(Request $request)
    {
        // Log the logout attempt
        Log::info('Admin logout attempted', [
            'user_id' => Auth::id(),
            'user_email' => Auth::user() ? Auth::user()->email : 'unknown'
        ]);
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('admin.login')->with('success', 'You have been successfully logged out.');
    }
} 