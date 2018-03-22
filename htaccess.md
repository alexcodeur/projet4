Options +FollowSymLinks

RewriteEngine On

RewriteBase /projet4/

RewriteRule ^admin/ Web/index.php?app=Backend [QSA,L]

RewriteCond %{REQUEST_FILENAME} !-f

RewriteRule ^(.*)$ Web/index.php?app=Frontend [QSA,L]

Redirect /projet4/www.facebook.com https://www.facebook.com
Redirect /projet4/www.twitter.com https://www.twitter.com
Redirect /projet4/www.instagram.com https://www.instagram.com
Redirect /projet4/admin/www.facebook.com https://www.facebook.com
Redirect /projet4/admin/www.twitter.com https://www.twitter.com
Redirect /projet4/admin/www.instagram.com https://www.instagram.com
