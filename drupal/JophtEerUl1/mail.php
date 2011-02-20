<?php

$log=file_get_contents('/var/log/mail.log');

echo str_replace("\n",'<br />', $log);