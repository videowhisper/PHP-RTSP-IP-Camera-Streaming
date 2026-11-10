# PHP-RTSP-IP-Camera-Streaming

> **Legacy integration reference — November 2026.** This repository contains historical Flash/RTMP/Wowza-era integration code and setup notes. It has not received the security or browser validation of the current HTML5 demos. For managed IP-camera/restream workflows, start with [the current solution](https://consult.videowhisper.com/features/#streaming-features). See [MIGRATION.md](MIGRATION.md). Preserve existing deployments for review; do not install this historical code as a new public demo.


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


[PHP RTSP IP Camera Streaming Demo](https://videowhisper.com/demos/ipcamera/) - For custom ports you need to [contact VideoWhisper support](https://consult.videowhisper.com/) to configure firewall for allowing access to the RTSP streams.


## Installation Instructions for PHP Live Video Streaming Software
 * Before installing, make sure your hosting environment meets all [requirements](https://videowhisper.com/?p=Requirements) . 
 * This edition requires Wowza Streaming Engine 4.2+ to monitor and publish the streams folder.
 * For enabling transcoding for HTML5 HLS / MPEG DASH playback required for iOS/Android delivery, special requirements apply: latest Wowza and FFMPEG with Flash and HTML5 specific codecs. MPEG DASH requires HTTPS.

 1. If you're not hosting RTMP with VideoWhisper (see requirements and turnkey hosting options) go to [RTMP Application Setup](https://videowhisper.com/?p=RTMP+Applications) for installation details
 2. Deploy files to your web installation location. (Example: yoursite.domain/php-rtsp-ip-camera-streaming/)
 3. Fill your RTMP path into settings.php
Give writable directories to the PHP account with the minimum required permissions. Do not use world-writable permissions. Review private/public storage and server access rules before deploying.
 5. To enable transcoding for HTML5 playback, configure HLS / MPEG DASH as per Wowza specs and fill httpstreamer & httpdash setting in settings.php . 
If you have Wowza hosting with VideoWhisper.com, staff can assist with setting this up (plans come with a rtmp address preconfigured for such usage).


This is a simple setup for easy deployment and integration with other PHP scripts. 

For assistance and clarifications, [Contact VideoWhisper](https://consult.videowhisper.com/).


For a more advanced setup, see this turnkey live video broadcasting site solution based on WP, that also includes WebRTC and automated transcoding between all formats and protocols: [Broadcast Live Video](https://broadcastlivevideo.com/) . Live functionality can be tested on [Video Now Live](https://videonow.live/) website.

