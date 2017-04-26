<?php

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2'                             => true,
        'binary_operator_spaces'            => true,
        'no_whitespace_in_blank_line'       => true,
        'ternary_operator_spaces'           => true,
        'cast_spaces'                       => true,
        'trailing_comma_in_multiline_array' => true,
    ])
    ->setUsingCache(true)
    ->setFinder(PhpCsFixer\Finder::create()->exclude('tests')->in(__DIR__));
