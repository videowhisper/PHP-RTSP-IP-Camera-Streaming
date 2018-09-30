<?php
include("header.php");
include("settings.php");

if (!file_exists($streams_path))
{
?>
<div class="info">
Streams folder missing: <?php echo $streams_path ?>
<BR>Solution requires a folder monitored by rtmp server / tools for streams to connect. Contact VideoWhisper for assistance.
</div>
<?php
	exit;
}

$rtsp = $_POST['rtsp'];
if (!$_POST["username"]||$_POST["username"]=="Studio") $username="Studio".rand(100,999);
else $username=$_POST["username"];

if ($username)
{
	include("incsan.php");
	sanV($username);
}

function url(){
 	 			$protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
 	 			$url = $protocol.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
 	 			if (strstr($url, '.php')) return dirname($url);
 	 			else return $url;
	}



function streamList($name, $file)
{
	global $httpstreamer, $httpdash, $maximumSessionTime;

	$url = url() . '/';

	$ms = 1000 *(time() - filemtime($file));

	if ($maximumSessionTime && $ms > $maximumSessionTime)
	{
		echo 'Cleaning ' . $name . ' ... <BR>';
		//terminate old stream
		unlink($file);
	}
	else
	{
		$age = ceil($ms/60000);

		echo '<br><i>'.$name.'</i> '; echo "($age min) ";
		echo '<a target="_blank" href="'.$url.'channel.php?n='.urlencode($name).'"><b>Watch</b></a> | ';
		echo '<a target="_blank" href="'.$url.'video_small.php?n='.urlencode($name).'">Video</a> | ';
		echo '<a target="_blank" href="'. $httpstreamer . urlencode($name).'/playlist.m3u8">HLS</a> (Safari/VLC) | ';
		echo '<a target="_blank" href="mpeg-dash.php?n=' . urlencode($name).'">MPEG DASH</a> (Chrome) | ';

		echo '<a target="_blank" href="'.$url.'ls_transcoder.php?n='.urlencode($name).'">Transcode</a> (if needed) ';
	}

}

if ($rtsp)
{
	list($firstWord) = explode(':', $rtsp);
	if (!in_array($firstWord, array('rtsp','udp','rtmp','rtmps','wowz','wowzs')))
	{
		echo "Address format not supported ($firstWord). Address should use one of these protocols: rtsp://, udp://, rtmp://, rtmps://, wowz://, wowzs://";
		$rtsp = '';

	}

	if (strstr($rtsp,'[') || strstr($rtsp,'stream-path'))
	{
		echo 'Address should not contain special characters or sample path provided as demo. Insert address exactly as it works in <a target="_blank" href="http://www.videolan.org/vlc/index.html">VLC</a> or other player.';
		$rtsp = '';
	}
}

if ($username && $rtsp && $rtsp!='rtsp://[user:password]@IP:[port]/[stream-path]')
{



	$file = $streams_path . '/' . $username . '.stream';

	$myfile = fopen($file, "w") or die("Unable to write file!");
	fwrite($myfile, $rtsp);
	fclose($myfile);

	?><div class="info">
Stream was setup. Streaming server should publish it shortly.
<?php
	streamList($username.'.stream', $file);
?>
<?php
}
else
{
?>

<div style="padding:20px"><form id="adminForm" name="adminForm" method="post" action="index.php" onSubmit="return censorName()">
  <b>IP Camera Setup: Provide a Label and your Stream Address</b><br>
  <br>

  			<script language="JavaScript">
			function censorName()
			{
				document.adminForm.username.value = document.adminForm.username.value.replace(/^[\s]+|[\s]+$/g, '');
				document.adminForm.username.value = document.adminForm.username.value.replace(/[^0-9a-zA-Z_\-]+/g, '-');
				document.adminForm.username.value = document.adminForm.username.value.replace(/\-+/g, '-');
				document.adminForm.username.value = document.adminForm.username.value.replace(/^\-+|\-+$/g, '');
				if (document.adminForm.username.value.length>2) return true;
				else return false;
			}
			</script>

	  <BR>Stream Label <input name="username" type="text" id="username" value="Studio" size="12" maxlength="12" onChange="censorName()"/>
	  <BR>Stream Address <input name="rtsp" type="text" id="rtsp" value="rtsp://[user:password]@IP:[port]/[stream-path]" size="80" maxlength="250"/>
    <BR>Insert address exactly as it works in <a target="_blank" href="http://www.videolan.org/vlc/index.html">VLC</a> or other player. For increased playback support, H264 video with AAC audio encoded streams should be used. Original address will remain secret (will not be shared with stream viewers). Address should use one of these protocols: rtsp://, udp://, rtmp://, rtmps://, wowz://, wowzs:// . If using a custom port, it needs to be enabled in server firewall (contact server administrator).

    <BR><input type="submit" name="button" id="button" value="Add Stream" onClick="this.disabled=true; censorName(); this.value='Loading...'; adminForm.submit();" />

<?php

	if (strstr($rtmp_server, "://localhost/")) echo "<P class='warning'>Warning: You are using a localhost based rtmp address ( $rtmp_server ). Unless you are just testing this with a rtmp server on your own computer, make sure you fill a <a href='http://www.videowhisper.com/?p=RTMP+Applications'>compatible rtmp address</a> in settings.php.</P>";
?>
	</form></div>

<div class="info">
  <b>Current Streams</b>
  <?php
	foreach (glob($streams_path . '/*.stream') as $file)
	{
		streamList(basename($file), $file);
	}

	if ($maximumSessionTime) echo '<br>Maximum stream age: ' . floor($maximumSessionTime/60000) . ' minutes. Older streams are terminated.';
?>
  </div>



<div class="info">
Channel cleanup:<br />
<?php
	include_once("clean_older.php");
?>
</div>
<?php
}
?>
</BODY>
