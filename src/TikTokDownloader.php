<?php

namespace TikTokDownloader;

class TikTokDownloader {
    private $apiUrl = "https://www.tikwm.com/api/?url=";

    public function getVideo($tiktokUrl) {
        $url = $this->apiUrl . urlencode($tiktokUrl);
        $response = $this->fetchData($url);
        
        if ($response && isset($response['data']['play'])) {
            return [
                'status' => 'success',
                'video_url' => $response['data']['play'],
                'cover' => $response['data']['cover'],
                'author' => $response['data']['author'],
                'title' => $response['data']['title']
            ];
        }

        return ['status' => 'error', 'message' => 'Failed to fetch video'];
    }

    private function fetchData($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response, true);
    }
}
