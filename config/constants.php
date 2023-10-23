<!-- COLOR STYLE

JET - #343434
DELFT BLUE - #2F3061 
EGYPTION BLUE - #0E34A0
ULTRA VIOLET - # 5F5980
PLATINIUM - #DFDFDF

-->

<?php

define('DSN', 'mysql:host=localhost;dbname=rentmyride');
define('USER', 'rentmyride_admin');
define('PWD', '*osxDiN74L(.Pb-!');
define('REGEX_TYPE', "/^[0-9a-zA-Zàâçéèêëîïôûùüÿñæœ .-]*$/");
define('REGEX_MODEL', "/^[0-9a-zA-Z .-]*$/");
define('REGEX_REGISTRATION', "/^[a-zA-Z]{2}[-][0-9]{3}[-][a-zA-Z]{2}$/");
define('REGEX_MILEAGE', "/^[0-9 .-]*$/");
define('VALID_EXTENSIONS', ['image/png', 'image/jpeg']);
define('FILE_SIZE', 3 * 1000 * 1000);
define('REGEX_NAME', "/^[a-zA-Z-' ]*$/");
define('REGEX_CP', "/^(?:0[1-9]|[1-8]\d|9[0-8])\d{3}$/");
define('REGEX_DATE', "/^(0[1-9]|1[012])[-\/\.](0[1-9]|[12][0-9]|3[01])[-\/\.](19|20)\d\d$/");
define('REGEX_PHONE', "/^[0-9]{0,10}$");
