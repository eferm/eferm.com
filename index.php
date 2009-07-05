<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="verify-v1" content="i6rrLdy1I329TPHCZy/LvX2W4n6GGVWdR5D9bzDIZcM=" />
		<meta name="verify-v1" content="I+T8GpAAGkUkrGecM4cvTOHQ18/nUsGMm8v6qAtH5BI=" />
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
		<link type="text/css" href="eferm.css" rel="stylesheet" media="screen" />
		<title>Emanuel Ferm - Traces on the web</title>
		<meta name="description" content="I'm Emanuel Ferm, and this is my life on the web." />
	</head>
	<body>
		<div id="distance"></div>
		<div id="header"><a href="mailto:emanuel@eferm.com">
			<span class="hide">Emanuel Ferm</span></a></div>
		<div id="container">
			<div id="left">
				<?php
					$url = "http://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=emore&limit=25&api_key=8502f1c75bbc60c7d3599c90c1f9cab8";
					
					$xml = simplexml_load_file("$url");
					foreach ($xml->recenttracks->track as $track) {
						echo '<p>'.$track->name;
						echo '<br />';
						echo $track->artist;
						echo '<br />';
						$date = $date = preg_split("/[\s,:]+/",$track->date);
						echo '<em>'.$date[1].' '.$date[0].', '.$date[3].':'.$date[4].'</em></p>';
					}
				?>
				<div class="sidefoot_left"></div>
			</div>
			<div id="right">
				<?php
					// require the twitter library
					require "twitterlibphp/twitter.lib.php";
					include('search.php');

					// your twitter username and password
					$username = "ataraxi";
					$password = "losenord45";

					// initialize the twitter class
					$twitter = new Twitter($username, $password);

					// fetch user's timeline in xml format
					$xml = $twitter->getUserTimeline();
					$twitter_status = new SimpleXMLElement($xml);
					foreach ($twitter_status->status as $status) {
						echo '<p>';
						$tweet = toLink($status->text);
						echo $tweet;
						echo '<br />';
						$date = preg_split("/[\s,:]+/",$status->created_at);
						echo '<em>'.$date[1].' '.(0+$date[2]).', '.$date[3].':'.$date[4].'</em></p>';
					}
				?>
				<div class="sidefoot_right"></div>
			</div>
			<div id="content">
				<div class="cell"></div>
				<div class="cell"><a class="facebook" href="http://www.facebook.com/emanuel.ferm">
					<span class="hide">I'm on Facebook.</span></a></div>
				<div class="cell"></div>
				<div class="cell"><a class="ctk" href="http://www.ctk.se/">
					<span class="hide">I'm vice CEO of CTK.</span></a></div>
				<div class="clear"></div>

				<div class="cell"><a class="travel" href="http://exploringthailand.wordpress.com/">
					<span class="hide">I love to Travel.</span></a></div>
				<div class="cell"></div>
				<div class="cell"><a class="reddit" href="http://www.reddit.com/user/Emore/liked/">
					<span class="hide">I read stuff via Reddit.</span></a></div>
				<div class="cell"></div>
				<div class="clear"></div>

				<div class="cell"></div>
				<div class="cell"><a class="twitter" href="http://twitter.com/ataraxi">
					<span class="hide">I regularly use Twitter.</span></a></div>
				<div class="cell"></div>
				<div class="cell"><a class="lastfm" href="http://www.last.fm/user/Emore">
					<span class="hide">The music I love is on Last.fm.</span></a></div>
				<div class="clear"></div>

				<div class="cell"><a class="delicious" href="http://delicious.com/Emore/">
					<span class="hide">Sites I like are on Delicious.</span></a></div>
				<div class="cell"></div>
				<div class="cell"><a class="cv" href="cv.txt">
					<span class="hide">I have a CV.</span></a></div>
				<div class="cell"></div>
				<div class="clear"></div>
			</div>
		</div>
		<div id="footer"></div>
		<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
		</script>
		<script type="text/javascript">
		try {
		var pageTracker = _gat._getTracker("UA-9536087-2");
		pageTracker._trackPageview();
		} catch(err) {}</script>
	</body>
</html>