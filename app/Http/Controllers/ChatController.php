<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ChatController extends Controller
{
    public function chats()
    {
        /** @var \App\Models\User $user **/
        $user = Auth::user();
        $chat = $user->chat()->with('messages')->first();

        if (!$chat) {
            return response()->json([
                'success' => false,
                'message' => 'No chat found for the user.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'chat' => $chat,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'message' => 'required|string',
            'sender' => 'required|in:tutor,user',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:20240',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->all()
            ], 400);
        }

        /** @var \App\Models\User $user **/
        $user = Auth::user();

        // Get or create the chat for the user
        $chat = $user->chat()->firstOrCreate([
            'user_id' => $user->id,
        ], [
            'title' => $validated['title'] ?? null,
        ]);

        if ($request->has('message') || $request->hasFile('image')) {
            $message = new Message([
                'message' => $request->message ?? '',
                'sender' => $request->sender ?? 'user',
            ]);
            $message->chat()->associate($chat);
            $message->save();

            // Handle image upload
            if ($request->hasFile('image')) {
                $message
                    ->addMedia($request->file('image'))
                    ->usingFileName($request->file('image')->getClientOriginalName())
                    ->toMediaCollection('image');
            }
        }

        return response()->json([
            'success' => true,
            'chat' => $chat->load('messages'),
        ], 201);
    }
}
