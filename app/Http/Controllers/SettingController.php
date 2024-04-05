<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Traits\StorageImageTrait;
use function Laravel\Prompts\error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{
    use StorageImageTrait;

    private $setting;
    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }
    public function index()
    {
        $settings = $this->setting->first();
        return view('admin.setting.index', compact('settings'));
    }

    public function update(Request $request)
    {
        try {
            // Lấy bản ghi đầu tiên
            $setting = $this->setting->first();

            $dataUpdate = [
                'name' => $request->name,
                'description' => $request->description,
                'phone' => $request->phone,
                'email' => $request->email,
                'zalo' => $request->zalo,
                'address' => $request->address,
                'fanpage' => $request->fanpage,
                'website' => $request->website,
                'link_map' => $request->link_map,
                'iframe_map' => $request->iframe_map,
            ];            
            $dataLogoSetting = $this->storagetrait($request, 'logo_path', 'setting');
            if (!empty($dataLogoSetting)) {
                $dataUpdate['logo_name'] = $dataLogoSetting['file_name'];
                $dataUpdate['logo_path'] = $dataLogoSetting['file_path'];
            }           
            $dataFaviconSetting = $this->storagetrait($request, 'favicon_path', 'setting');
            if (!empty($dataFaviconSetting)) {
                $dataUpdate['favicon_name'] = $dataFaviconSetting['file_name'];
                $dataUpdate['favicon_path'] = $dataFaviconSetting['file_path'];
            }       
            // dd($request->file('favicon_path'));   
            // dd($request->file('logo_path'));   
            $setting->update($dataUpdate);
            return redirect()->route('setting.index');
        } catch (\Exception $exception) {
            Log::error('Lỗi:' . $exception->getMessage() . 'Line:' . $exception->getLine());
        }
    }

}
