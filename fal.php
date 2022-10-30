<?php 
//programmer : @amirhossein_nb
//my channel : @power_pg
//falgir source v1.0 @ElenLiLCO
//v2coming soon...
define('API_KEY', '5637709917:AAF2Jgf0RG5K8FPtkHFPcvnZW8CRvpNfBZI'); //توکن را ست کنید
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
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
//==========================================
function sendmessage($chat_id, $text){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>$text,
 'parse_mode'=>"MarkDown"
 ]);
 }
 
 function sendphoto($chat_id, $photo, $caption){
 bot('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>$photo,
 'caption'=>$caption,
 ]);
 }
 
 function sendaction($chat_id, $action){
 bot('sendchataction',[
 'chat_id'=>$chat_id,
 'action'=>$action
 ]);
 }
  function sendaudio($chat_id, $audio, $caption,$performer,$title){
 bot('sendaudio',[
 'chat_id'=>$chat_id,
 'audio'=>$audio,
 'caption'=>$caption,
 'performer'=>$performer,
 'title'=>$title
 ]);
 }
 function sendvideo($chat_id, $video, $caption){
 bot('sendvideo',[
 'chat_id'=>$chat_id,
 'video'=>$video,
 'caption'=>$caption,
 ]);
 }
 function save($filename,$TXTdata)
	{
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	fwrite($myfile, "$TXTdata");
	fclose($myfile);
	}
 //======================================
$update = json_decode(file_get_contents('php://input'));
$message = $update->message; 
$chat_id = $message->chat->id;
$text = $message->text;
$message_id = $message->message_id;
$from_id = $message->from->id;
$firstname = $message->from->first_name;
$lastname = $message->from->last_name;
$username = $message->from->username;
$textmessage = isset($update->message->text)?$update->message->text:'';
$rpto = $update->message->reply_to_message->forward_from->id;
$stickerid = $update->message->reply_to_message->sticker->file_id;
$photo = $update->message->photo;
$video = $update->message->video;
$sticker = $update->message->sticker;
$file = $update->message->document;
$music = $update->message->audio;
$voice = $update->message->voice;
$forward = $update->message->forward_from;
$textmessage = isset($update->message->text)?$update->message->text:'';
$ADMIN = 102689256;//آیدی خودتون رو ست کنید
$idbot = falgirpw_bot; //آیدی رباتتون رو ست کنید
$API_KEY = '556098741:AAG6mU4a8b7k3cmnKCDFbUK-V3M5e-C3HV0';//توکن خود را ست کنید
$forchaneel = json_decode(file_get_contents("https://api.telegram.org/bot$API_KEY/getChatMember?chat_id=@power_pg&user_id=".$from_id)); // ایدی کانالتون رو ست کنید
$tch = $forchaneel->result->status;
$type = $update->message->chat->type;
$get = file_get_contents("https://api.telegram.org/bot$API_KEY/getChatMember?chat_id=$chat_id&user_id=".$from_id);
date_default_timezone_set('Asia/Tehran');
$time =  date('h:i:s', time());
$amir = file_get_contents("amir.txt");
$bcpv = file_get_contents("bcpv.txt");
$bcgap = file_get_contents("bcgap.txt");
//=================api================
$mashin = file_get_contents ('https://broozitpw.ml/free_api/mashin.php');
$fal = file_get_contents ('https://broozitpw.ml/free_api/fal.php');
$farzand = file_get_contents ('https://broozitpw.ml/free_api/farzand.php');
$shoghl = file_get_contents ('https://broozitpw.ml/free_api/shoghl.php');
$marg = file_get_contents ('https://broozitpw.ml/free_api/marg.php');
$sang = file_get_contents ('https://broozitpw.ml/free_api/sang.php'); 
//================key=====================
if($type == 'private')
if($tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
  bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"برای فعال شدن ربات ابتدا باید در کانال ما عضو شوید
    @power_pg
    سپس به ربات برگشته و دستور 
    /start
    را بزنید"]);
  }
