=== Simple Buzz ===
Contributors: abmirayo
Tags: google, buzz, social, google buzz
Requires at least: 2.0.2
Tested up to: 2.9
Stable tag: 0.6

Simply displays to the visitor the last Google Buzz status updates of a Google user.

== Description ==

Simply displays to the visitor the last Google Buzz status updates of a Google user.

Usage: Insert anywhere in your theme the function `<?php simple_buzz('ID_of_user', number_of_posts_to_show) ?>` (Number of posts is optional [default=1]). If number of posts is larger than 1, they will be displayed in an unordered list. 

== Installation ==

Install it automatically from Wordpress or do the following:

1. Unzip the archive and put the 'simple-buzz' folder in your Wordpress plugins folder (wp-content/plugins)

2. Activate the plugin.

= Usage =

Insert the code in your theme:

	<?php simple_buzz('ID_of_user', number_of_updates_to_show) ?>

Where ID_of_user is the ID of the desired Google Buzz user. If you haven't configured the URL of your Google profile, your ID will be the number in your Google profile URL: http://www.google.com/profiles/{number} . You can access your Google profile from Google Buzz, clicking Profile. You can configure the URL of your profile in 'Edit Profile', and at the bottom, select the suggested URL option. Once you configure it, you can use the previous number or the new nickname.

Other way to know your user ID is to go to http://www.google.com/profiles/me . Wait until you're redirected to your Google profile. Your user ID is what is after '/profiles/' in the URL. 

Number_of_updates_to_show is optional and is set by default to 1. If you set any number larger than 1, it will echo an unordered list with the last N status updates.

Examples: 

	<?php simple_buzz('conandoyle', 3) ?>

	<?php simple_buzz('1233330983098293', 4) ?>

	<?php simple_buzz('conandoyle') ?>

== Changelog ==

= 0.6 =
* NEW: Added feature of displaying more than one last status update.
* FIXED: Div tag is no longer surrounding the status.

= 0.5 =
* First release
