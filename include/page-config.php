<?php
/**
 * Shared metadata for page titles, headings, and breadcrumbs.
 * Add new routes here instead of duplicating page-header markup.
 */
$currentPage = basename($_SERVER['SCRIPT_NAME']);

$pageDefinitions = [
    'dashboard.php' => [
        'title' => 'Dashboard',
        'breadcrumbs' => [
            ['label' => 'Home', 'url' => 'dashboard.php'],
            ['label' => 'Dashboard'],
        ],
    ],
    'pos.php' => [
        'title' => 'POS',
        'breadcrumbs' => [
            ['label' => 'Home', 'url' => 'dashboard.php'],
            ['label' => 'POS'],
        ],
    ],
    'all-products.php' => [
        'title' => 'All Products',
        'breadcrumbs' => [
            ['label' => 'Home', 'url' => 'dashboard.php'],
            ['label' => 'Products'],
            ['label' => 'All Products'],
        ],
    ],
];

$pageConfig = $pageDefinitions[$currentPage] ?? [
    'title' => 'Page',
    'breadcrumbs' => [
        ['label' => 'Home', 'url' => 'dashboard.php'],
        ['label' => 'Page'],
    ],
];

$pageTitle = $pageConfig['title'];
$pageBreadcrumbs = $pageConfig['breadcrumbs'];
?>