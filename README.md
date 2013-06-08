demo-framework
==============

A very lightweight MVC framework originally crafted from a tutorial
This sample framework has been heavily modified from the original tutorial I'd found (and sadly cannot find again to credit/blame.)
It should be PSR compliant up to and including PSR-2. (Though admittedly, there have been several edits since I last ran the code sniffer to test for comliance.)

Please feel free to subject it to a peer review and find faults, it's how I can learn.
Additionally, please feel free to use it a starting point for your own projects that need only the barest of bare bones skeletal frameworks.

Thanks.

[![Creative Commons License](http://i.creativecommons.org/l/by-sa/3.0/88x31.png)][0]  
This work is licensed under a [Creative Commons Attribution-ShareAlike 3.0 Unported License][0].

## Installation

* Clone this repo. Record the path (referred to later in this document as `PROJECT_HOME`)
  * owner of the repo's directory can be anyone. Permissions should be set 755 for all directories and 644 for all files.
  * There is also a "tmp" directory for log files and the files used during a search. This directory should be writable by the apache group.
    * `chown -R root:apache tmp/`
    * `chmod -R 775 tmp/`
* Run `composer update`.
  * Autoloading is handled by [Composer](http://getcomposer.org).
  * For installation and usage instructions, please refer to the [Composer documentation](http://getcomposer.org/doc/00-intro.md#system-requirements).
* Edit `PROJECT_HOME/config/config.php` to reflect the changes appropriate to the installation environment.
  * the DS used throughout this file is a platform agnostic way of using a directory separator.
    * In a Linux environment, a forward slash "/" can be used instead, for ease of copying and pasting paths.
    * In a Windows environment, a backslash (escaped by another backslash) "\\" can be used. 
* Edit your Apache config (or add/edit the alias file) to include the following: (where `PROJECT` is defined as the root path of the application

```
Alias /PROJECT "PROJECT_HOME/public/" 

<Directory "PROJECT_HOME/public/">
    Options Indexes FollowSymLinks MultiViews
    AllowOverride all
        Order allow,deny
    Allow from all
</Directory>
```

* Restart your Apache httpd server.
* Test the set up.

[0]: http://creativecommons.org/licenses/by-sa/3.0/