elseif(($text == '/start' || $text == "/cancel")&& $type == "private"){
$user = file_get_contents('Member.txt');
    $members = explode("\n",$user);
    if (!in_array($chat_id,$members)){
      $add_user = file_get_contents('Member.txt');
      $add_user .= $chat_id."\n";
     file_put_contents('Member.txt',$add_user);
    }	
sendaction($chat_id,'typing');
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"سلام $firstname عزیز به ربات پیشگو تیم
    @ElenLiL
    خوش آمدید
    برای استفاده از ربات از کیبورد زیر استفاده کنید!",
    'reply_markup'=>json_encode([
'keyboard'=>[
    [['text'=>"🔮فال حافظ🔮"]],
    [['text'=>"🏮پیشگویی🏮"]],
    [['text'=>"😂بخش سرگرمی😂"]],
[['text'=>"ارتباط با ما"],['text'=>"دیگر ربات ها"]],
],
'resize_keyboard'=>true
])
    ]);
}
	elseif($text == "ارتباط با ما"){
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"برای ارتباط با ما میتوانید از دکمه های زیر استفاده کنید!",
      'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"سازنده",'url'=>"https://t.me/amirhossein_nb"],['text'=>"کانال ما",'url'=>"http://t.me/power_PG"]
],
[
['text'=>"درباره ربات",'callback_data'=>"a"]
],
],
])
]);
}
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$message_id2 = $update->callback_query->message->message_id;
if($data == "a"){
bot('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
 'text'=>"_بهترین و کاملترین ربات پیشگویی درتلگرام با امکانات بسیار بالا و 100% رایگان!

با این ربات میتوانید به راحتی فال بگیرید و از امکانات فان پیشگویی در اون استفاده کنید.

قدرت گرفته از : @power_pg",
 'reply_markup'=>json_encode([
     'inline_keyboard'=>[
         [['text'=>"بازگشت",'callback_data'=>"back"]],
         ]
         ])
]);
}
if($data == "back"){
bot('editmessagetext',[
'chat_id'=>$chatid,
'message_id'=>$message_id2,
 'text'=>"به منوی قبل بازگشتید",
 'reply_markup'=>json_encode([
     'inline_keyboard'=>[
[['text'=>"سازنده",'url'=>"https://t.me/amirhossein_nb"],['text'=>"کانال ما",'url'=>"http://t.me/power_PG"]],
[['text'=>"درباره ربات",'callback_data'=>"a"]],
],
])
]);
}
elseif ($text == "دیگر ربات ها"){
 bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"لیست ربات های ساخته شده توسط تیم ما",
	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'inline_keyboard'=>[
[['text'=>"🤔یوزر اینفو🤔",'url'=>"https://telegram.me/userinfopw_bot"]],
[['text'=>"🤔تا نوروز چقدر مونده🤔",'url'=>"https://t.me/norozpw_bot"]],
[['text'=>"آنتی اسپم رایگان",'url'=>"https://t.me/antispampw_bot"]],
[['text'=>"کانال ما",'url'=>"https://t.me/power_pg"]],
]
])
 ]);
}
elseif ($text == "بازگشت"){
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"به منو اصلی بازگشتید!",
    'reply_markup'=>json_encode([
'keyboard'=>[
    [['text'=>"🔮فال حافظ🔮"]],
    [['text'=>"🏮پیشگویی🏮"]],
    [['text'=>"😂بخش سرگرمی😂"]],
[['text'=>"ارتباط با ما"],['text'=>"دیگر ربات ها"]],
],
'resize_keyboard'=>true
])
    ]);
}
elseif ($text == "🔮فال حافظ🔮"){
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"به بخش فال حافظ خوش آمدید
    لطفا نیت کنید و برای دریافت فال روی دکمه'نیت کردم'کلیک کنید",
    'reply_markup'=>json_encode([
'keyboard'=>[
    [['text'=>"نیت کردم📿"]],
    [['text'=>"بازگشت"]],
],
'resize_keyboard'=>true
])
    ]);
}
elseif ($text == "🏮پیشگویی🏮"){
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"به بخش پیشگویی خوش آمدید
    با استفاده از منو زیر
    پیشگویی مورد نظر خودتون رو انتخاب کنید!",
    'reply_markup'=>json_encode([
'keyboard'=>[
    [['text'=>"🤔ماشین آیندم چیه؟🚗"]],
    [['text'=>"🤔چجوری میمیرم؟😵"]],
    [['text'=>"🤔شغلم در آینده چیه؟👨🏻‍💻"]],
    [['text'=>"بچم دختر میشه یا پسر؟"]],
    [['text'=>"بازگشت"]],
],
'resize_keyboard'=>true
])
    ]);
}
elseif ($text == "بازگشت به منوی پیشگویی"){
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"به بخش پیشگویی خوش آمدید
    با استفاده از منو زیر
    پیشگویی مورد نظر خودتون رو انتخاب کنید!",
    'reply_markup'=>json_encode([
'keyboard'=>[
    [['text'=>"🤔ماشین آیندم چیه؟🚗"]],
    [['text'=>"🤔چجوری میمیرم؟😵"]],
    [['text'=>"🤔شغلم در آینده چیه؟👨🏻‍💻"]],
    [['text'=>"بچم دختر میشه یا پسر؟"]],
    [['text'=>"بازگشت"]],
],
'resize_keyboard'=>true
])
    ]);
}
elseif ($text == "😂بخش سرگرمی😂"){
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"به بخش سرگرمی خوش آمدید",
        'reply_markup'=>json_encode([
            'keyboard'=>[
                [['text'=>"شبکه های تلویزیون😍✌🏼"]],
                [['text'=>"بازگشت"]],
                ],
                'resize_keyboard'=>true
                ])
                ]);
}
//============apifal=============
if ($text == 'نیت کردم📿' or $text == '/refal'){
		sendAction ($chat_id,'upload_video');
		$videos = $fal;
		$videoss = explode(",",$videos);
		$count2 = count($videoss) -1;
		$rand = rand (1,$count2)-1;
		$v_id = $videoss[$rand];
		bot ('sendVideo',[
		'chat_id'=>$chat_id,
		'video'=>$v_id,
	 'caption'=>"فال شما گرفته شد 
	 با فرستادن فالتون برای بقیه از ما حمایت کنید!
	 تکرار فال (/refal)
---------------
ساعت دریافت فال:$time
---------------
	 @$idbot",
		]);
		}
