#!/bin/bash

[ ! -f ./wp-config-local.php ] && cp ./wp-config-local-sample.php ./wp-config-local.php

cd ./sxd
cp ./cfg-sample.php ./cfg.php
cp ./ses-sample.php ./ses.php
chmod 666 ./cfg.php ./ses.php
chmod 777 ./backup