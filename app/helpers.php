<?php
function calcMinutes($in_m,$in_s,$out_m,$out_s){
    $minutes = (int)$out_m -  (int)$in_m ;
    $seconds = (int)$out_s -  (int)$in_s ;
    if ($seconds < 0){
        $minutes -=1;
        $seconds = 60 + $seconds;
    }
    return [
        'minutes'=>$minutes,
        'seconds'=>$seconds,
    ];

}//end calcMinutes
function calcTotal($c_t_m,$c_t_s,$t_m,$t_s){
    $minutes = (int)$c_t_m +  (int)$t_m ;
    $seconds = (int)$c_t_s +  (int)$t_s ;
    if ($seconds > 59){
        $minutes +=1;
        $seconds =  $seconds - 60;
    }
    return [
        'minutes'=>$minutes,
        'seconds'=>$seconds,
    ];

}//end calcTotal



function sendNotification($firebaseToken,$title,$body){
    $SERVER_API_KEY = 'AAAA-6jgg1E:APA91bFjkrShv-15jtDwAN5blYJw_C2Sb-4M9x-aHbaMvMCUc7o8fuCjlIzOGMShZ8pJ8hQX9C3LDC8Tifr0Sc6UMIPpipfLdx7_DZOn0ldqVzyzLVl9yrwWrwpdQ1RKqsCcPEE6_IEo';
    $data = [
        "registration_ids" => $firebaseToken,
        "notification" => [
            "title" => $title,
            "body" => $body,
        ]
    ];
    $dataString = json_encode($data);
    $headers = [
        'Authorization: key=' . $SERVER_API_KEY,
        'Content-Type: application/json',
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
    $response = curl_exec($ch);
    return $response;
}//end sendNotification

function setting($key,$lang){
    return $setting = \App\Setting::where('key',$key)->first()->translate($lang)->value;
}//end setting

function sendInnerNotification($ids,$type,$body){
    $users = \App\User::whereIn('id',$ids)->get();
    foreach ($users as $user){
        $notification = new \App\Notification();
        $notification->user_id = $user->id;
        $notification->body = $body;
        $notification->type = $type;
        $notification->save();
    }//end foreach
}//end sendInnerNotification
function getNotificationIcon($type){
    $icons = [
        'new_register'=>'check',
        'new_order'=>'check',
        'new_offer'=>'plus',
        'accept_offer'=>'check',
        'cancel_order'=>'x-circle',
        'complete_order'=>'check',
        'cancel_offer'=>'x-circle',
    ];
    return $icons[$type];
}//end getNotificationIcon
function getNotificationBackground($type){
    $icons = [
        'new_register'=>'primary',
        'new_order'=>'warning',
        'new_offer'=>'info',
        'accept_offer'=>'success',
        'cancel_order'=>'danger',
        'complete_order'=>'success',
        'cancel_offer'=>'danger',
    ];
    return $icons[$type];
}//end getNotificationBackground
function createRandomCode() {

    $chars = "abcdefghijkmnopqrstuvwxyz023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;

    while ($i <= 7) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }

    return $pass;

}
