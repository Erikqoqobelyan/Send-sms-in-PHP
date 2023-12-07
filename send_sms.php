function send_notification_sms($users)
 {
   <!-- https://gatewayapi.com/ -->
     $api_key = 'key';
     $api_endpoint = 'api_endpoint';

     foreach ($users as $to => $user) {
         $first_name = $user['first_name'];
         $last_name = $user['last_name'];

         $message = "Hello $first_name $last_name! This is a notification message.";

         $data = [
             'api_key' => $api_key,
             'to' => $to,
             'message' => $message,
         ];

         $ch = curl_init($api_endpoint);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_POST, true);
         curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
         $response = curl_exec($ch);
         curl_close($ch);

         if ($response === false) {
             echo "Error sending SMS to $to\n";
         } else {
             echo "SMS sent successfully to $to\n";
         }
     }
 }


 send_notification_sms([
            '+77777777' => ['first_name' => 'User1', 'last_name' => 'User1'],
            '+88888888' => ['first_name' => 'User2', 'last_name' => 'User2'],
            '+65545300' => ['first_name' => 'User3', 'last_name' => 'User3'],
        ]);
