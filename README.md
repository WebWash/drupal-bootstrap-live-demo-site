# Drupal LIVE Site Build Demo Site

This is a demo Drupal site which was built in the [Drupal Live Site Build (Using Bootstrap)](https://www.youtube.com/playlist?list=PLL73GOh1BF-l3EoSLA9wb0888n7ybc4ER) video series.

**WARNING: THIS SITE SHOULD NOT BE USED IN PRODUCTION. USE AT YOUR OWN RISK. UPGRADES WILL NOT BE SUPPORTED.**

## Installation

This site can be set up in two ways: using [Lando](https://docs.lando.dev/basics/installation.html) or custom LAMP/MAMP/XAMPP.

### Option 1: Set up using Lando

1. Download and Install [Lando](https://docs.lando.dev/basics/installation.html).

2. Clone this repository.

3. Run `lando start` from within the repository.

4. Run `lando install-drupal` command. This will install Drupal using the configuration files within `config/sync`.

5. Then log into the site (go to `/user/login`): username: `admin` and password: `admin`.

### Option 2: Set up using Custom Stack

1. Clone this repository.

2. Run `composer install` from within the cloned repository.

3. Go open `web/sites/default/settings.local.php` and scroll to the bottom and modify the `$databases` array for custom set up

```php
$databases['default']['default'] = array (
  'database' => 'drupal8',
  'username' => 'root',
  'password' => 'drupal8',
  'prefix' => '',
  'host' => 'localhost',
  'port' => '3306',
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'driver' => 'mysql',
);
```

Make sure you enter in the correct database, username, password and host.

4. Then install the site by running: `./vendor/bin/drush site-install -y --account-pass=admin --existing-config`

6. Then log into the site (go to `/user/login`): username: `admin` and password: `admin`.

## FAQs

#### Q: I ran `lando install-drupal` and got the error below?

```
$ lando install-drupal

 // You are about to CREATE the 'drupal' database. Do you want to continue?: yes.

 [warning] Failed to drop or create the database. Do it yourself before installing. ERROR 2003 (HY000): Can't connect to MySQL server on '127.0.0.1' (111 "Connection refused")

 [notice] Starting Drupal installation. This takes a while.

In install.core.inc line 974:

  Resolve all issues below to continue the installation. For help configuring your database server, see the <a href="https://www.drupal.org/docs/8/install">installation handbook</a>, or contact your hosting provider.<div class="item-list"><ul><li>Failed
   to connect to your database server. The server reports the following message: <em class="placeholder">SQLSTATE[HY000] [2002] Connection refused</em>.<ul><li>Is the database server running?</li><li>Does the database exist or does the database user hav
  e sufficient privileges to create the database?</li><li>Have you entered the correct database name?</li><li>Have you entered the correct username and password?</li><li>Have you entered the correct database hostname and port number?</li></ul></li></ul>
  </div>
```

A: This means that Drush can't connect to the database.

Open `web/sites/default/settings.local.php` and make sure the `$databases` array is using the credentials below:

```php
$databases['default']['default'] = array (
  'database' => 'drupal8',
  'username' => 'drupal8',
  'password' => 'drupal8',
  'prefix' => '',
  'host' => 'database',
  'port' => '3306',
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'driver' => 'mysql',
);
```

- database: drupal8
- username: drupal8
- password: drupal8
- host: database
