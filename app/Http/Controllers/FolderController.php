<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\FolderMessage;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FolderController extends Controller
{
    public function folders()
    {
        /** @var \App\Models\User $user **/
        $user = Auth::user();

        $folders = $user->folders()
            ->with(['messages'])
            ->get();

        return response()->json([
            'success' => true,
            'folders' => $folders,
        ]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->all()
            ], 400);
        }

        /** @var \App\Models\User $user **/
        $user = Auth::user();
        $folder = $user->folders()->create([
            'name' => $request->name,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Folder created successfully.',
            'folder' => $folder,
        ], 201);
    }

    public function update(Request $request, Folder $folder)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->all()
            ], 400);
        }

        $folder->update(['name' => $request->name]);

        return response()->json([
            'success' => true,
            'message' => 'Folder updated successfully.',
            'folder' => $folder,
        ]);
    }

    public function delete(Folder $folder)
    {
        $folder->forceDelete();

        return response()->json([
            'success' => true,
            'message' => 'Folder deleted successfully.',
        ]);
    }

    public function addMessage(Request $request, Folder $folder)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->all()
            ], 400);
        }

        $folderMessage = $folder->messages()->create([
            'question' => $request->question,
            'answer' => $request->answer
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Message added to folder successfully.'
        ]);
    }

    public function removeMessage(Folder $folder, FolderMessage $folderMessage)
    {
        if ($folderMessage->folder_id !== $folder->id) {
            return response()->json([
                'success' => false,
                'message' => 'The message does not belong to this folder.',
            ], 403);
        }

        // Delete the message
        $folderMessage->delete();

        return response()->json([
            'success' => true,
            'message' => 'Message removed from folder successfully.',
        ]);
    }
}
