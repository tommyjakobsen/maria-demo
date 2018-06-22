# maria-demo
demo of mariadb on openshift


script to create the app on windows


REM variables

echo off
set project=<project name>
set pwd=<password>
set db=<database name>
set phpapp=maria-demo
set user=<dbuser name>
echo on

oc new-project %project%

oc project %project%


echo off

REM Create the mariadb app

oc new-app    -e MYSQL_USER=%user%     -e MYSQL_PASSWORD=%pwd%     -e MYSQL_DATABASE=%db%  --image-stream=mariadb:latest 

REM Deploying php app

oc new-app --image-stream=php:5.6 https://github.com/tommyjakobsen/maria-demo.git 

REM Exposing env. variables for db- username, password and db-name

oc.exe env dc %phpapp% MYSQL_PASSWORD="%pwd%"
oc.exe env dc %phpapp% MYSQL_USER="%user%"
oc.exe env dc %phpapp% MYSQL_DATABASE="%db%"

REM exposing service through route

oc expose svc/%phpapp%
