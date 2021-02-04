Code exercise for DEPT

The implementation is fairly crude and given more time I would definetely improve some things - there was a fair bit of googling involved and took me about 5 hours in total so a bit slow I know.

To install download to your sites /modules/custom directory and either use drush 'drush en dept' or switch on usng the drupal interface

On install any users that do not have an auth token will be given one. 

PLEASE NOTE the field AUTH TOKEN is not enabled by default so will need to be added as enabled here /admin/config/people/accounts/form-display this can be added as functionality but ran out of available time.

To test a user login by token I have ONLY added this to the page /dept/updateusers rather than across all pages, so to authenticate a user via token use /dept/updateusers?auth_token=hLjDBkZFwcq1xOX5fAiUrWQ90Mya46RP with one of the valid tokens added to a user on install.

I used a service for the authenticate process.


