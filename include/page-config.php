<?php
/**
 * Shared route metadata for browser titles, headings, breadcrumbs, and page layouts.
 */
$currentPage = basename($_SERVER['SCRIPT_NAME']);

$pageDefinitions = [
    'dashboard.php' => [
        'title' => 'Dashboard',
        'parent' => 'Dashboard',
        'mode' => 'none',
        'breadcrumbs' => [
            [
                'label' => 'Home',
                'url' => 'dashboard.php'
            ],
            [
                'label' => 'Dashboard',
                'url' => null
            ]
        ]
    ],
    'pos.php' => [
        'title' => 'POS',
        'parent' => 'POS',
        'mode' => 'none',
        'breadcrumbs' => [
            [
                'label' => 'Home',
                'url' => 'dashboard.php'
            ],
            [
                'label' => 'POS',
                'url' => null
            ]
        ]
    ],
    'all-products.php' => [
        'title' => 'All Products',
        'tableTitle' => 'Product List',
        'parent' => 'Products',
        'mode' => 'table',
        'columns' => [
            'Product',
            'SKU',
            'Category',
            'Price',
            'Stock',
            'Status'
        ],
        'breadcrumbs' => [
            [
                'label' => 'Home',
                'url' => 'dashboard.php'
            ],
            [
                'label' => 'Products',
                'url' => null
            ],
            [
                'label' => 'All Products',
                'url' => null
            ]
        ]
    ],
    'product-add.php' => [
        'title' => 'Add Product',
        'parent' => 'Products',
        'mode' => 'none',
        'fields' => [
            [
                'label' => 'Product Name',
                'type' => 'text'
            ],
            [
                'label' => 'SKU / Barcode',
                'type' => 'text'
            ],
            [
                'label' => 'Category',
                'type' => 'text'
            ],
            [
                'label' => 'Purchase Price',
                'type' => 'number'
            ],
            [
                'label' => 'Selling Price',
                'type' => 'number'
            ],
            [
                'label' => 'Stock Quantity',
                'type' => 'number'
            ]
        ],
        'breadcrumbs' => [
            [
                'label' => 'Home',
                'url' => 'dashboard.php'
            ],
            [
                'label' => 'Products',
                'url' => null
            ],
            [
                'label' => 'Add Product',
                'url' => null
            ]
        ]
    ],
    'generate-tags.php' => [
        'title' => 'Generate Tags',
        'parent' => 'Products',
        'mode' => 'form',
        'fields' => [
            [
                'label' => 'Product',
                'type' => 'text'
            ],
            [
                'label' => 'Number of Tags',
                'type' => 'number'
            ],
            [
                'label' => 'Tag Size',
                'type' => 'text'
            ]
        ],
        'breadcrumbs' => [
            [
                'label' => 'Home',
                'url' => 'dashboard.php'
            ],
            [
                'label' => 'Products',
                'url' => null
            ],
            [
                'label' => 'Generate Tags',
                'url' => null
            ]
        ]
    ],
    'all-branches.php' => [
        'title' => 'All Branches',
        'tableTitle' => 'Branch List',
        'parent' => 'Branches',
        'mode' => 'table',
        'columns' => [
            'Branch Name',
            'Branch Code',
            'Address',
            'Phone',
            'Status'
        ],
        'breadcrumbs' => [
            [
                'label' => 'Home',
                'url' => '#'
            ],
            [
                'label' => 'All Branches',
                'url' => null
            ]
        ]
    ],
    'add-branch.php' => [
        'title' => 'Add Branch',
        'parent' => 'Branches',
        'mode' => 'form',
        'fields' => [
            [
                'label' => 'Branch Name',
                'type' => 'text'
            ],
            [
                'label' => 'Branch Code',
                'type' => 'text'
            ],
            [
                'label' => 'Address',
                'type' => 'text'
            ],
            [
                'label' => 'Phone',
                'type' => 'tel'
            ],
            [
                'label' => 'Manager',
                'type' => 'text'
            ]
        ],
        'breadcrumbs' => [
            [
                'label' => 'Home',
                'url' => 'dashboard.php'
            ],
            [
                'label' => 'Branches',
                'url' => null
            ],
            [
                'label' => 'Add Branch',
                'url' => null
            ]
        ]
    ],
    'all-suppliers.php' => [
        'title' => 'All Suppliers',
        'tableTitle' => 'Supplier List',
        'parent' => 'Suppliers',
        'mode' => 'table',
        'columns' => [
            'Supplier Name',
            'Contact Person',
            'Phone',
            'Email',
            'Address',
            'Status'
        ],
        'breadcrumbs' => [
            [
                'label' => 'Home',
                'url' => 'dashboard.php'
            ],
            [
                'label' => 'Suppliers',
                'url' => null
            ],
            [
                'label' => 'All Suppliers',
                'url' => null
            ]
        ]
    ],
    'add-supplier.php' => [
        'title' => 'Add Supplier',
        'parent' => 'Suppliers',
        'mode' => 'form',
        'fields' => [
            [
                'label' => 'Supplier Name',
                'type' => 'text'
            ],
            [
                'label' => 'Contact Person',
                'type' => 'text'
            ],
            [
                'label' => 'Phone',
                'type' => 'tel'
            ],
            [
                'label' => 'Email',
                'type' => 'email'
            ],
            [
                'label' => 'Address',
                'type' => 'text'
            ]
        ],
        'breadcrumbs' => [
            [
                'label' => 'Home',
                'url' => 'dashboard.php'
            ],
            [
                'label' => 'Suppliers',
                'url' => null
            ],
            [
                'label' => 'Add Supplier',
                'url' => null
            ]
        ]
    ],
    'all-sales.php' => [
        'title' => 'All Sales',
        'tableTitle' => 'Sales List',
        'parent' => 'Sales',
        'mode' => 'table',
        'columns' => [
            'Invoice #',
            'Date',
            'Customer',
            'Branch',
            'Total',
            'Payment Status'
        ],
        'breadcrumbs' => [
            [
                'label' => 'Home',
                'url' => 'dashboard.php'
            ],
            [
                'label' => 'Sales',
                'url' => null
            ],
            [
                'label' => 'All Sales',
                'url' => null
            ]
        ]
    ],
    'add-sale.php' => [
        'title' => 'Add Sale',
        'parent' => 'Sales',
        'mode' => 'form',
        'fields' => [
            [
                'label' => 'Customer',
                'type' => 'text'
            ],
            [
                'label' => 'Branch',
                'type' => 'text'
            ],
            [
                'label' => 'Product / Barcode',
                'type' => 'text'
            ],
            [
                'label' => 'Quantity',
                'type' => 'number'
            ],
            [
                'label' => 'Payment Method',
                'type' => 'text'
            ]
        ],
        'breadcrumbs' => [
            [
                'label' => 'Home',
                'url' => 'dashboard.php'
            ],
            [
                'label' => 'Sales',
                'url' => null
            ],
            [
                'label' => 'Add Sale',
                'url' => null
            ]
        ]
    ],
    'all-expenses.php' => [
        'title' => 'All Expenses',
        'tableTitle' => 'Expense List',
        'parent' => 'Expenses',
        'mode' => 'table',
        'columns' => [
            'Expense #',
            'Date',
            'Expense Type',
            'Branch',
            'Amount',
            'Status'
        ],
        'breadcrumbs' => [
            [
                'label' => 'Home',
                'url' => 'dashboard.php'
            ],
            [
                'label' => 'Expenses',
                'url' => null
            ],
            [
                'label' => 'All Expenses',
                'url' => null
            ]
        ]
    ],
    'add-expense.php' => [
        'title' => 'Add Expense',
        'parent' => 'Expenses',
        'mode' => 'form',
        'fields' => [
            [
                'label' => 'Expense Title',
                'type' => 'text'
            ],
            [
                'label' => 'Expense Type',
                'type' => 'text'
            ],
            [
                'label' => 'Branch',
                'type' => 'text'
            ],
            [
                'label' => 'Amount',
                'type' => 'number'
            ],
            [
                'label' => 'Date',
                'type' => 'date'
            ],
            [
                'label' => 'Description',
                'type' => 'textarea'
            ]
        ],
        'breadcrumbs' => [
            [
                'label' => 'Home',
                'url' => 'dashboard.php'
            ],
            [
                'label' => 'Expenses',
                'url' => null
            ],
            [
                'label' => 'Add Expense',
                'url' => null
            ]
        ]
    ],
    'expense-types.php' => [
        'title' => 'Expense Types',
        'tableTitle' => 'Expense Types',
        'parent' => 'Expenses',
        'mode' => 'table',
        'columns' => [
            'Expense Type',
            'Description',
            'Status'
        ],
        'breadcrumbs' => [
            [
                'label' => 'Home',
                'url' => 'dashboard.php'
            ],
            [
                'label' => 'Expenses',
                'url' => null
            ],
            [
                'label' => 'Expense Types',
                'url' => null
            ]
        ]
    ],
    'all-employees.php' => [
        'title' => 'All Employees',
        'tableTitle' => 'Employee List',
        'parent' => 'Employees',
        'mode' => 'table',
        'columns' => [
            'Employee Name',
            'Role',
            'Phone',
            'Email',
            'Branch',
            'Status'
        ],
        'breadcrumbs' => [
            [
                'label' => 'Home',
                'url' => 'dashboard.php'
            ],
            [
                'label' => 'Employees',
                'url' => null
            ],
            [
                'label' => 'All Employees',
                'url' => null
            ]
        ]
    ],
    'add-employee.php' => [
        'title' => 'Add Employee',
        'parent' => 'Employees',
        'mode' => 'form',
        'fields' => [
            [
                'label' => 'Full Name',
                'type' => 'text'
            ],
            [
                'label' => 'Role',
                'type' => 'text'
            ],
            [
                'label' => 'Phone',
                'type' => 'tel'
            ],
            [
                'label' => 'Email',
                'type' => 'email'
            ],
            [
                'label' => 'Branch',
                'type' => 'text'
            ]
        ],
        'breadcrumbs' => [
            [
                'label' => 'Home',
                'url' => 'dashboard.php'
            ],
            [
                'label' => 'Employees',
                'url' => null
            ],
            [
                'label' => 'Add Employee',
                'url' => null
            ]
        ]
    ],
    'branch-ledger.php' => [
        'title' => 'Branch Ledger',
        'tableTitle' => 'Branch Ledger',
        'parent' => 'Ledger',
        'mode' => 'table',
        'columns' => [
            'Date',
            'Branch',
            'Description',
            'Debit',
            'Credit',
            'Balance'
        ],
        'breadcrumbs' => [
            [
                'label' => 'Home',
                'url' => 'dashboard.php'
            ],
            [
                'label' => 'Ledger',
                'url' => null
            ],
            [
                'label' => 'Branch Ledger',
                'url' => null
            ]
        ]
    ],
    'supplier-ledger.php' => [
        'title' => 'Supplier Ledger',
        'tableTitle' => 'Supplier Ledger',
        'parent' => 'Ledger',
        'mode' => 'table',
        'columns' => [
            'Date',
            'Supplier',
            'Description',
            'Debit',
            'Credit',
            'Balance'
        ],
        'breadcrumbs' => [
            [
                'label' => 'Home',
                'url' => 'dashboard.php'
            ],
            [
                'label' => 'Ledger',
                'url' => null
            ],
            [
                'label' => 'Supplier Ledger',
                'url' => null
            ]
        ]
    ],
    'sales-report.php' => [
        'title' => 'Sales Report',
        'tableTitle' => 'Sales Report',
        'parent' => 'Reports',
        'mode' => 'table',
        'columns' => [
            'Date',
            'Branch',
            'Invoices',
            'Gross Sales',
            'Discount',
            'Net Sales'
        ],
        'breadcrumbs' => [
            [
                'label' => 'Home',
                'url' => 'dashboard.php'
            ],
            [
                'label' => 'Reports',
                'url' => null
            ],
            [
                'label' => 'Sales Report',
                'url' => null
            ]
        ]
    ],
    'expense-report.php' => [
        'title' => 'Expense Report',
        'tableTitle' => 'Expense Report',
        'parent' => 'Reports',
        'mode' => 'table',
        'columns' => [
            'Date',
            'Branch',
            'Expense Type',
            'Amount',
            'Notes'
        ],
        'breadcrumbs' => [
            [
                'label' => 'Home',
                'url' => 'dashboard.php'
            ],
            [
                'label' => 'Reports',
                'url' => null
            ],
            [
                'label' => 'Expense Report',
                'url' => null
            ]
        ]
    ],
    'profit-loss.php' => [
        'title' => 'Profit/Loss Statement',
        'tableTitle' => 'Profit/Loss Statement',
        'parent' => 'Reports',
        'mode' => 'table',
        'columns' => [
            'Period',
            'Revenue',
            'Cost of Goods',
            'Expenses',
            'Net Profit/Loss'
        ],
        'breadcrumbs' => [
            [
                'label' => 'Home',
                'url' => 'dashboard.php'
            ],
            [
                'label' => 'Reports',
                'url' => null
            ],
            [
                'label' => 'Profit/Loss Statement',
                'url' => null
            ]
        ]
    ],
    'users.php' => [
        'title' => 'Users',
        'tableTitle' => 'Users List',
        'parent' => 'Users',
        'mode' => 'table',
        'columns' => [
            'Name',
            'Username',
            'Role',
            'Last Login',
            'Status'
        ],
        'breadcrumbs' => [
            [
                'label' => 'Home',
                'url' => 'dashboard.php'
            ],
            [
                'label' => 'Users',
                'url' => null
            ]
        ]
    ],
    'all-purchases.php' => ['title'=>'All Purchases','tableTitle'=>'Purchase Register','parent'=>'Purchases','mode'=>'table','columns'=>['Reference','Date','Supplier','Branch','Total','Paid','Status'],'breadcrumbs'=>[['label'=>'Home','url'=>'dashboard.php'],['label'=>'Purchases','url'=>null],['label'=>'All Purchases','url'=>null]]],
    'add-purchase.php' => ['title'=>'Add Purchase','parent'=>'Purchases','mode'=>'none','breadcrumbs'=>[['label'=>'Home','url'=>'dashboard.php'],['label'=>'Purchases','url'=>'all-purchases.php'],['label'=>'Add Purchase','url'=>null]]],
    'all-customers.php' => ['title'=>'All Customers','tableTitle'=>'Customer Directory','parent'=>'Customers','mode'=>'none','breadcrumbs'=>[['label'=>'Home','url'=>'dashboard.php'],['label'=>'Customers','url'=>null]]],
    'add-customer.php' => ['title'=>'Add Customer','parent'=>'Customers','mode'=>'none','breadcrumbs'=>[['label'=>'Home','url'=>'dashboard.php'],['label'=>'Customers','url'=>'all-customers.php'],['label'=>'Add Customer','url'=>null]]],
    'customer-ledger.php' => ['title'=>'Customer Ledger','parent'=>'Customers','mode'=>'none','breadcrumbs'=>[['label'=>'Home','url'=>'dashboard.php'],['label'=>'Customers','url'=>'all-customers.php'],['label'=>'Customer Ledger','url'=>null]]],
    'tax.php' => [
        'title' => 'Tax',
        'tableTitle' => 'Tax List',
        'parent' => 'Tax',
        'mode' => 'table',
        'columns' => [
            'Tax Name',
            'Rate',
            'Applies To',
            'Effective From',
            'Status'
        ],
        'breadcrumbs' => [
            [
                'label' => 'Home',
                'url' => 'dashboard.php'
            ],
            [
                'label' => 'Tax',
                'url' => null
            ]
        ]
    ]
];