//==============apimashin=============
elseif ($text == "🤔ماشین آیندم چیه؟🚗"){
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"ماشین آینده شما!👇🏼
    ($mashin)هستش
    ---------------------
    ساعت پیشگویی: $time",
    'reply_markup'=>json_encode([
'keyboard'=>[
        [['text'=>"بازگشت "]],
    [['text'=>"بازگشت به منوی پیشگویی"]],
],
'resize_keyboard'=>true
])
    ]);
}
//===================APIfarzand=============
elseif ($text == "بچم دختر میشه یا پسر؟"){
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"بچه شما در آینده $farzand میشه!
    ---------------------
    ساعت پیشگویی: $time",
    'reply_markup'=>json_encode([
'keyboard'=>[
        [['text'=>"بازگشت "]],
    [['text'=>"بازگشت به منوی پیشگویی"]],
],
'resize_keyboard'=>true
])
    ]);
}
//==================apishoghl================
elseif ($text == "🤔شغلم در آینده چیه؟👨🏻‍💻"){
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"شغل شما در آینده $shoghl هستش!!
    ---------------------
    ساعت پیشگویی: $time",
    'reply_markup'=>json_encode([
'keyboard'=>[
        [['text'=>"بازگشت "]],
    [['text'=>"بازگشت به منوی پیشگویی"]],
],
'resize_keyboard'=>true
])
    ]);
}
//================apimarg==================
elseif ($text == "🤔چجوری میمیرم؟😵"){
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"$marg
    ---------------------
    ساعت پیشگویی: $time",
    'reply_markup'=>json_encode([
'keyboard'=>[
    [['text'=>"توضیحات این بخش"]],
        [['text'=>"بازگشت "]],
    [['text'=>"بازگشت به منوی پیشگویی"]],
],
'resize_keyboard'=>true
])
    ]);
}
elseif ($text == "توضیحات این بخش"){
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"این بخش ربات فقط و فقط جنبه تفریحی و فان دارد!!!
    مرگ هایی که در این بخش اعلام شده حقیقی نیستند
ما برایتان عمری طولانی و با عظت رو آرزومندیم :)"
    ]);
}
//================fun====================
elseif ($text == "/creator"){
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"programmer : @amirhossein_nb
        power by @power_pg
        senatorhost.com"
        ]);
}
elseif ($text == "شبکه های تلویزیون😍✌🏼"){
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"لطفا کانال مورد نظر را انتخاب کنید 🖥",
       'reply_markup'=>json_encode([
	'inline_keyboard'=>[
[['text'=>"شبکه1️⃣",'url'=>"http://cdn1.live.irib.ir:1935/e-tv/tv1-300k.stream/playlist.m3u8?wmsAuthSign=c2VydmVyX3RpbWU9OC8xOC8yMDE2IDk6NTc6NTcgQU0maGFzaF92YWx1ZT0zdnZXY1M5ZG5uSjJzUVBNclFITGtRPT0mdmFsaWRtaW51dGVzPTEw%25%D8%B4%D8%A8%DA%A9%D9%87"],['text'=>"شبکه2️⃣",'url'=>"http://cdn1.live.irib.ir:1935/e-tv/tv2-300k.stream/playlist.m3u8?wmsAuthSign=c2VydmVyX3RpbWU9OC8xOC8yMDE2IDEwOjAwOjQ0IEFNJmhhc2hfdmFsdWU9ZHo5U2YzWGdhS3dab2J0VGg4eTRGQT09JnZhbGlkbWludXRlcz0xMA=="]],
[['text'=>"شبکه3️⃣",'url'=>"http://cdn1.live.irib.ir:1935/e-tv3/tv3-300k.stream/playlist.m3u8?wmsAuthSign=c2VydmVyX3RpbWU9OC8xOC8yMDE2IDEwOjAxOjM5IEFNJmhhc2hfdmFsdWU9NFRHOVE1OXVOYnpyTnFhWHJWQmZydz09JnZhbGlkbWludXRlcz0xMA=="]],
[['text'=>"شبکه4️⃣",'url'=>"http://cdn1.live.irib.ir:1935/e-tv/tv4-300k.stream/playlist.m3u8?wmsAuthSign=c2VydmVyX3RpbWU9OC8xOC8yMDE2IDEwOjAyOjAzIEFNJmhhc2hfdmFsdWU9Z0Y5YXo4N09GOHlTRjl3YzM4dnhJUT09JnZhbGlkbWludXRlcz0xMA==%25%D8%B4%D8%A8%DA%A9%D9%87"],['text'=>"شبکه5️⃣",'url'=>"http://cdn1.live.irib.ir:1935/e-tv/tv5-300k.stream/playlist.m3u8?wmsAuthSign=c2VydmVyX3RpbWU9OC8xOC8yMDE2IDEwOjAyOjAzIEFNJmhhc2hfdmFsdWU9Z0Y5YXo4N09GOHlTRjl3YzM4dnhJUT09JnZhbGlkbWludXRlcz0xMA=="]],
[['text'=>"شبکه خبر🔊",'url'=>"http://cdn1.live.irib.ir:1935/e-tv/irinn-300k.stream/playlist.m3u8?wmsAuthSign=c2VydmVyX3RpbWU9OC8xOC8yMDE2IDEwOjAyOjQ5IEFNJmhhc2hfdmFsdWU9SXJMZ25vL2E1bE5uS2xHTXpqa2JtUT09JnZhbGlkbWludXRlcz0xMA=="]],
[['text'=>"شبکه آموزش〽️",'url'=>"http://cdn1.live.irib.ir:1935/e-tv/amouzesh-300k.stream/playlist.m3u8?wmsAuthSign=c2VydmVyX3RpbWU9OC8xOC8yMDE2IDEwOjA0OjAyIEFNJmhhc2hfdmFsdWU9Q1dkQlowY2hSVFN0NkpFOStuYVgrdz09JnZhbGlkbWludXRlcz0xMA==%25%D8%B4%D8%A8%DA%A9%D9%87"],['text'=>"شبکه قرآن🕋",'url'=>"http://cdn1.live.irib.ir:1935/e-tv/quran-300k.stream/playlist.m3u8?wmsAuthSign=c2VydmVyX3RpbWU9OC8xOC8yMDE2IDEwOjA2OjA0IEFNJmhhc2hfdmFsdWU9eFJCWVJyNlgzWERLQlVaSEFkQmd3UT09JnZhbGlkbWludXRlcz0xMA=="]],
[['text'=>"شبکه مستند🦁",'url'=>'http://cdn1.live.irib.ir:1935/e-tv/mostanad-300k.stream/playlist.m3u8?wmsAuthSign=c2VydmVyX3RpbWU9OC8xOC8yMDE2IDEwOjA2OjUzIEFNJmhhc2hfdmFsdWU9WnBtY1VGbXdyUzlBb3E0b1AzUXl6QT09JnZhbGlkbWludXRlcz0xMA==']],
]
])
 ]);
}
//================panel====================
 if($text == "مدیریت" && $from_id == $ADMIN){
sendaction($chat_id, typing);
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"ادمین عزیز به پنل مدیریتی ربات خودش امدید",
                'parse_mode'=>'html',
      'reply_markup'=>json_encode([
            'keyboard'=>[
              [['text'=>"check pv"]],
              [['text'=>"bc pv"]],
              ],'resize_keyboard'=>true
        ])
            ]);
        }
