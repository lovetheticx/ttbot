<?php

$token = '6591992089:AAEiks_8zK4IMNkw98-uG5sn__b-UE9wz-g';
$bot = bot('InstaSaverTikTok',['bot'])->result->username;
$admin ="6216046291";
$adminuser="LappIand";

// Disable SSL verification
$context = stream_context_create(['ssl' => ['verify_peer' => false, 'verify_peer_name' => false]]);
$update = json_decode(file_get_contents('php://input', false, $context));

function bot($method,$datas=[]){
global $token;
    $url = "https://api.telegram.org/bot".$token."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$text = $message->text;
$cid = $message->chat->id;
$name = $message->from->first_name;
$mid = $message->message_id;
$type = $message->chat->type;
  /*@itmaktabi1*/
if($text=="/start"){
bot('sendmessage',[
    'chat_id'=>$cid,
    'text'=>"<b>Salom, ushbu botdan YouTube, TikTok va Instagram dan videoni suv belgisiz yuklab olishi mumkin. Boshlash uchun havolani yuboring.

🔥Reklama: @LappIand- Bot ochish hizmati</b>",
    'parse_mode'=>'html',
    ]);
}
$videou=file_get_contents("https://u5555.xvest5.ru/Hudoberdi/tiktok.php?url=".$text);
if(mb_stripos($text,"tiktok.com/")!==false){
bot('sendMessage',[
'chat_id'=>$cid , 
'text'=>"🎥ɪʟᴛɪᴍᴏs ᴋᴜᴛɪɴɢ...",
 'parse_mode'=>"html",
 'reply_to_message_id'=>$mid,
]);
sleep(3);
bot('deletemessage',[
'chat_id'=>$cid , 
'message_id'=>$mid+1,
]);

bot('sendVideo',[
'chat_id'=>$cid , 
'video'=>$videou,
'caption'=>"$text

ʏᴜᴋʟᴀʙ ʙᴇʀᴜᴠᴄʜɪ: @$bot",
]);
}

$videou1=file_get_contents("https://u5555.xvest5.ru/Hudoberdi/insta.php?url=".$text);
if(mb_stripos($text,"instagram.com/")!==false){
bot('sendMessage',[
'chat_id'=>$cid , 
'text'=>"🎥ɪʟᴛɪᴍᴏs ᴋᴜᴛɪɴɢ...",
 'parse_mode'=>"html",
 'reply_to_message_id'=>$mid,
]);
sleep(2.8);
bot('deletemessage',[
'chat_id'=>$cid , 
'message_id'=>$mid+1,
]);
bot('sendVideo',[
'chat_id'=>$cid , 
'video'=>$videou1,
'caption'=>"$text

ʏᴜᴋʟᴀʙ ʙᴇʀᴜᴠᴄʜɪ: @$bot",
]);
} 

$videou2=file_get_contents("https://u5555.xvest5.ru/Hudoberdi/index.php?url=".$text);
if(mb_stripos($text,"youtu.be/")!==false){
bot('sendMessage',[
'chat_id'=>$cid , 
'text'=>"YouTube vaqtincha ta'mirda.",
 'parse_mode'=>"html",
 'reply_to_message_id'=>$mid,
]);
bot('sendVideo',[
'chat_id'=>$cid , 
'video'=>$videou2,
'caption'=>"$text

ʏᴜᴋʟᴀʙ ʙᴇʀᴜᴠᴄʜɪ: @$bot",
]);
} 
$videou3=file_get_contents("https://u5555.xvest5.ru/Hudoberdi/index.php?url=".$text);
if(mb_stripos($text,"www.youtube.com/")!==false){
bot('sendMessage',[
'chat_id'=>$cid , 
'text'=>"YouTube vaqtincha ta'mirda.",
 'parse_mode'=>"html",
 'reply_to_message_id'=>$mid,
]);
bot('sendVideo',[
'chat_id'=>$cid , 
'video'=>$videou3,
'caption'=>"$text

ʏᴜᴋʟᴀʙ ʙᴇʀᴜᴠᴄʜɪ: @$bot",
]);
} 
if($text == "/stat"){

if($cid == $admin){

$lichka=file_get_contents("shekih.db");

$lich=substr_count($lichka,"n");
$sana = date('d.m.Y',strtotime("0 hour"));

$time=date('H:i:s',strtotime(' 0 hour'));

bot('sendmessage',[

'chat_id'=>$cid, 
'text'=>"📊 Statistika
🧍Botimiz azolari soni : $lich 🔊ta
⏰$time  📆$sana",
   
'parse_mode'=>'html',

   ]);

   }
   
} 
   $xabar = file_get_contents("send.txt");
if($text == "/send"){
if($cid == $admin){
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"*Userlarga yuboriladigan xabar matnini kiriting! Bekor qilish uchun /cancel ni bosing.*",
'parse_mode'=>"markdown",
'reply_markup'=>$back4_menu,
]); file_put_contents("send.txt","user");
}else{
bot("sendmessage",[
'chat_id'=>$cid,
'text'=> "*🤪😂 Bu funksiyani Faqat men $adminuser ishlata olaman.*",
'parse_mode'=>'Markdown',
]);
}
}
if($xabar=="user" and $cid==$admin){
if($text=="/cancel"){
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"Bekor qilindi!",
'parse_mode'=>"html",
]); unlink("send.txt");
}else{
$lich = file_get_contents("shekih.db");
$lichka = explode("n",$lich);
foreach($lichka as $lichkalar){
$okuser=bot("sendmessage",[
'chat_id'=>$lichkalar,
'text'=>$text,
'parse_mode'=>'HTML'
]);
}
}
}
if($okuser){
bot("sendmessage",[
'chat_id'=>$admin,
'text'=>"<b>Hamma userlarga yuborildi</b>✅",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]); unlink("send.txt");
}
   
   $lichka=file_get_contents("shekih.db");
if($type=="private"){
if(strpos($lichka,"$cid") !==false){
}else{
file_put_contents("shekih.db","$lichkan$cid");
}
}
   
   
   if(($text == "/pal") and $cid == $admin){

       bot('deleteMessage',[
       'chat_id'=>$cid,
       'message_id'=>$mid
       ]);
  
         bot('sendMessage',[
 
            'chat_id'=>$admin,
  
              'text'=>"<b>👨‍💻Admin panelga xush kelibsiz./stat-statistika /send habar yuborish</b>",
 
                 'parse_mode'=>"html",
  
   
                   
]);

                   }