<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {
        return view('setting', [
            'setting' => Setting::first(),
        ]);
    }
    /*
     * Save site settings (logo, phone, facebook).
     * Handles logo upload, deletes the old logo file if replaced, and
     * updates phone / facebook in the database.
     */
    public function store(Request $request)
    {
        // 1. Validate the submitted data
        $validated = $request->validate([
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'facebook' => 'nullable|url',
            'phone' => 'required|string|max:30',
        ]);

        // 2. Get the existing settings record
        $setting = Setting::firstOrFail();

        // 3. Update the logo only if a new file was uploaded
        if ($request->hasFile('logo')) {

            $file = $request->file('logo');

            // Generate a unique filename
            $filename = time() . '_' . $file->getClientOriginalName();

            // Create the upload directory if needed
            File::ensureDirectoryExists(public_path('upload'));

            // Save the new logo
            $file->move(public_path('upload'), $filename);

            // Delete the old logo if it exists
            if ($setting->logo && File::exists(public_path('upload/' . $setting->logo))) {
                File::delete(public_path('upload/' . $setting->logo));
            }

            // Update the database filename
            $setting->logo = $filename;
        }

        // 4. Update other settings
        $setting->phone = $validated['phone'];
        $setting->facebook = $validated['facebook'] ?? null;

        // 5. Save everything to the database
        $setting->save();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Setting updated successfully.');
    }
}