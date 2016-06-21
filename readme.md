Authoring Tool Web Frontend  
implemented by William Black (wrblack@g.clemson.edu)  
HTML5/CSS3/PHP5  
using Bootstrap CSS framework and bits of JavaScript  

Purpose:  
The purpose of these pages are for a student to view and manage their courses, attendance, and profile.  

//////////////////////////////////////////////////////////////////////////////////////////////////////////  
files:  
css  
--  
  |  
  |--bootstrap*.css (necessary css files for styling)]  
  |  
  |--clemson.css (custom button styling in clemson colors)  
  |  
  |--dashboard.css, navbar.css, register.css, signin.css (custom stylings for these pages)  
  
fonts (fonts necessitated by bootstrap)  

js (jscript files needed by bootstrap including jquery and npm)  

//////////////////////////////////////////////////////////////////////////////////////////////////////////  
pages:  
add_course.php  
attendance.php (dashboard attendance displays values for student)  
beacons.php (not used)  
courses.php (dashboard courses displays courses student is taking)  
dashboard.php (the main working area)  
db_config.php (database configuration)  
login.php (PHP logic for signin.html)  
logout.php (PHP logic for signing out of profile and MySQL server)  
profile.php  
register.php (Registers new student user)  
signin.html (First point of entry for users, think of it as a login)  
//////////////////////////////////////////////////////////////////////////////////////////////////////////  
Set up:  
Change the necessary configuration for db_config.php:  
user, password, database, server  
  
Requires a MySQL server that can serve PHP5.  
  
Can test page with example SQL database file cpsc399loginapp.sql  
  
