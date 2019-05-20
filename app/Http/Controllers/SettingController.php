<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traids\Messageable;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use Messageable;

    public function edit()
    {

        $data = $this->getEnvData();
        return view('settings.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'app_name' => 'required',
            'app_url' => 'required',
            'admin_prefix' => 'required',
            'blog_prefix' => 'required',
            'google_tag_id' => 'required',
        ]);

        //get request data
        $data = $request->only('app_name', 'app_debug', 'app_url', 'admin_prefix', 'blog_prefix', 'google_tag_id');

        //set value for app_debug if not exists in request data
        $request->has('app_debug') ? $data['app_debug'] = 'true' : $data['app_debug'] = 'false';

        // update env file with request data
        setEnvironmentValue($this->setEnvData($data));

        // return redirect back
        return redirect()->route('setting.edit')
            ->with($this->updateMessage('ENV'));
    }

    protected function getEnvData()
    {
        return $data = [
            'app_name' => env('APP_NAME'),
            'app_debug' => env('APP_DEBUG'),
            'app_url' => env('APP_URL'),
            'admin_prefix' => env('URL_ADMIN_PREFIX'),
            'blog_prefix' => env('URL_BLOG_PREFIX'),
            'google_tag_id' => env('GOOGLE_TAG'),
        ];
    }

    protected function setEnvData(array $data)
    {
        return $data = [
            'APP_NAME' => $data['app_name'],
            'APP_DEBUG' => $data['app_debug'],
            'APP_URL' => $data['app_url'],
            'ANALYTICS_VIEW_ID' => $data['google_tag_id'],
            'URL_ADMIN_PREFIX' => $data['admin_prefix'],
            'URL_BLOG_PREFIX' => $data['blog_prefix']
        ];
    }


}
