Login Authenticator with register new user functionality.

Version 0.1 (pre-actual release)

Written by Kevin Kubit

Currently had it working with sessions but switched to cookies and broke it.  

BIG BUGS:
*Tracking login via cookie isnt working, it lets you view pages without the necessary cookie, so the logout doesnt work

Current bugs and needs:
*shortcode for sessions to insert on protected pages
*Captcha or are you human detection for the register new user form
*templates to make it look nicer
*Add functionality for users that forget password, assigning temporary 
	link for user to select after getting link in the email they registered with
*Add functionality to change password
*Add functionality to accept email address and check addresses validity as well 
	as possibility to change email address
*insert Taylors sanitize functions
*modify to work as a plugin for wordpress so users can protect pages by login
