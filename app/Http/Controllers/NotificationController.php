<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $notifications = Notification::where("user_id", $user->id)->orderBy('created_at', 'desc')->paginate(50);
        return response()->json($notifications);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        //
    }

    public function setFCMToken(Request $request)
    {
        $user = Auth::user();
        $user = User::where('id', $user->id)->first();
        $user->pm_fcm_token = $request->token;
        $user->save();
        return response()->json(['status' => 'success']);
    }

    public function sendNotification($data)
    {
        $data = $data->only([
            'title',
            'description',
            'user_id',
            'event_id',
            'module',
        ]);
        $notification = Notification::create($data->toArray());
        $notification->save();

        $firebaseToken = User::where('id', $data->get('user_id'))->whereNotNull('pm_fcm_token')->pluck('pm_fcm_token')->first();

        if ($firebaseToken === null) return;

        $SERVER_API_KEY = env('FCM_SERVER_KEY');

        $data = [
            "to" => $firebaseToken,
            "notification" => [
                "title" => $notification->title,
                "body" => $notification->description,
                "mutable_content" => true,
            ],
            "data" => [
                "id" => $notification->id,
                "click_action" => $notification->movement,
                "payload" => $notification->date,
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }

    public function notificationReaded(Notification $notification)
    {
        $user = Auth::user();
        if ($notification->unread === false) return response()->json(["status" => "success"]);
        if ($notification->user_id != $user->id) {
            return response()->json(["status" => "Permission Denied"]);
        }
        $notification->unread = false;
        $notification->save();
        return response()->json(["status" => "success"]);
    }

    public function listing($id)
    {
        $notifications = Notification::where('user_id', $id)->orderBy('created_at','desc')->get();
        $count = $notifications->count();
        $unread = $notifications->where('unread','1')->count();
        $mrf_count = $notifications->where('module', 'MRF')->count();
        $now = Carbon::now();
        $notification = Notification::where('user_id', $id)->orderBy('created_at','desc')->first();

        return response()->json(['notifications' => $notifications, 'counts' => $count, 'now' => $now, 'unread' => $unread, 'mrf' => $mrf_count]);
    }

    public function notificationSummary()
    {
        $user = Auth::user();
        $summary=DB::table("notifications")->selectRaw('COALESCE(SUM(unread=1), 0) as unread,COUNT(*) as total')->where('user_id',$user->id)->first();
        return response()->json($summary);
    }
}
