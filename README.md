You can use this as a start point for managing a WordPress install with git.

In it's current state, all you need to do is clone this repo, `git submodule update --init` then copy `wp-config-local-sample.php` to `wp-config-local.php` and update your database settings.

See '[Install and manage WordPress with Git](http://davidwinter.me/articles/2012/04/09/install-and-manage-wordpress-with-git/)' for more details.

Local development server can be started via `docker-compose up --build -d`. 
You need to put `127.0.0.1 wordpress.loc` to your `/etc/hosts` (`%WINDIR%/system32/drivers/etc/hosts` on Windows) and access local site at `http://wordpress.loc`.
