<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function links()
    {
        $links = Link::all();
        return view('admin.all-links', compact('links'));
    }

    public function apiLinks()
    {
        $links = Link::all();
        return response()->json([
            'status' => true,
            'links' => $links
        ]);
    }

    public function addlink(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:20240',
        ]);

        $link = Link::create([
            'name' => $request->name,
        ]);

        if ($request->hasFile('image')) {
            $link->addMediaFromRequest('image')->toMediaCollection('image');
        }

        return redirect()->route('all-links')->with([
            'status' => 'success',
            'message' => 'Link Added Successfully'
        ]);
    }

    public function deleteLink(Link $link)
    {
        $link->clearMediaCollection('image');
        $link->delete();
        return redirect()->route('all-links')->with([
            'status' => 'success',
            'message' => 'Link Deleted Successfully'
        ]);
    }
}
