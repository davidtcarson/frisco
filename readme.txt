--- Frisco ---
A clean and simple child theme for BuddyPress 1.5+. Frisco uses the BuddyPress default theme as its parent theme. BuddyPress must be active for Frisco to function. Frisco is currently being developed and should be added to the WordPress themes repository shortly after BuddyPress 1.5 is released. 

For help with Frisco, or for more information, please visit the BuddyPress forums, go to http://friscotheme.com/ or go to https://github.com/davidtcarson/frisco.

There is no demo site yet, but I have made some screenshots. See https://s3.amazonaws.com/frisco/screenshot-1.png, https://s3.amazonaws.com/frisco/screenshot-2.png, https://s3.amazonaws.com/frisco/screenshot-3.png, and https://s3.amazonaws.com/frisco/screenshot-4.png

--- Installation ---
Upload /frisco/ to your themes directory in wp-content/themes/ and activate the theme under "Appearance > Themes" menu in your WordPress admin area.


--- Getting Started with Frisco ---


*CUSTOMIZING THE STYLE*
The main stylesheet is located in the root directory at style.css. But there is a secondary stylesheet located in /css/styles.less. 

Why the secondary stylesheet? The LESS CSS framework has been integrated into the theme to make it very easy to customize the color scheme of Frisco by chaninging a single line of CSS. For more info about the LESS CSS framework, go to http://lesscss.org/. 

Ready to see it in action? After you've activated the theme, go to line 7 of /css/styles.less. 

You should see something like the following: 

@color: #098ac6;

Edit the "098ac6" to any color you'd like. For example, change it to "00b2d9" or "333". Don't forget to leave the pound sign in there.

Save /css/styles.less after you changed the @color value. And then refresh your BuddyPress website. You should now see the theme with a color scheme derived from the value you assigned to @color. 

For more about how LESS CSS works, go to http://lesscss.org/#docs. 


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
LESS CSS - The dynamic stylesheet language. http://lesscss.org/
Google Web Fonts - http://www.google.com/webfonts
Lobster 2 Font by Pablo Impallari - https://plus.google.com/114391601624281927771/about

--- Changelog ---
.01 Basic functionality