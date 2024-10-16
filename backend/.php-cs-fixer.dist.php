<?php
$finder = (new PhpCsFixer\Finder())
    ->in(['src'])
;

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR12' => true,
        'array_push' => true,
        'logical_operators' => true,
        'strict_comparison' => true,
        'semicolon_after_instruction' => true,
        'standardize_not_equals' => true,
        'binary_operator_spaces' => true,
        'type_declaration_spaces' => true,
        'object_operator_without_whitespace' => true,
        'single_quote' => true,
        'no_whitespace_before_comma_in_array' => true,
        'global_namespace_import' => true,
        'no_blank_lines_after_phpdoc' => true,
        'no_spaces_around_offset' => true,
        'no_superfluous_phpdoc_tags' => true,
        'no_empty_phpdoc' => true,
        'no_unused_imports' => true,
        'ternary_to_null_coalescing' => true,
        'unary_operator_spaces' => true,
        'linebreak_after_opening_tag' => true,
        'native_function_casing' => true,
        'no_empty_statement' => true,
        'no_leading_namespace_whitespace' => true,
        'no_singleline_whitespace_before_semicolons' => true,
        'class_attributes_separation' => true,
        'phpdoc_array_type' => true,
        'phpdoc_param_order' => true,
        'phpdoc_trim' => true,
        'phpdoc_types' => true,
        'phpdoc_scalar' => true,
        'phpdoc_order' => true,
        'phpdoc_indent' => true,
        'phpdoc_annotation_without_dot' => true,
        'phpdoc_no_useless_inheritdoc' => true,
        'general_phpdoc_annotation_remove' => ['annotations' => ['throws']],
        'phpdoc_align' => [
            'align' => 'left',
        ],
        'phpdoc_line_span' => [
            'const' => 'single',
            'method' => 'multi',
            'property' => 'single',
        ],
        'array_syntax' => [
            'syntax' => 'short',
        ],
        'concat_space' => [
            'spacing' => 'one',
        ],
        'types_spaces' => [
            'space' => 'single',
            'space_multiple_catch' => 'single',
        ],
        'no_trailing_comma_in_singleline' => true,
        'trailing_comma_in_multiline' => [
            'elements' => ['arguments', 'arrays', 'parameters'],
        ],
        'cast_spaces' => true,
        'single_space_around_construct' => true,
        'declare_strict_types' => true,
    ])
    ->setFinder($finder)
    ;
