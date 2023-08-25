USAGE
=====
location module:
-------------------
Location modules create an entity names as City. Cities can be added, edited and deleted. Viewing city details is not implmented.
Listing of cities can be found at https://<domain name>/admin/location/cities

location_migration module:
--------------------------
This module provides migration configuration files. When it is enables it creates a migration group and two separate migrations under that:
1. City to title field migration.
2. City to City field migration.
Th migration group can be found at https://<domain name>/admin/structure/migrate
Drush commands has been given in README file inside the module.