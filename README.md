# PHP-RTSP-IP-Camera-Streaming

[PHP RTSP IP Camera Streaming Homepage](https://videowhisper.com/?p=PHP-IP-Camera-Stream)

## Key Features
 * Re-Stream Live Video in Browser
 * Input Existing Streams (RTSP, UDP, RTMP)
 * Output RTMP & HTML5: HLS, MPEG-DASH
 * Serve hundreds/thousands of users with a streaming server
 * Share Channels Link
 * Limit Stream Life (Automated Deletion)
 * Limit Watch Time by Channel, User
 * Simple Setup
 * Easy to Install, Configure
 * Full PHP Source Code
 * Easy to Integrate
 * Transcoding for iOS HLS / Android MPEG DASH playback


[PHP RTSP IP Camera Streaming Demo](https://videowhisper.com/demos/ipcamera/) - For custom ports you need to [contact VideoWhisper support](https://videowhisper.com/tickets_submit.php) to configure firewall for allowing access to the RTSP streams.


## Installation Instructions for PHP Live Video Streaming Software
 * Before installing, make sure your hosting environment meets all [requirements](https://videowhisper.com/?p=Requirements) . 
 * This edition requires Wowza Streaming Engine 4.2+ to monitor and publish the streams folder.
 * For enabling transcoding for HTML5 HLS / MPEG DASH playback required for iOS/Android delivery, special requirements apply: latest Wowza and FFMPEG with Flash and HTML5 specific codecs. MPEG DASH requires HTTPS.

 1. If you're not hosting RTMP with VideoWhisper (see requirements and turnkey hosting options) go to [RTMP Application Setup](https://videowhisper.com/?p=RTMP+Applications) for installation details
 2. Deploy files to your web installation location. (Example: yoursite.domain/php-rtsp-ip-camera-streaming/)
 3. Fill your RTMP path into settings.php
 4. If you don't have SuPHP, enable write permissions (0777) for folders: snapshots, uploads
 5. To enable transcoding for HTML5 playback, configure HLS / MPEG DASH as per Wowza specs and fill httpstreamer & httpdash setting in settings.php . 
If you have Wowza hosting with VideoWhisper.com, staff can assist with setting this up (plans come with a rtmp address preconfigured for such usage).


This is a simple setup for easy deployment and integration with other PHP scripts. 

For assistance and clarifications, [Contact VideoWhisper](https://videowhisper.com/tickets_submit.php).


For a more advanced setup, see this turnkey live video broadcasting site solution based on WP, that also includes WebRTC and automated transcoding between all formats and protocols: [Broadcast Live Video](https://broadcastlivevideo.com/) . Live functionality can be tested on [Video Now Live](https://videonow.live/) website.

