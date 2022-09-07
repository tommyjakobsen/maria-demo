# maria-demo

This is a test project to create three pods on minishift/openshift. One running mariadb, one running the php frontend and one running phpAdmin.
Variables to connect is exposed to the php-container, so it can logon the database

## Getting Started

These instructions will get you a copy of the project up and running on your openshift/minishift for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

You have to setup minishift on windows with s2i php:5.6 and mariadb , using f.instance virtualbox or such and get the access token
You also have to setup openshift client for windows.
homefolder of minishift.exe and oc.exe needs to be in your PATH env. variable

### Deployment

A step by step series of examples that tell you how to get a development env running

bat script on your windowsmachine running minishift and with oc.exe installed

```
#### WINDOWS
REM variables
echo off
set project=<project name you want to use>
set pwd=<password>
set db=<db-name>
set phpapp=maria-demo
set user=<db-username>
set phpmyadminapp=phpmyadmin
set blowfish_secret=<random string (min 30 char)>
echo on

oc new-project %project%
oc project %project%


echo off
REM  Create the mariadb app
oc new-app    -e MYSQL_USER=%user%     -e MYSQL_PASSWORD=%pwd%     -e MYSQL_DATABASE=%db%  --image-stream=mariadb:latest 

REM Deploying php app
oc new-app --image-stream=php:5.6 https://github.com/tommyjakobsen/maria-demo.git 

REM Exposing env. variables for db- username, password and db-name
oc.exe env dc %phpapp% MYSQL_PASSWORD="%pwd%"
oc.exe env dc %phpapp% MYSQL_USER="%user%"
oc.exe env dc %phpapp% MYSQL_DATABASE="%db%"

REM exposing service through route
oc expose svc/%phpapp%

REM Adding phpMyAdmin for managing the mariadb. use rootpwd to create db's and give access to user 
oc new-app --image-stream=php:7.1 https://github.com/tommyjakobsen/phpmyadmin.git
REM Exposing the service
oc expose svc/phpmyadmin
oc.exe env dc %phpmyadminapp% BLOWFISH="%blowfish_secret%"

#### LINUX

project=<project-name>
pwd=<db-pwd>
db=mariadb
phpapp=maria-demo
user=<db-user>
phpmyadminapp=phpmyadmin
blowfish_secret=<min 30 characters...>

./oc project $project

./oc new-app    -e MYSQL_USER=$user     -e MYSQL_PASSWORD=$pwd     -e MYSQL_DATABASE=$db  --image-stream=mariadb:latest

./oc new-app --image-stream=php:7.2-ubi8 https://github.com/tommyjakobsen/maria-demo.git

./oc set env  deployment maria-demo MYSQL_PASSWORD="$pwd"
./oc set env deployment $phpapp MYSQL_USER="$user"
./oc set env deployment $phpapp MYSQL_DATABASE="$db"

./oc expose svc/$phpapp

./oc new-app --image-stream=php:7.2-ubi8 https://github.com/tommyjakobsen/phpmyadmin.git
./oc expose svc/phpmyadmin
./oc set env deployment $phpmyadminapp BLOWFISH="$blowfish_secret"

```





## Authors

* **Tommy Jakobsen** - *Initial work* 

