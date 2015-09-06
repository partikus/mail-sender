# Mail-Sender

This training app has created in order to find out new approach in builid


## Development - Getting started

If you want to start develop this app then you need to prepare dev environment. In order to simplify this process and speed up joining new member we prepared vagrant configuration.

More here: [https://github.com/php-refactor/mail-sender-vagrant/](https://github.com/php-refactor/mail-sender-vagrant/)

```bash
# go to your app root dir and clone vagrant config
git clone git@github.com:php-refactor/mail-sender-vagrant.git vagrant
cd vagrant && vagrant up

# import database
vagrant ssh 
cd /var/www/mail-sender
mysql -u root mail-sender < mail-sender.sql
```
And at the end you have to add the following line into ``etc/hosts`` file:
```
10.0.0.200  mail-sender.dev
```

After all steps you should be able to see [http://mail-sender.dev/mail_sender.php](http://mail-sender.dev/mail_sender.php)