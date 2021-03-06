<?php

define('REGEXP_STR_NO_NUMBER','/^[A-Za-z-éèêëàâäôöûüç \'\-]+$/');

define('REGEXP_DATE',"/^\d{4}-\d{2}-\d{1,2}$/");
define('REGEXP_INT','/^[0-9]+$/');

define('REGEXP_PHONE', '/^(\+33|0|0033)[1-9]((-|\/|\.)\d{2}){4}$/');

define('REGEXP_POLE_EMPLOI','/^[0-9]{7}[A-Z]{1}$/');

define('REGEXP_PSEUDO','/^[a-zA-Z0-9_.\-]+$/');


define('REGEXP_DATE_HOUR',"/^\d{4}-\d{2}-\d{1,2}T\d{2}:\d{2}$/");
define('REGEXP_IFRAMEYOUTUBE','/^(http(s)?:\/\/)?((w){3}.)?youtu(be|.be)?(\.com)?\/.+$/');
?>