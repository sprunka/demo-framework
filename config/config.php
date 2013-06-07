<?php
/** Set up the Server TimeZone. **/
define('DATE_TIMEZONE', 'America/New_York');

/** Configuration Variables **/
//TRUE for development, FALSE for production.
define('DEVELOPMENT_ENVIRONMENT', true);
//For developer Debugging, set to true
define('DEBUG', true);
//Maximum age of a temp file before deleting, in minutes. Set to false or 0 to never delete.
define('MAX_FILE_AGE', 60 * 24);
//Name of "project"
define('PROJECT_NAME', 'Demo Framework');
//Name of Application
define('PRODUCT_NAME', 'sample');
//
define('TMP_PATH','C:' . DS . 'Users' . DS . 'prunkas' . DS . 'Documents' . DS . 'GitHub' . DS . 'demo-framework' . DS . 'tmp');
//Footer message
define(
    'FOOTER_MESSAGE',
    '<a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/">'.
    '<img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-sa/3.0/88x31.png" />'.
    '</a><br />'.
    'This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/">'.
    'Creative Commons Attribution-ShareAlike 3.0 Unported License</a>.'
);

/** Define constants for Render boolean. **/
define('RENDER_HEADER', true);
define('DONT_RENDER_HEADER', false);

/** not used at this time **/
define('PAGINATE_LIMIT', '5');

/** Add vendor to the include path **/
set_include_path(get_include_path().PATH_SEPARATOR.'../vendor/');
