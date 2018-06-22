# maria-demo

This is a test project to create two pods on minishift/openshift. One running mariadb and one running the php frontend.
Variables to connect is exposed to the php-container, so it can logon the database

## Getting Started

These instructions will get you a copy of the project up and running on your openshift/minishift for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

You have to setup minishift on windows with s2i php:5.6 and mariadb , using f.instance virtualbox or such and get the access token


### Deployment

A step by step series of examples that tell you how to get a development env running

Say what the step will be

```
REM variables
echo off
set project=<project name you want to use>
set pwd=<password>
set db=<db-name>
set phpapp=maria-demo
set user=<db-username>
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
```





## Authors

* **Tommy Jakobsen** - *Initial work* 

