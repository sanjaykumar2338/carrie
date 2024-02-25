<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\NotificationConfig;
use App\Models\NotificationTemplate;
use App\Models\UserNotificationConfig;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use App\Models\Store;
use App\Models\Reward;


class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Store";
        $stores = Store::all(); // Retrieve all stores



        return view('admin.stores.index', compact('stores'));
    }

    public function syncStores(){

        $response = Http::withHeaders([
            'Client-Agent' => 'button',
            'Cookie' => 'AWSALB=xCr9FgPdbXiAJkKZnvZ/gFv9XVClizCRl1fMyhU71suafA8tARHeUTbPnRlwLQqFNL+YWy7xMZFzKtIBSEomTHFTpHOa4I/VYqwvuM0ekZOm+RcDNXHG42wMRd4r; AWSALBCORS=xCr9FgPdbXiAJkKZnvZ/gFv9XVClizCRl1fMyhU71suafA8tARHeUTbPnRlwLQqFNL+YWy7xMZFzKtIBSEomTHFTpHOa4I/VYqwvuM0ekZOm+RcDNXHG42wMRd4r',
        ])->get('https://api.engager.ecbsn.com/datagrid/rest/v1/data?name=button_domain_batch_v1&variables=%7B%22storeIds%22%3A%5B%2214296%22%2C%229255%22%2C%2210362%22%2C%2222156%22%2C%229376%22%2C%229718%22%2C%2210437%22%2C%229563%22%2C%2218859%22%2C%2215440%22%2C%2216292%22%2C%229626%22%2C%2219167%22%2C%2216585%22%2C%2218191%22%2C%2215103%22%2C%2211526%22%2C%229746%22%2C%2210722%22%2C%2218210%22%2C%2219636%22%2C%2219777%22%2C%2210103%22%2C%2221253%22%2C%2222259%22%2C%2218741%22%2C%2216738%22%2C%2219208%22%2C%2213993%22%2C%2210859%22%2C%2222155%22%2C%2212109%22%2C%2218425%22%2C%2210424%22%2C%224986%22%2C%2212514%22%2C%225246%22%2C%2218711%22%2C%2212662%22%2C%224207%22%2C%2219041%22%2C%2216693%22%2C%229871%22%2C%227971%22%2C%2215977%22%2C%2218386%22%2C%2211174%22%2C%228055%22%2C%2216731%22%2C%2210236%22%5D%7D');

        $json = $response->body();

        $data = json_decode($json, true);


        if (json_last_error() === JSON_ERROR_NONE) { // Check if JSON data is valid
            foreach ($data['data']['stores'] as $storeData) {
                Store::firstOrCreate(
                    ['storeId' => $storeData['storeId']], // Check attributes
                    [ // Additional attributes used for create
                        'storeName' => $storeData['storeName'],
                        'siteUrl' => $storeData['siteUrl'],
                        'activationCode' => $storeData['activationCode'],
                        'affiliatizerEnabled' => $storeData['affiliatizerEnabled'],
                        'orderConfirmationURLRegex' => $storeData['orderConfirmationURLRegex'],
                        'orderConfirmationDOMRegex' => $storeData['orderConfirmationDOMRegex'],
                        'icbEnabled' => $storeData['icbEnabled'],
                        'shoppingURL' => $storeData['shoppingURL'],
                        'largeLogoUrl' => $storeData['largeLogo']['url'] ?? null,
                        'squareLogoUrl' => $storeData['squareLogo']['url'] ?? null,
                        'squareLogoInverseUrl' => $storeData['squareLogoInverse']['url'] ?? null,
                        'largeLogoBackgroundColor' => $storeData['largeLogo']['backgroundColor'],
                        'squareLogoBackgroundColor' => $storeData['squareLogo']['backgroundColor'],
                        'squareLogoInverseBackgroundColor' => $storeData['squareLogoInverse']['backgroundColor'],
                    ]
                );
            }
        } else {
            echo "Invalid JSON data.";
        }

    }

    public function syncPrice(){
        $response = Http::withHeaders([
            'Client-Agent' => 'button',
            'Cookie' => 'AWSALB=AU5IlLW8eapU130afvEIKPqkKOS7ovAOtkl5p0e0ue56NAnfsMl5kfbKM3KRrkFH6a4kfx8I+glWHKrlX08W77uq2x4j0sttZmXyBv8Iv0RLn/OGe4c+LVPFUxe9; AWSALBCORS=AU5IlLW8eapU130afvEIKPqkKOS7ovAOtkl5p0e0ue56NAnfsMl5kfbKM3KRrkFH6a4kfx8I+glWHKrlX08W77uq2x4j0sttZmXyBv8Iv0RLn/OGe4c+LVPFUxe9',
        ])
        ->get('https://api.engager.ecbsn.com/datagrid/rest/v1/data', [
            'name' => 'button_reward_v1',
            'variables' => '{"storeIds":["all"]}',
        ]);

        $json =$response->body();
        $data = json_decode($json, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            foreach ($data['data']['stores'] as $storeData) {
                // Attempt to find an existing Store by ID.
                $store = Store::where("storeId",$storeData['id'])->first();

                // If the store doesn't exist, create a new one.
                if (!$store) {
                    $store = Store::create([
                        'storeId' => $storeData['id'],
                        'storeName'=>" ",
                        'siteUrl'=>"#",
                        "activationCode"=>0,
                        "affiliatizerEnabled"=>0,
                        "icbEnabled"=>0,
                        "shoppingURL"=>"#"
                        // Include other necessary fields from $storeData if there are any.
                    ]);
                }

                // Check if a reward for this store already exists to avoid duplicates.
                $existingReward = Reward::where('store_id', $store->id)->first();

                if (!$existingReward) {
                     // Basic sanitization to extract numeric values from the string
                     $previousAmount =   $storeData['reward']['previous'];

                 $numericPrevious = is_numeric($previousAmount) ? $previousAmount : null;

            if ($numericPrevious === null && preg_match('/(\d+(\.\d+)?)/', $previousAmount, $matches)) {
                $numericPrevious = $matches[1]; // Use the first numeric occurrence in the string
            }
                    // Insert new reward only if it doesn't exist for the store.
                    $sanitizedDescription = htmlspecialchars($storeData['reward']['description'], ENT_QUOTES, 'UTF-8');

                    Reward::create([
                        'store_id' => $store->id,
                        'amount' => $storeData['reward']['amount'] ?? null,
                        'display' => $storeData['reward']['display'],
                        'range' => $storeData['reward']['range'],
                        'description' =>$sanitizedDescription,
                        'previous' => $numericPrevious,
                    ]);
                }
            }
        } else {
            echo "Invalid JSON data.";
        }
                    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = __('common.notifications');
        $notification = new Notification();
        $placeholderData = $notification->defaultPlaceholder();
        return view('admin.notifications.create', compact('placeholderData', 'page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $this->validate($request,
            [
                'title'                     => 'required',
                'code'                      => 'required',
                'table_model'               => 'required',
            ],
            [
                'title.required'                => 'The title field is required.',
                'code.required'                 => 'The code field is required.',
                'table_model.required'          => 'The table model field is required.',
            ],
        );

        $notificationConfig                         = new NotificationConfig();
            $notificationConfig->code               = $request->code;
        $notificationConfig->title                  = $request->title;
        $notificationConfig->table_model            = $request->table_model;
        $notificationConfig->notification_types     = $request->notification_types ? implode(',', array_keys($request->notification_types)) : '';
        $notificationConfig->placeholders           = $request->placeholders;
        $res = $notificationConfig->save();

        if($res)
        {
            foreach ($request->content as $key => $value)
            {
                $notificationTemplates                          = new NotificationTemplate();
                if($key == 1)
                {
                    $notificationTemplates->subject                 = $request->subject;
                    $notificationTemplates->slug                    = \Str::kebab($request->subject);
                }
                $notificationTemplates->notification_config_id      = $notificationConfig->id;
                $notificationTemplates->notification_type_id        = $key;
                $notificationTemplates->content                     = $value;
                $res = $notificationTemplates->save();
            }
            return redirect()->route('admin.notification.notifications_config')->with('success', __('common.notification_added_successfully'));
        }
        return redirect()->route('admin.notification.notifications_config')->with('error', __('common.something_went_wrong'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = __('common.notifications');
        $templatesObj = new NotificationTemplate();
        $notification_template  = NotificationConfig::findorFail($id);
        $placeholderData = (new Notification())->defaultPlaceholder();
        return view('admin.notifications.edit', compact('notification_template', 'templatesObj', 'placeholderData', 'page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $notificationConfig = NotificationConfig::findorFail($id);
        $validation = $this->validate($request,
            [
                'title'                     => 'required',
                'code'                      => 'required',
                'table_model'               => 'required',
            ],
            [
                'title.required'                => 'The title field is required.',
                'code.required'                 => 'The code field is required.',
                'table_model.required'          => 'The table model field is required.',
            ],
        );

        $notificationConfig->code                   = $request->code;
        $notificationConfig->title                  = $request->title;
        $notificationConfig->table_model            = $request->table_model;
        $notificationConfig->notification_types     = $request->notification_types ? implode(',', array_keys($request->notification_types)) : '';
        $notificationConfig->placeholders           = $request->placeholders;
        $res = $notificationConfig->save();

        if($res)
        {
            foreach ($request->content as $key => $value)
            {
                $notificationTemplates  = new NotificationTemplate();
                $templates = $notificationTemplates->get_notification_template($id, $key);
                if($templates)
                {
                    $notificationTemplates  = $templates;
                }
                if($key == 1)
                {
                    $notificationTemplates->subject                 = $request->subject;
                    $notificationTemplates->slug                    = \Str::kebab($request->subject);
                }

                $notificationTemplates->notification_config_id      = $notificationConfig->id;
                $notificationTemplates->notification_type_id        = $key;
                $notificationTemplates->content                     = $value;
                $res = $notificationTemplates->save();
            }

            return redirect()->route('admin.notification.notifications_config')->with('success', __('common.notification_updated_successfully'));
        }

        return redirect()->route('admin.notification.notifications_config')->with('error', __('common.something_went_wrong'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notifications_config   = NotificationConfig::findorFail($id);
        $res = $notifications_config->delete();

        if($res)
        {
            return redirect()->route('admin.notification.notifications_config')->with('success', __('common.notification_deleted_successfully'));
        }
        return redirect()->route('admin.notification.notifications_config')->with('error', __('common.something_went_wrong'));
    }

    public function notifications_config(Request $request)
    {
        $page_title = __('common.notifications');
        $templates = NotificationConfig::query();

        if($request->filled('title')) {
            $templates->where('title', 'like', "%{$request->input('title')}%");
        }

        if($request->filled('code')) {
            $templates->where('code', '=', $request->input('code'));
        }

        $notifications_config = $templates->orderBy('created_at', 'desc')->paginate(config('Reading.nodes_per_page'));
        return view('admin.notifications.notifications_config', compact('notifications_config', 'page_title'));
    }

    public function edit_template(Request $request, $config_id='')
    {

        if($request->isMethod('post'))
        {
            foreach ($request->content as $key => $value)
            {
                $notificationTemplates  = new NotificationTemplate();
                $templates = $notificationTemplates->get_notification_template($config_id, $key);
                if($templates)
                {
                    $notificationTemplates  = $templates;
                }
                if($key == 1)
                {
                    $notificationTemplates->subject                 = $request->subject;
                }

                $notificationTemplates->notification_config_id      = $config_id;
                $notificationTemplates->notification_type_id        = $key;
                $notificationTemplates->content                     = $value;
                $res = $notificationTemplates->save();
            }

            if($res)
            {
                return redirect()->route('admin.notification.notifications_config')->with('success', __('common.notification_template_updated_successfully'));
            }
            return redirect()->route('admin.notification.notifications_config')->with('error', __('common.something_went_wrong'));
        }
        else
        {
            $page_title = __('common.notifications');
            $templatesObj = new NotificationTemplate();
            $notification_config = NotificationConfig::select('placeholders')->findorFail($config_id);
            $all_templates = NotificationTemplate::where('notification_config_id', '=', $config_id)->get();
            return view('admin.notifications.edit_template', compact('notification_config', 'all_templates', 'config_id', 'templatesObj', 'page_title'));
        }
    }

    public function edit_email_template(Request $request, $config_id='')
    {
        if($request->isMethod('post'))
        {
            foreach ($request->content as $key => $value)
            {
                $notificationTemplates  = new NotificationTemplate();
                $templates = $notificationTemplates->get_notification_template($config_id, $key);
                if($templates)
                {
                    $notificationTemplates  = $templates;
                }
                if($key == 1)
                {
                    $notificationTemplates->subject                 = $request->subject;
                }

                $notificationTemplates->notification_config_id      = $config_id;
                $notificationTemplates->notification_type_id        = $key;
                $notificationTemplates->content                     = $value;
                $res = $notificationTemplates->save();
            }

            if($res)
            {
                return redirect()->route('admin.notification.notifications_config')->with('success', __('common.email_notification_updated_successfully'));
            }
            return redirect()->route('admin.notification.notifications_config')->with('error', __('common.something_went_wrong'));
        }
        else
        {
            $page_title = __('common.notifications');
            $templatesObj = new NotificationTemplate();
            $notification_config = NotificationConfig::select('placeholders')->findorFail($config_id);
            $email_template = NotificationTemplate::where('notification_config_id', '=', $config_id)
                                ->where('notification_type_id', '=', 1)
                                ->get();
            return view('admin.notifications.edit_email_template', compact('notification_config', 'email_template', 'config_id', 'templatesObj', 'page_title'));
        }
    }

    public function edit_web_template(Request $request, $config_id='')
    {
        if($request->isMethod('post'))
        {
            foreach ($request->content as $key => $value)
            {
                $notificationTemplates  = new NotificationTemplate();
                $templates = $notificationTemplates->get_notification_template($config_id, $key);
                if($templates)
                {
                    $notificationTemplates  = $templates;
                }

                $notificationTemplates->notification_config_id      = $config_id;
                $notificationTemplates->notification_type_id        = $key;
                $notificationTemplates->content                     = $value;
                $res = $notificationTemplates->save();
            }

            if($res)
            {
                return redirect()->route('admin.notification.notifications_config')->with('success', __('common.web_notification_updated_successfully'));
            }
            return redirect()->route('admin.notification.notifications_config')->with('error', __('common.something_went_wrong'));
        }
        else
        {
            $page_title = __('common.notifications');
            $templatesObj = new NotificationTemplate();
            $notification_config = NotificationConfig::select('placeholders')->findorFail($config_id);
            $web_template = NotificationTemplate::where('notification_config_id', '=', $config_id)
                                ->where('notification_type_id', '=', 2)
                                ->get();
            return view('admin.notifications.edit_web_template', compact('notification_config', 'web_template', 'config_id', 'templatesObj', 'page_title'));
        }
    }

    public function edit_sms_template(Request $request, $config_id='')
    {
        if($request->isMethod('post'))
        {
            foreach ($request->content as $key => $value)
            {
                $notificationTemplates  = new NotificationTemplate();
                $templates = $notificationTemplates->get_notification_template($config_id, $key);
                if($templates)
                {
                    $notificationTemplates  = $templates;
                }

                $notificationTemplates->notification_config_id      = $config_id;
                $notificationTemplates->notification_type_id        = $key;
                $notificationTemplates->content                     = $value;
                $res = $notificationTemplates->save();
            }

            if($res)
            {
                return redirect()->route('admin.notification.notifications_config')->with('success', __('common.sms_notification_updated_successfully'));
            }
            return redirect()->route('admin.notification.notifications_config')->with('error', __('common.something_went_wrong'));
        }
        else
        {
            $page_title = __('common.notifications');
            $templatesObj = new NotificationTemplate();
            $notification_config = NotificationConfig::select('placeholders')->findorFail($config_id);
            $sms_template = NotificationTemplate::where('notification_config_id', '=', $config_id)
                                ->where('notification_type_id', '=', 2)
                                ->get();
            return view('admin.notifications.edit_sms_template', compact('notification_config', 'sms_template', 'config_id', 'templatesObj', 'page_title'));
        }
    }

    public function settings(Request $request)
    {

        if($request->isMethod('post'))
        {
            if(!empty($request->input('notification_types')))
            {
                foreach($request->input('notification_types') as $notification_id => $notification)
                {

                    if(isset($notification['all']))
                    {
                        unset($notification['all']);
                        $notificationConfig = NotificationConfig::find($notification_id);
                        $notificationConfig->notification_types = $request->notification_types ? implode(',', array_keys($notification)) : '';
                        $notificationConfig->status = 1;
                        $notificationConfig->save();
                    }
                    else
                    {
                        NotificationConfig::where('status', '=', 1)->update(['status' => 0]);
                    }
                }
                return redirect()->back()->with('success', __('common.notification_settings_updated_successfully'));
            }
            else
            {
                NotificationConfig::where('status', '=', 1)->update(['status' => 0]);
            }
        }

        $page_title = __('common.notifications');
        $notifications = NotificationConfig::get();
        return view('admin.notifications.settings', compact('notifications', 'page_title'));
    }
}
