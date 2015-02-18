<?php
/**
 * @Author: rafael
 * @Date:   2015-02-17 16:49:25
 * @Last Modified by:   Administrador
 * @Last Modified time: 2015-02-17 16:49:53
 */
if (!file_exists(__DIR__ . '/' . $_SERVER['REQUEST_URI'])) {
    $_GET['_url'] = $_SERVER['REQUEST_URI'];
}

return false;
