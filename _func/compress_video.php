<?php

use kcfinder\path;

/**
 * @author [bangameck.dev]
 * @email [rahmad.looker@mail.com]
 * @create date 2021-07-17 09:46:20
 * @modify date 2021-07-17 09:46:20
 * @desc [description]
 */

 function compressVideo($source, $path, $bitrate){

   
   $ffmpeg = FFMpeg\FFMpeg::create();
   $video = $ffmpeg->open('video.mpg');
   $video->filters()->resize(new FFMpeg\Coordinate\Dimension(320, 240))->synchronize();
   $video
       ->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(10))
       ->save('frame.jpg');
   $video
       ->save(new FFMpeg\Format\Video\X264(), 'export-x264.mp4')
       ->save(new FFMpeg\Format\Video\WMV(), 'export-wmv.wmv')
       ->save(new FFMpeg\Format\Video\WebM(), 'export-webm.webm');

 }