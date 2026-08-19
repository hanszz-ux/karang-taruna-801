<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LandingPageController extends Controller
{
    public function edit()
    {
        $setting = LandingSetting::first();

        if (!$setting) {
            $setting = LandingSetting::create([
                'hero_title' => 'Karang Taruna 801',
                'hero_description' => 'Karang Taruna hadir sebagai wadah generasi muda untuk berkarya, berkontribusi, dan membangun masyarakat.',
                'hero_button_url' => '#program',
                'about_title' => 'Tentang Karang Taruna',
                'about_description' => 'Karang Taruna merupakan organisasi kepemudaan yang bergerak dalam bidang sosial dan pemberdayaan masyarakat.',
                'about_point_1' => 'Mendorong kreativitas generasi muda',
                'about_point_2' => 'Membangun kepedulian sosial',
                'about_point_3' => 'Mengembangkan potensi masyarakat',
                'vision' => 'Mewujudkan generasi muda yang aktif, kreatif, mandiri, dan peduli terhadap masyarakat.',
                'mission' => 'Mengembangkan potensi pemuda melalui kegiatan sosial, pendidikan, olahraga, kewirausahaan, dan kegiatan kemasyarakatan.',
                'stat_members' => 0,
                'stat_programs' => 0,
                'stat_events' => 0,
                'stat_years' => 0,
            ]);
        }

        return view('admin.landing.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = LandingSetting::first();

        if (!$setting) {
            $setting = new LandingSetting();
        }

        $validated = $request->validate([
            'hero_title' => ['nullable', 'string', 'max:255'],
            'hero_description' => ['nullable', 'string'],
            'hero_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'hero_button_text' => ['nullable', 'string', 'max:100'],
            'hero_button_url' => ['nullable', 'string', 'max:255'],

            'about_title' => ['nullable', 'string', 'max:255'],
            'about_description' => ['nullable', 'string'],
            'about_point_1' => ['nullable', 'string', 'max:255'],
            'about_point_2' => ['nullable', 'string', 'max:255'],
            'about_point_3' => ['nullable', 'string', 'max:255'],
            'about_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],

            'vision' => ['nullable', 'string'],
            'mission' => ['nullable', 'string'],

            'stat_members' => ['required', 'integer', 'min:0'],
            'stat_programs' => ['required', 'integer', 'min:0'],
            'stat_events' => ['required', 'integer', 'min:0'],
            'stat_years' => ['required', 'integer', 'min:0'],

            'address' => ['nullable', 'string', 'max:500'],
            'phone' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],

            'instagram' => ['nullable', 'string', 'max:255'],
            'tiktok' => ['nullable', 'string', 'max:255'],
        ]);

        if ($request->hasFile('hero_image')) {

            if ($setting->hero_image) {
                Storage::disk('public')->delete($setting->hero_image);
            }

            $validated['hero_image'] = $request
                ->file('hero_image')
                ->store('landing', 'public');
        }

        if ($request->hasFile('about_image')) {

            if ($setting->about_image) {
                Storage::disk('public')->delete($setting->about_image);
            }

            $validated['about_image'] = $request
                ->file('about_image')
                ->store('landing', 'public');
        }

        $setting->fill($validated);
        $setting->save();

        return redirect()
            ->route('admin.landing.edit')
            ->with('success', 'Konten landing page berhasil diperbarui.');
    }
}