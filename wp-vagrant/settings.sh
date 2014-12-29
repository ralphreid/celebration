#!/usr/bin/env bash


###############################################################################
# Basic settings
#

# set install_wordpress to true to download and install latest version of WP
install_wordpress=false

# WordPress version to install (if install_wordpress=true)
# if blank, then current stable version will be installed
# wp_version="3.5.2"
# wp_version="4.0-beta1"
wp_version=""

# specify path (inside the Vagrant VM) to WordPress to allow wp-cli to do search and replace
# this will normall be /vagrant unless you've made other config changes
wp_path='/vagrant'

#mysql root password
mysql_root_password='root'


###############################################################################
# WP database
#

# name of database: eg wordpress
wp_db_name='celebration_db'

# database user name
wp_db_user='wp-dev'

# database password
wp_db_password='1234'

###############################################################################
# WP admin / install
#

wp_admin_user=''

wp_admin_password=''

wp_admin_email=''

wp_site_title=''



###############################################################################
# Importing database
#

# set to true to import the database as part of the provisioning process
import_database=true

# specify the domain that the imported dump file uses.
# This allows us to search and replace the domain with nginx.local
# eg: mysite.com
import_site_domain='nginx.local'
