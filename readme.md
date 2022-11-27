# ReST API using  flight php framework

Flight micro framework website [Official](https://flightphp.com/)

## Todo:
- [x] Find How to using .env file in this framework
- [x] Connect to database using .env parameter
- [ ] Create data to database using post method
- [ ] Show data from database using get method
- [ ] Show data from database by 1 parameter
- [ ] show data from database by more 1 parameter
- [ ] Update data in database using put method
- [ ] Delete data from database using delete method
- [ ] Find a way to avoid directory listing

## What i learn from this project:
- Enable php for apache2
  When i run my machine, the browser can not render file that contain phpinfo()
  So, i install the package that enable php for apache2:
  `sudo apt install libapache2-mod-php`
- Enabling web server to override the configuration by using .htaccess file
  1. Edit the apache2 conf
    `sudo nano /etc/apache2/apache2.conf`
    Replace the AllowOverride None to AllowOverride All
    ```
    <Directory /var/www/>
            Options Indexes FollowSymLinks
            AllowOverride All
            Require all granted
    </Directory>
    ```
  2. Enable rewrite modul
    `sudo a2enmod rewrite` 
  3. Restart the apache
    `sudo service apache2 restart`