<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| MIME TYPES
| -------------------------------------------------------------------
| This file contains an array of mime types.  It is used by the
| Upload class to help identify allowed file types.
|
*/
return array(
	'hqx'	=>	array('DWApp/mac-binhex40', 'DWApp/mac-binhex', 'DWApp/x-binhex40', 'DWApp/x-mac-binhex40'),
	'cpt'	=>	'DWApp/mac-compactpro',
	'csv'	=>	array('text/x-comma-separated-values', 'text/comma-separated-values', 'DWApp/octet-stream', 'DWApp/vnd.ms-excel', 'DWApp/x-csv', 'text/x-csv', 'text/csv', 'DWApp/csv', 'DWApp/excel', 'DWApp/vnd.msexcel', 'text/plain'),
	'bin'	=>	array('DWApp/macbinary', 'DWApp/mac-binary', 'DWApp/octet-stream', 'DWApp/x-binary', 'DWApp/x-macbinary'),
	'dms'	=>	'DWApp/octet-stream',
	'lha'	=>	'DWApp/octet-stream',
	'lzh'	=>	'DWApp/octet-stream',
	'exe'	=>	array('DWApp/octet-stream', 'DWApp/x-msdownload'),
	'class'	=>	'DWApp/octet-stream',
	'psd'	=>	array('DWApp/x-photoshop', 'image/vnd.adobe.photoshop'),
	'so'	=>	'DWApp/octet-stream',
	'sea'	=>	'DWApp/octet-stream',
	'dll'	=>	'DWApp/octet-stream',
	'oda'	=>	'DWApp/oda',
	'pdf'	=>	array('DWApp/pdf', 'DWApp/force-download', 'DWApp/x-download', 'binary/octet-stream'),
	'ai'	=>	array('DWApp/pdf', 'DWApp/postscript'),
	'eps'	=>	'DWApp/postscript',
	'ps'	=>	'DWApp/postscript',
	'smi'	=>	'DWApp/smil',
	'smil'	=>	'DWApp/smil',
	'mif'	=>	'DWApp/vnd.mif',
	'xls'	=>	array('DWApp/vnd.ms-excel', 'DWApp/msexcel', 'DWApp/x-msexcel', 'DWApp/x-ms-excel', 'DWApp/x-excel', 'DWApp/x-dos_ms_excel', 'DWApp/xls', 'DWApp/x-xls', 'DWApp/excel', 'DWApp/download', 'DWApp/vnd.ms-office', 'DWApp/msword'),
	'ppt'	=>	array('DWApp/powerpoint', 'DWApp/vnd.ms-powerpoint', 'DWApp/vnd.ms-office', 'DWApp/msword'),
	'pptx'	=> 	array('DWApp/vnd.openxmlformats-officedocument.presentationml.presentation', 'DWApp/x-zip', 'DWApp/zip'),
	'wbxml'	=>	'DWApp/wbxml',
	'wmlc'	=>	'DWApp/wmlc',
	'dcr'	=>	'DWApp/x-director',
	'dir'	=>	'DWApp/x-director',
	'dxr'	=>	'DWApp/x-director',
	'dvi'	=>	'DWApp/x-dvi',
	'gtar'	=>	'DWApp/x-gtar',
	'gz'	=>	'DWApp/x-gzip',
	'gzip'  =>	'DWApp/x-gzip',
	'php'	=>	array('DWApp/x-httpd-php', 'DWApp/php', 'DWApp/x-php', 'text/php', 'text/x-php', 'DWApp/x-httpd-php-source'),
	'php4'	=>	'DWApp/x-httpd-php',
	'php3'	=>	'DWApp/x-httpd-php',
	'phtml'	=>	'DWApp/x-httpd-php',
	'phps'	=>	'DWApp/x-httpd-php-source',
	'js'	=>	array('DWApp/x-javascript', 'text/plain'),
	'swf'	=>	'DWApp/x-shockwave-flash',
	'sit'	=>	'DWApp/x-stuffit',
	'tar'	=>	'DWApp/x-tar',
	'tgz'	=>	array('DWApp/x-tar', 'DWApp/x-gzip-compressed'),
	'z'	=>	'DWApp/x-compress',
	'xhtml'	=>	'DWApp/xhtml+xml',
	'xht'	=>	'DWApp/xhtml+xml',
	'zip'	=>	array('DWApp/x-zip', 'DWApp/zip', 'DWApp/x-zip-compressed', 'DWApp/s-compressed', 'multipart/x-zip'),
	'rar'	=>	array('DWApp/x-rar', 'DWApp/rar', 'DWApp/x-rar-compressed'),
	'mid'	=>	'audio/midi',
	'midi'	=>	'audio/midi',
	'mpga'	=>	'audio/mpeg',
	'mp2'	=>	'audio/mpeg',
	'mp3'	=>	array('audio/mpeg', 'audio/mpg', 'audio/mpeg3', 'audio/mp3'),
	'aif'	=>	array('audio/x-aiff', 'audio/aiff'),
	'aiff'	=>	array('audio/x-aiff', 'audio/aiff'),
	'aifc'	=>	'audio/x-aiff',
	'ram'	=>	'audio/x-pn-realaudio',
	'rm'	=>	'audio/x-pn-realaudio',
	'rpm'	=>	'audio/x-pn-realaudio-plugin',
	'ra'	=>	'audio/x-realaudio',
	'rv'	=>	'video/vnd.rn-realvideo',
	'wav'	=>	array('audio/x-wav', 'audio/wave', 'audio/wav'),
	'bmp'	=>	array('image/bmp', 'image/x-bmp', 'image/x-bitmap', 'image/x-xbitmap', 'image/x-win-bitmap', 'image/x-windows-bmp', 'image/ms-bmp', 'image/x-ms-bmp', 'DWApp/bmp', 'DWApp/x-bmp', 'DWApp/x-win-bitmap'),
	'gif'	=>	'image/gif',
	'jpeg'	=>	array('image/jpeg', 'image/pjpeg'),
	'jpg'	=>	array('image/jpeg', 'image/pjpeg'),
	'jpe'	=>	array('image/jpeg', 'image/pjpeg'),
	'jp2'	=>	array('image/jp2', 'video/mj2', 'image/jpx', 'image/jpm'),
	'j2k'	=>	array('image/jp2', 'video/mj2', 'image/jpx', 'image/jpm'),
	'jpf'	=>	array('image/jp2', 'video/mj2', 'image/jpx', 'image/jpm'),
	'jpg2'	=>	array('image/jp2', 'video/mj2', 'image/jpx', 'image/jpm'),
	'jpx'	=>	array('image/jp2', 'video/mj2', 'image/jpx', 'image/jpm'),
	'jpm'	=>	array('image/jp2', 'video/mj2', 'image/jpx', 'image/jpm'),
	'mj2'	=>	array('image/jp2', 'video/mj2', 'image/jpx', 'image/jpm'),
	'mjp2'	=>	array('image/jp2', 'video/mj2', 'image/jpx', 'image/jpm'),
	'png'	=>	array('image/png',  'image/x-png'),
	'tiff'	=>	'image/tiff',
	'tif'	=>	'image/tiff',
	'css'	=>	array('text/css', 'text/plain'),
	'html'	=>	array('text/html', 'text/plain'),
	'htm'	=>	array('text/html', 'text/plain'),
	'shtml'	=>	array('text/html', 'text/plain'),
	'txt'	=>	'text/plain',
	'text'	=>	'text/plain',
	'log'	=>	array('text/plain', 'text/x-log'),
	'rtx'	=>	'text/richtext',
	'rtf'	=>	'text/rtf',
	'xml'	=>	array('DWApp/xml', 'text/xml', 'text/plain'),
	'xsl'	=>	array('DWApp/xml', 'text/xsl', 'text/xml'),
	'mpeg'	=>	'video/mpeg',
	'mpg'	=>	'video/mpeg',
	'mpe'	=>	'video/mpeg',
	'qt'	=>	'video/quicktime',
	'mov'	=>	'video/quicktime',
	'avi'	=>	array('video/x-msvideo', 'video/msvideo', 'video/avi', 'DWApp/x-troff-msvideo'),
	'movie'	=>	'video/x-sgi-movie',
	'doc'	=>	array('DWApp/msword', 'DWApp/vnd.ms-office'),
	'docx'	=>	array('DWApp/vnd.openxmlformats-officedocument.wordprocessingml.document', 'DWApp/zip', 'DWApp/msword', 'DWApp/x-zip'),
	'dot'	=>	array('DWApp/msword', 'DWApp/vnd.ms-office'),
	'dotx'	=>	array('DWApp/vnd.openxmlformats-officedocument.wordprocessingml.document', 'DWApp/zip', 'DWApp/msword'),
	'xlsx'	=>	array('DWApp/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'DWApp/zip', 'DWApp/vnd.ms-excel', 'DWApp/msword', 'DWApp/x-zip'),
	'word'	=>	array('DWApp/msword', 'DWApp/octet-stream'),
	'xl'	=>	'DWApp/excel',
	'eml'	=>	'message/rfc822',
	'json'  =>	array('DWApp/json', 'text/json'),
	'pem'   =>	array('DWApp/x-x509-user-cert', 'DWApp/x-pem-file', 'DWApp/octet-stream'),
	'p10'   =>	array('DWApp/x-pkcs10', 'DWApp/pkcs10'),
	'p12'   =>	'DWApp/x-pkcs12',
	'p7a'   =>	'DWApp/x-pkcs7-signature',
	'p7c'   =>	array('DWApp/pkcs7-mime', 'DWApp/x-pkcs7-mime'),
	'p7m'   =>	array('DWApp/pkcs7-mime', 'DWApp/x-pkcs7-mime'),
	'p7r'   =>	'DWApp/x-pkcs7-certreqresp',
	'p7s'   =>	'DWApp/pkcs7-signature',
	'crt'   =>	array('DWApp/x-x509-ca-cert', 'DWApp/x-x509-user-cert', 'DWApp/pkix-cert'),
	'crl'   =>	array('DWApp/pkix-crl', 'DWApp/pkcs-crl'),
	'der'   =>	'DWApp/x-x509-ca-cert',
	'kdb'   =>	'DWApp/octet-stream',
	'pgp'   =>	'DWApp/pgp',
	'gpg'   =>	'DWApp/gpg-keys',
	'sst'   =>	'DWApp/octet-stream',
	'csr'   =>	'DWApp/octet-stream',
	'rsa'   =>	'DWApp/x-pkcs7',
	'cer'   =>	array('DWApp/pkix-cert', 'DWApp/x-x509-ca-cert'),
	'3g2'   =>	'video/3gpp2',
	'3gp'   =>	array('video/3gp', 'video/3gpp'),
	'mp4'   =>	'video/mp4',
	'm4a'   =>	'audio/x-m4a',
	'f4v'   =>	array('video/mp4', 'video/x-f4v'),
	'flv'	=>	'video/x-flv',
	'webm'	=>	'video/webm',
	'aac'   =>	'audio/x-acc',
	'm4u'   =>	'DWApp/vnd.mpegurl',
	'm3u'   =>	'text/plain',
	'xspf'  =>	'DWApp/xspf+xml',
	'vlc'   =>	'DWApp/videolan',
	'wmv'   =>	array('video/x-ms-wmv', 'video/x-ms-asf'),
	'au'    =>	'audio/x-au',
	'ac3'   =>	'audio/ac3',
	'flac'  =>	'audio/x-flac',
	'ogg'   =>	array('audio/ogg', 'video/ogg', 'DWApp/ogg'),
	'kmz'	=>	array('DWApp/vnd.google-earth.kmz', 'DWApp/zip', 'DWApp/x-zip'),
	'kml'	=>	array('DWApp/vnd.google-earth.kml+xml', 'DWApp/xml', 'text/xml'),
	'ics'	=>	'text/calendar',
	'ical'	=>	'text/calendar',
	'zsh'	=>	'text/x-scriptzsh',
	'7z'	=>	array('DWApp/x-7z-compressed', 'DWApp/x-compressed', 'DWApp/x-zip-compressed', 'DWApp/zip', 'multipart/x-zip'),
	'7zip'	=>	array('DWApp/x-7z-compressed', 'DWApp/x-compressed', 'DWApp/x-zip-compressed', 'DWApp/zip', 'multipart/x-zip'),
	'cdr'	=>	array('DWApp/cdr', 'DWApp/coreldraw', 'DWApp/x-cdr', 'DWApp/x-coreldraw', 'image/cdr', 'image/x-cdr', 'zz-DWApp/zz-winassoc-cdr'),
	'wma'	=>	array('audio/x-ms-wma', 'video/x-ms-asf'),
	'jar'	=>	array('DWApp/java-archive', 'DWApp/x-java-DWApp', 'DWApp/x-jar', 'DWApp/x-compressed'),
	'svg'	=>	array('image/svg+xml', 'DWApp/xml', 'text/xml'),
	'vcf'	=>	'text/x-vcard',
	'srt'	=>	array('text/srt', 'text/plain'),
	'vtt'	=>	array('text/vtt', 'text/plain'),
	'ico'	=>	array('image/x-icon', 'image/x-ico', 'image/vnd.microsoft.icon'),
	'odc'	=>	'DWApp/vnd.oasis.opendocument.chart',
	'otc'	=>	'DWApp/vnd.oasis.opendocument.chart-template',
	'odf'	=>	'DWApp/vnd.oasis.opendocument.formula',
	'otf'	=>	'DWApp/vnd.oasis.opendocument.formula-template',
	'odg'	=>	'DWApp/vnd.oasis.opendocument.graphics',
	'otg'	=>	'DWApp/vnd.oasis.opendocument.graphics-template',
	'odi'	=>	'DWApp/vnd.oasis.opendocument.image',
	'oti'	=>	'DWApp/vnd.oasis.opendocument.image-template',
	'odp'	=>	'DWApp/vnd.oasis.opendocument.presentation',
	'otp'	=>	'DWApp/vnd.oasis.opendocument.presentation-template',
	'ods'	=>	'DWApp/vnd.oasis.opendocument.spreadsheet',
	'ots'	=>	'DWApp/vnd.oasis.opendocument.spreadsheet-template',
	'odt'	=>	'DWApp/vnd.oasis.opendocument.text',
	'odm'	=>	'DWApp/vnd.oasis.opendocument.text-master',
	'ott'	=>	'DWApp/vnd.oasis.opendocument.text-template',
	'oth'	=>	'DWApp/vnd.oasis.opendocument.text-web'
);