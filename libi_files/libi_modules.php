<?php

if($__libi_core && $__libi_config_on)
$__libi_modules = array(
    array('name' => 'Pdo',
        'file' => 'pdo',
        'load' => $__libi_pdo['enabled']),

    array('name' => 'Tools for names',
        'file' => 'names_tools',
        'load' => $__libi_enable_names_tools),
    array('name' => 'Users functions',
        'file' => 'user_func',
        'load' => $__libi_enable_user_func),
    array('name' => 'Variable securers',
        'file' => 'var_securities',
        'load' => $__libi_enable_var_securities),
    array('name' => 'Formbuilder',
        'file' => 'FormBuilder',
        'load' => $__libi_enable_formBuilder),
    array('name' => 'Compatibility bridge',
        'file' => 'compatibility',
        'load' => $__libi_enable_compatibilty),
);
