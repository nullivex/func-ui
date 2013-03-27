func-ui
=======

User Inteface (UI) helper functions for OpenLSS web frameworks

Usage
----
```php
//save an alert to be displayed
alert('The process failed',false);

//redirect user to new page
redirect('http://google.com');
```

Reference
----

### (bool) alert($msg,$success=true,$delayed=false)
  * $msg		The message to be displayed
  * $success	TRUE = success, FALSE = error, NULL = notice
  * $delayed	When TRUE alert is saved to a session to be displayed after a redirect

### (void) redirect($url)
301 Redirect user to new URL
WILL HALT OPERATION OF THE SCRIPT

