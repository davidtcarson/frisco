--- Frisco ---
A clean and simple child theme for BuddyPress 1.5+. Frisco uses the BuddyPress default theme as its parent theme. BuddyPress must be active for Frisco to function. Frisco is currently being developed and should be added to the WordPress themes repository shortly after BuddyPress 1.5 is released. 

For help with Frisco, or for more information, please visit the BuddyPress forums, go to http://friscotheme.com/ or go to https://github.com/davidtcarson/frisco.

There is no demo site yet, but I have made some screenshots. See https://s3.amazonaws.com/frisco/screenshot-1.png, https://s3.amazonaws.com/frisco/screenshot-2.png, https://s3.amazonaws.com/frisco/screenshot-3.png, and https://s3.amazonaws.com/frisco/screenshot-4.png

--- Installation ---
Upload and activate the Frisco theme under "Appearance > Themes" menu in your WordPress admin area.


--- Getting Started with Frisco ---
Go to "Appearance > Theme Options" to configure basic options. 

*CHANGING COLORS*
In Theme Options, there are a few basic color choices. If that's not enough, check the Custom Stylesheet box in Theme Options and create a filed called custom.css in the main theme directory to override any theme styles. 

*CHANGING THE TITLE FONT*
Frisco also has Google Web fonts enabled by default. See http://www.google.com/webfonts. 

I'm only using a Google Web font on the title in the header, but you can use it for anything you like. To add your own Google font, go to line 7 of functions.php and look for the "add_googlefonts" function. On the next line, you'll see a URL for the Google Web font currently enabled, ex. "http://fonts.googleapis.com/css?family=Lobster+Two&v2". Pick your Google font(s) and replace the Google URL with your new one. 

Then change the CSS in style.css so that it uses the proper font. 


*USE THE NEW ADMIN BAR IN BUDDYPRESS*
There's a new admin bar coming to BuddyPress 1.5. To use that new admin bar on your development site, add the following line to your wp-config.php file in your root directory: 

define('BP_USE_WP_ADMIN_BAR', true);


*MORE INFO COMING SOON*

Frisco is in its infancy. And it should be improving drastically in the coming days and weeks before it makes it into the WordPress theme repository. Help me test it by following its development at https://github.com/davidtcarson/frisco

--- Credits ---
Google Web Fonts - http://www.google.com/webfonts
Lobster 2 Font by Pablo Impallari - https://plus.google.com/114391601624281927771/about

--- Changelog ---
.01 Basic functionality