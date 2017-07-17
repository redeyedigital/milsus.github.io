<?php

namespace Openmarco\Seriously\std;

use Openmarco\Seriously\Service\Protocol;

Protocol::define('theme', rtrim(str_replace('\\', '/', get_template_directory()), '/'));

Protocol::define('child-theme', rtrim(str_replace('\\', '/', get_stylesheet_directory()), '/'));

Protocol::define('controls', rtrim(str_replace('\\', '/', get_template_directory()), '/') . '/controls');

Protocol::define('assets', rtrim(str_replace('\\', '/', get_template_directory()), '/') . '/assets');