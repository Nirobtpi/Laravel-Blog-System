<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdController extends Controller
{
    public function index()
    {
        return view('ads.add-ad');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'link' => ['nullable', 'url', 'max:500'],
            'image' => ['required', 'image', 'max:5120'],
            'status' => ['required', 'in:0,1'],
        ], [
            'title.required' => 'Ad title is required',
            'image.required' => 'Ad image is required',
            'link.url' => 'Please enter a valid URL (include https://)',
        ]);

        $photo = null;
        if ($request->hasFile('image')) {
            $directory = public_path('upload/promo');
            File::ensureDirectoryExists($directory);
            $filename = $request->file('image')->hashName();
            $request->file('image')->move($directory, $filename);
            $photo = 'upload/promo/' . $filename;
        }

        Ad::create([
            'title' => $request->title,
            'link' => $request->link,
            'image' => $photo,
            'status' => $request->status,
        ]);

        return redirect('view-ads')->with('success', 'Ad added successfully');
    }

    public function view()
    {
        $ads = Ad::latest()->get();
        return view('ads.view-ads', compact('ads'));
    }

    public function edit($id)
    {
        $ad = Ad::findOrFail($id);
        return view('ads.edit-ad', compact('ad'));
    }

    public function update(Request $request, $id)
    {
        $ad = Ad::findOrFail($id);

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'link' => ['nullable', 'url', 'max:500'],
            'image' => ['nullable', 'image', 'max:5120'],
            'status' => ['required', 'in:0,1'],
        ], [
            'title.required' => 'Ad title is required',
            'link.url' => 'Please enter a valid URL (include https://)',
        ]);

        $photo = $ad->image;
        if ($request->hasFile('image')) {
            if ($ad->image && File::exists(public_path($ad->image))) {
                File::delete(public_path($ad->image));
            }
            $directory = public_path('upload/promo');
            File::ensureDirectoryExists($directory);
            $filename = $request->file('image')->hashName();
            $request->file('image')->move($directory, $filename);
            $photo = 'upload/promo/' . $filename;
        }

        $ad->update([
            'title' => $request->title,
            'link' => $request->link,
            'image' => $photo,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Ad updated successfully');
    }

    public function delete($id)
    {
        $ad = Ad::findOrFail($id);
        if ($ad->image && File::exists(public_path($ad->image))) {
            File::delete(public_path($ad->image));
        }
        $ad->delete();

        return back()->with('success', 'Ad deleted successfully');
    }
}
