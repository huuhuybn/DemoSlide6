<html>

<body>

<h1>POLY</h1>

<?php


?>

</body>

<h1>Hello</h1>
</html>


<?php

require_once('RDTvideo.php');
$call = new RDTvideo();
echo $call->getVideoLink('https://www.reddit.com/r/funny/comments/d8qo81/baby_crocodiles_sound_like_theyre_shooting_laser/');

echo $call->download('thevideo');
echo $call->videoThumb();

?>

}