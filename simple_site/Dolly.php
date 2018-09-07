<?php
//*spisjeno in wordpress

class Dolly{
	public static $lyrics = "Hello, Dolly
		Well, hello, Dolly
		It's so nice to have you back where you belong
		You're lookin' swell, Dolly
		I can tell, Dolly
		You're still glowin', you're still crowin'
		You're still goin' strong
		I feel the room swayin'
		While the band's playin'
		One of our old favorite songs from way back when
		So, take her wrap, fellas
		Dolly, never go away again 
		Hello, Dolly
		Well, hello, Dolly
		It's so nice to have you back where you belong
		You're lookin' swell, Dolly
		I can tell, Dolly
		You're still glowin', you're still crowin'
		You're still goin' strong
		I feel the room swayin'
		While the band's playin'
		One of our old favorite songs from way back when
		So, golly, gee, fellas
		Have a little faith in me, fellas
		Dolly, never go away
		Promise, you'll never go away
		Dolly'll never go away again";

	public static function hello_dolly_get_lyric() {
		self::$lyrics = explode( "\n", self::$lyrics );
		return  self::$lyrics[ mt_rand( 0, count( self::$lyrics ) - 1 ) ] ;
 }
	public static function get_dolly() {
		$chosen = self::hello_dolly_get_lyric();
		echo "<p id='dolly'>$chosen</p>";
 }

}


?>
