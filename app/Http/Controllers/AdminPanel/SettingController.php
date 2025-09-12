<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.settings');
    }

    public function update(Request $request)
    {
        foreach ($request->except(['_token', '_method']) as $key => $value) {
            DB::table('settings')->updateOrInsert(
                ['key' => $key],
                ['value' => $value]
            );
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $filePath = save_file($file, 'settings');
                DB::table('settings')->updateOrInsert(
                    ['key' => $key],
                    ['value' => $filePath]
                );
            }
        }

        return back()->with('success', 'تنظیمات با موفقیت ویرایش شد');
    }

    public function deleteFiles()
    {
        $settingsFiles = DB::table('settings')
            ->where('value', 'like', 'settings/%')
            ->pluck('value');

        foreach($settingsFiles as $filePath){
            delete_file($filePath);
        }

        return back()->with('success', 'تمامی فایل های ثبت شده در تنظیمات با موفقیت حذف شد');
    }

    public function setDefault(){
        DB::table('settings')->update(['value' => null]);
        return back()->with('success', 'تنظیمات با موفقیت پیشفرض شد');
    }
}
