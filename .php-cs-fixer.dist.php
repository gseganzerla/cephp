<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude('var')
;

return (new PhpCsFixer\Config())
    ->setRules([
        'array_syntax' => ['syntax' => 'short'],
        'no_leading_import_slash' => true,
        'no_unused_imports' => true,
        'ordered_imports' => true,
        'single_line_after_imports' => true,
        'blank_line_after_namespace' => true,
        'blank_line_after_opening_tag' => true,
        'compact_nullable_type_declaration' => true,
        'blank_line_after_namespace' => true,
        'nullable_type_declaration' => ['syntax' => 'question_mark'],
    ])
    ->setFinder($finder)
;
