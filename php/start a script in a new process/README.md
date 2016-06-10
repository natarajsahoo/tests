# Start a script in a new process

- The following (case-1) doesn’t work:

```
#!php

exec("nohup path/to/php path/to/script run_time_arguments &")
```
: Ex:

```
#!php

exec("nohup /usr/bin/php /var/www/phoenixrobotix/_jobs/trade_alerts/send_alerts.php ".$message_from_sqs." ".$message_receipt_handle." &")
```
: In this case the parent process waits until the child process is finished.

- Use the following (case-2) instead:

```
#!php

exec("path/to/php path/to/script run_time_arguments > /dev/null 2>&1 &")
```
: Ex:

```
#!php

exec("php 2.php Ok > /dev/null 2>&1 &")
```
1. ```>> /dev/null``` redirects standard output (```stdout```) to ```/dev/null```, which discards it.hich discards it.  
(The ```>>``` seems sort of superfluous, since ```>>``` means append while ```>``` means truncate and write, and either appending to or writing to ```/dev/null``` has the same net effect. I usually just use ```>``` for that reason.)
2. ```2>&1``` redirects standard error (```2```) to standard output (```1```), which then discards it as well since standard output has already been redirected.

## Test performed

### Procedure:
1. Place the scripts 1.php and 2.php in one folder
2. Run 1.php and it will start 2.php in a new process

#### How to make sure that the script 2.php executed successfully?
It will create a new file test.txt in the original folder (after the sleep duration-10 sec.s) and write the current time to it in the following format: 09/06/2016-22:35:49

### Case-1:
1. Run 1.php
2. Initially 'started_parent' is printed to the terminal
3. Then the script waits until 2.php is finished executing
4. Then 'finished_parent' is printed to the terminal
5. 1.php is finished and control returns back to the terminal

### Case-2:
1. Run 1.php
2. Initially 'started_parent' is printed to the terminal
3. Then the script 2.php is started in another process and the parent script 1.php continues to execute normally being independent of the script 2.php
4. Then 'finished_parent' is printed to the terminal
5. 1.php is finished and control returns back to the terminal
