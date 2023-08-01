<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: amalesh
 * Date: 5/4/14
 * Time: 8:31 PM
 */
class YoutubeChannel {
	private $API_key = 'AIzaSyDoje2qrBX_Xl7oaHJTBNGYjsm1TLNJvpk';
	private $channelID = 'UCTIws7qIyvgR7uzWdcoYFdQ';
	private $maxResults = 10;


	//YouTube Video ID – $item->id->videoId
	//YouTube Video Publish Date – $item->snippet->publishedAt
	//YouTube Channel ID – $item->snippet->channelId
	//YouTube Video Title – $item->snippet->title
	//YouTube Video Description – $item->snippet->description
	//YouTube Video Thumbnail URL (default size) – $item->snippet->thumbnails->default->url
	//YouTube Video Thumbnail URL (medium size) – $item->snippet->thumbnails->medium->url
	//YouTube Video Thumbnail URL (large size) – $item->snippet->thumbnails->high->url
	//YouTube Channel Title – $item->snippet->channelTitle

	public function getAllVideos() {
//		$videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$this->channelID.'&maxResults='.$this->maxResults.'&key='.$this->API_key.''));
//		log_message('debug', __METHOD__.' Youtube Detail: '.print_r($videoList, true));
		$you_tube_data = array();
		$count = 0;
//		foreach($videoList->items as $item){
//			if(isset($item->id->videoId)){
//				$you_tube_data[$count]['ID'] = $item->id->videoId;
//				$you_tube_data[$count]['Title'] = $item->snippet->title;
//				$you_tube_data[$count]['Description'] = $item->snippet->description;
//				$you_tube_data[$count]['thumbnail'] = $item->snippet->thumbnails->high->url;
//				$count++;
//			}
//		}

		$you_tube_data[$count]['ID'] = 'sR_ENFxSPPw';
		$you_tube_data[$count]['Title'] = 'Dr. Shahnaz Perveen NSW, Sydney, Australia. Topic : Diabetics';
		$you_tube_data[$count]['Description'] = 'Dr. Shahnaz Perveen NSW, Sydney, Australia. Topic : Diabetics';
		$you_tube_data[$count++]['thumbnail'] = 'https://i.ytimg.com/vi/sR_ENFxSPPw/hqdefault.jpg';

		$you_tube_data[$count]['ID'] = 'j9Q4tr314xc';
		$you_tube_data[$count]['Title'] = 'Dr. Shanaz: Asthma/COPD';
		$you_tube_data[$count]['Description'] = 'Dr. Shanaz: Asthma/COPD';
		$you_tube_data[$count++]['thumbnail'] = 'https://i.ytimg.com/vi/j9Q4tr314xc/hqdefault.jpg';

		$you_tube_data[$count]['ID'] = 'yIgR8IlPQyQ';
		$you_tube_data[$count]['Title'] = 'Dr. Salma : Premature Ovarian Failure';
		$you_tube_data[$count]['Description'] = 'Dr. Salma : Premature Ovarian Failure';
		$you_tube_data[$count++]['thumbnail'] = 'https://i.ytimg.com/vi/yIgR8IlPQyQ/hqdefault.jpg';

		$you_tube_data[$count]['ID'] = 'ou6XCd-5uQU';
		$you_tube_data[$count]['Title'] = 'LIVE STREAM: New Normal in Dentistry Conference - South Asia Perspective';
		$you_tube_data[$count]['Description'] = 'LIVE STREAM: New Normal in Dentistry Conference - South Asia Perspective';
		$you_tube_data[$count++]['thumbnail'] = 'https://i.ytimg.com/vi/ou6XCd-5uQU/hqdefault.jpg';

		$you_tube_data[$count]['ID'] = 'mQ3RFl9v9WU';
		$you_tube_data[$count]['Title'] = 'COVID-19 Vaccine: Where We Are?';
		$you_tube_data[$count]['Description'] = 'COVID-19 Vaccine: Where We Are?';
		$you_tube_data[$count++]['thumbnail'] = 'https://i.ytimg.com/vi/mQ3RFl9v9WU/hqdefault.jpg';

		$you_tube_data[$count]['ID'] = 'Lv_bifrPZug';
		$you_tube_data[$count]['Title'] = 'COVID-19 ZOOM Meeting with Pharma Companies';
		$you_tube_data[$count]['Description'] = 'COVID-19 ZOOM Meeting with Pharma Companies';
		$you_tube_data[$count++]['thumbnail'] = 'https://i.ytimg.com/vi/Lv_bifrPZug/hqdefault.jpg';

		$you_tube_data[$count]['ID'] = 'rtjxfxwJVn8';
		$you_tube_data[$count]['Title'] = 'Key to the dental lockdown—Q&A with experts';
		$you_tube_data[$count]['Description'] = 'Key to the dental lockdown—Q&A with experts';
		$you_tube_data[$count++]['thumbnail'] = 'https://i.ytimg.com/vi/rtjxfxwJVn8/hqdefault.jpg';

		$you_tube_data[$count]['ID'] = 'YWsYhYbpUGo';
		$you_tube_data[$count]['Title'] = 'Dengue and Chikungunya';
		$you_tube_data[$count]['Description'] = 'Dengue and Chikungunya';
		$you_tube_data[$count++]['thumbnail'] = 'https://i.ytimg.com/vi/YWsYhYbpUGo/hqdefault.jpg';

		$you_tube_data[$count]['ID'] = 'neIx58-Tl_I';
		$you_tube_data[$count]['Title'] = 'Social Distance vs Isolation vs Quarantine';
		$you_tube_data[$count]['Description'] = 'Social Distance vs Isolation vs Quarantine';
		$you_tube_data[$count++]['thumbnail'] = 'https://i.ytimg.com/vi/neIx58-Tl_I/hqdefault.jpg';

		$you_tube_data[$count]['ID'] = 'q-1TAxlkOvg';
		$you_tube_data[$count]['Title'] = 'How to prevent Corona Virus';
		$you_tube_data[$count]['Description'] = 'How to prevent Corona Virus';
		$you_tube_data[$count++]['thumbnail'] = 'https://i.ytimg.com/vi/q-1TAxlkOvg/hqdefault.jpg';

		$you_tube_data[$count]['ID'] = 'Zfx0--leLt8';
		$you_tube_data[$count]['Title'] = 'Better Health in Ramadan';
		$you_tube_data[$count]['Description'] = 'Better Health in Ramadan.';
		$you_tube_data[$count]['thumbnail'] = 'https://i.ytimg.com/vi/Zfx0--leLt8/hqdefault.jpg';

		return $you_tube_data;
	}
}
?>
