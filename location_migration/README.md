REQUIREMENTS
============
Need to install contrib modules Migrate Plus and Migrate Tools.

USAGE
=====
Enable the module, check status, import all migration (Example: cities) and rollback with Drush

drush en location_migration
drush migrate-status

Import migration: (migration name: city_to_city)
-----------------
drush migrate-import city_to_city

Rollback migration: (migration name: city_to_city)
-------------------
drush migrate-rollback city_to_city
