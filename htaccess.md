Options +FollowSymLinks

RewriteEngine On

RewriteBase /projet4/

RewriteRule ^admin/ Web/index.php?app=Backend [QSA,L]

RewriteCond %{REQUEST_FILENAME} !-f

RewriteRule ^(.*)$ Web/index.php?app=Frontend [QSA,L]
