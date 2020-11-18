<h1 alignment="center"> Installation </h1>

* init project

```bash
php init
=> 0
=> yes
=> go to config database
=> php yii migrate
```

* config database 

```text
'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=db_name_here',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
]
```

* httpd-vhosts.conf

```text
<VirtualHost *:80>
  ServerName frontend.test
  DocumentRoot "/path/frontend/web"

  <Directory "/path/frontend/web">
    # use mod_rewrite for pretty URL support
    RewriteEngine on
    # If a directory or a file exists, use the request directly
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    # Otherwise forward the request to index.php
    RewriteRule . index.php
    # use index.php as index file
    DirectoryIndex index.php
     # ...other settings...
   </Directory>

</VirtualHost>

<VirtualHost *:80>
  ServerName backend.test
  DocumentRoot "/path/backend/web"
           
  <Directory "/path/backend/web">
    # use mod_rewrite for pretty URL support
    RewriteEngine on
    # If a directory or a file exists, use the request directly
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    # Otherwise forward the request to index.php
    RewriteRule . index.php

    # use index.php as index file
    DirectoryIndex index.php

    # ...other settings...
   </Directory>
</VirtualHost>
```

* etc/hosts

```text
127.0.0.1 frontend.test
127.0.0.1 backend.test
```

