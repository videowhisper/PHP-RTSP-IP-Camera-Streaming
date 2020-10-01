It's a very amazing and useful code.
<?php

$rtmp_server = "rtmp://localhost:1935/videowhisper-ip";
// rtmp://your-server-ip-or-domain/application

$streams_path = "/home/account/public_html/streams";
// path monitored by rtmp server or tools for .stream files

$rtmp_amf = "AMF3";
// AMF3 : Red5, Wowza, FMIS3, FMIS3.5
// AMF0 : FCS1.5, FMS2
// blank for flash default


$ban_names=Array("ban_name1", "ban_name2");
//ban channel or user names

$httpstreamer = "http://localhost:1935/videowhisper-ip/";
//path for HTTP Live Streaming usually available with Wowza hosting if packetizers are enabled
//use http://www.videowhisper.com/?p=Wowza+Media+Server+Hosting or see http://www.wowza.com/forums/content.php?217#cupertinostreaming

$httpdash = "http://localhost:1935/videowhisper-ip/";
//path for MPEG-DASH streaming usually available with Wowza hosting if packetizers are enabled
//use http://www.videowhisper.com/?p=Wowza+Media+Server+Hosting or see https://www.wowza.com/forums/content.php?508-How-to-do-MPEG-DASH-streaming

//usage limit (per channel and per viewer)
//default 2 hours per week limit
$maximumSessionTime=7200000; //7200000 ms = 2h; 0 for unlimited
$resetTime = 7 * 3600 * 24; //weekly
$limitChannel=1; //counts total channel time (sum of time online for viewers)
$limitUser=1; //counts total view time per user (watching all channels)

?>
