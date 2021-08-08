/**
 * @license Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function(config) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';
    config.filebrowserBrowserUrl =
        "http://perparkiran.bangameck.dev/vendor/kcfinder/browse.php?type=files";
    config.filebrowserImageBrowseUrl =
        "http://perparkiran.bangameck.dev/vendor/kcfinder/browse.php?type=images";
    config.filebrowserVideoBrowseUrl =
        "http://perparkiran.bangameck.dev/vendor/kcfinder/browse.php?type=video";
    config.filebrowserFlashBrowseUrl =
        "http://perparkiran.bangameck.dev/vendor/kcfinder/browse.php?type=flash";
    config.filebrowserUploadUrl =
        "http://perparkiran.bangameck.dev/vendor/kcfinder/upload.php?type=files";
    config.filebrowserImageUploadUrl =
        "http://perparkiran.bangameck.dev/vendor/kcfinder/upload.php?type=images";
    config.filebrowserVideoUploadUrl =
        "http://perparkiran.bangameck.dev/vendor/kcfinder/upload.php?type=video";
    config.filebrowserFlashUploadUrl =
        "http://perparkiran.bangameck.dev/vendor/kcfinder/upload.php?type=flash";
    // config.skin = "office2013";
    // config.toolbar = "VideoDetector";
    config.mathJaxLib =
        "//cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML";
    config.mathJaxClass = "my-math";
    // config.fullPage = true;

    config.extraPlugins =
        "pastefromgdocs, docprops, image2, colorbutton, tableresize, youtube, video, codesnippet, pastefromexcel, uicolor, imagerotate, videodetector, pbckcode, bootstrapTabs, mathjax, chart";
};