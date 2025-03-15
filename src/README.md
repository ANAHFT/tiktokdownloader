How to install the library:

composer require ANAHFT/tiktokdownloader


------------------------------------
------------------------------------


How to use the code:

require 'vendor/autoload.php';

use TikTokDownloader\TikTokDownloader;

$downloader = new TikTokDownloader();
$tiktokUrl = "https://www.tiktok.com/@username/video/1234567890";
$result = $downloader->getVideo($tiktokUrl);

if ($result['status'] === 'success') {
    echo "رابط الفيديو: " . $result['video_url'];
} else {
    echo "حدث خطأ: " . $result['message'];
} 