if($text == "check pv" && $chat_id == $ADMIN){
	sendaction($chat_id,'typing');
    $user = file_get_contents("Member.txt");
    $member_id = explode("\n",$user);
    $member_count = count($member_id) -1;
	sendmessage($chat_id , " تعداد اعضا ربات pv : $member_count" , "html");
}
if($text == "check gap" && $chat_id == $ADMIN){
	sendaction($chat_id,'typing');
    $userr = file_get_contents("gaps.txt");
    $memberr_id = explode("\n",$userr);
    $memberr_count = count($memberr_id) -1;
	sendmessage($chat_id , " تعداد اعضا ربات gap : $memberr_count" , "html");
}
if($text == "bc pv" && $chat_id == $ADMIN){
    file_put_contents("bcpv.txt","bc");
	sendaction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"پیام مورد نظر را در قالب متن بنویسید",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'مدیریت']],
      ],'resize_keyboard'=>true])
  ]);
}
if($bcpv == "bc" && $chat_id == $ADMIN){
    file_put_contents("bcpv.txt","none");
	SendAction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"sended✅",
  ]);
	$all_member = fopen( "Member.txt", "r");
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
			SendMessage($user,$text,"html");
		}
}
if($text == "bc gap" && $chat_id == $ADMIN){
    file_put_contents("bcgap.txt","bc");
	sendaction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"پیام مورد نظر را در قالب متن بنویسید",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'مدیریت']],
      ],'resize_keyboard'=>true])
  ]);
}
if($bcgap == "bc" && $chat_id == $ADMIN){
    file_put_contents("bcgap.txt","none");
	SendAction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"sended✅",
  ]);
	$all_member = fopen( "gaps.txt", "r");
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
			SendMessage($user,$text,"html");
		}
}
    ?>