$pageConfig = $pageDefinitions[$currentPage] ?? [
    'title' => 'Page',
    'parent' => 'Home',
    'mode' => 'table',
    'columns' => [],
    'breadcrumbs' => [
        ['label' => 'Home', 'url' => 'dashboard.php'],
        ['label' => 'Page', 'url' => null],
    ],
];

$pageActionsByPage = [
    'all-products.php' => [['label' => 'Add Product', 'url' => 'product-add.php'], ['label' => 'Generate Labels', 'url' => 'generate-tags.php']],
    'all-purchases.php' => [['label' => 'Add Purchase', 'url' => 'add-purchase.php']],
    'all-branches.php' => [['label' => 'Add Branch', 'url' => 'add-branch.php']],
    'all-suppliers.php' => [['label' => 'Add Supplier', 'url' => 'add-supplier.php']],
    'all-sales.php' => [['label' => 'Add Sale', 'url' => 'add-sale.php']],
    'all-expenses.php' => [['label' => 'Add Expense', 'url' => 'add-expense.php']],
    'all-employees.php' => [['label' => 'Add Employee', 'url' => 'add-employee.php']],
];
$pageConfig['actions'] = $pageActionsByPage[$currentPage] ?? [];

$pageTitle = $pageConfig['title'];
$pageBreadcrumbs = $pageConfig['breadcrumbs'];
?>