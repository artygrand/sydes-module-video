<?php
$defaults = array(
	'width' => 220,
	'height' => 140,
);
$args = array_merge($defaults, $args);

$stmt = $this->db->query("SELECT * FROM video WHERE status = 1 ORDER BY 'position'");
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

$result = array();

foreach ($data as $item){
	// if vimeo
	if (strpos($item['url'], 'vimeo') !== false){
		preg_match('/vimeo.com\/([0-9]*?)/isU', $item['url'], $parts);
		$video = unserialize(file_get_contents('http://vimeo.com/api/v2/video/' . $parts[1] . '.php'));
		
		$result[] = array(
			'title' => !empty($item['title']) ? $item['title'] : $video[0]['title'],
			'src' => 'https://player.vimeo.com/video/' . $parts[1] . '?autoplay=1',
			'img' => $video[0]['thumbnail_medium']
		);
		
	}
	// if youtube
	elseif (strpos($item['url'], 'youtu') !== false){

		if (strpos($item['url'], 'youtube') !== false){
			$regex = '/v=([a-zA-Z0-9_-]{11}?)/isU';
		} elseif (strpos($item['url'], 'youtu.be') !== false){
			$regex = '/youtu\.be\/([a-zA-Z0-9_-]{11}?)/isU';
		}

		preg_match($regex, $item['url'], $parts);
		
		$result[] = array(
			'title' => $item['title'],
			'src' => 'https://www.youtube.com/embed/' . $parts[1] . '?wmode=transparent&rel=0&fs=1&autoplay=1',
			'img' => 'http://i2.ytimg.com/vi/' . $parts[1] . '/hqdefault.jpg'
		);
	}
}