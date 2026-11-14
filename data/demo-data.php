<?php
/**
 * Fictional, deterministic demo data for Nomi Shopping Mall.
 *
 * Keep this file separate from future database/API services. It is safe to
 * include from UI pages and does not perform writes or require a database.
 */
$demoStore = [
    'name' => 'Nomi Shopping Mall',
    'city' => 'Okara',
    'province' => 'Punjab',
    'currency' => 'PKR',
    'currency_symbol' => 'Rs.',
    'branch_count' => 1,
];

$demoCategories = [
    'Household', 'Kitchen', 'Plasticware', 'Stationery', 'Toys',
    'Cosmetics', 'Personal Care', 'Cleaning', 'Electronics Accessories',
    'General Items',
];

$demoProductNames = [
    'Household' => ['Microfiber Duster', 'Door Mat', 'Storage Basket', 'Laundry Clips Pack', 'Shoe Brush', 'Wall Hook Set', 'Drawer Organizer', 'Dustpan Set', 'Shoe Rack Cover', 'Utility Hanger'],
    'Kitchen' => ['Steel Tea Strainer', 'Plastic Chopper', 'Measuring Cup Set', 'Spice Jar', 'Silicone Spatula', 'Lunch Box', 'Water Bottle', 'Kitchen Scissors', 'Dish Rack', 'Oil Dispenser'],
    'Plasticware' => ['Round Storage Box', 'Plastic Mug', 'Food Container', 'Multipurpose Tub', 'Serving Tray', 'Water Jug', 'Small Bucket', 'Soap Dish', 'Cutlery Holder', 'Stackable Basket'],
    'Stationery' => ['Ball Pen Pack', 'A4 Notebook', 'Geometry Box', 'Highlighter Set', 'Sticky Notes', 'Document Folder', 'Pencil Pack', 'Whiteboard Marker', 'Glue Stick', 'Color Pencil Set'],
    'Toys' => ['Building Blocks Pack', 'Mini Toy Car', 'Skipping Rope', 'Soft Ball', 'Bubble Blower', 'Puzzle Board', 'Yo-Yo', 'Mini Doll', 'Water Gun', 'Toy Animal Set'],
    'Cosmetics' => ['Face Powder', 'Nail Polish', 'Lip Balm', 'Makeup Sponge', 'Hair Clips Set', 'Compact Mirror', 'Kajal Pencil', 'Cosmetic Pouch', 'Nail Cutter', 'Hair Band Set'],
    'Personal Care' => ['Bath Sponge', 'Comb Set', 'Travel Toothbrush', 'Hand Mirror', 'Shaving Brush', 'Cotton Buds Pack', 'Face Towel', 'Nail File Set', 'Soap Case', 'Hair Brush'],
    'Cleaning' => ['Dishwashing Sponge', 'Scrub Pad Pack', 'Floor Wiper', 'Cleaning Brush', 'Microfiber Cloth', 'Toilet Brush', 'Spray Bottle', 'Dusting Cloth', 'Gloves Pair', 'Mop Refill'],
    'Electronics Accessories' => ['USB Cable', 'Mobile Stand', 'Earphone Case', 'Screen Cleaning Kit', 'Cable Protector Set', 'USB Adapter', 'Phone Ring Holder', 'Card Reader', 'Charging Cable Clip', 'LED Keychain Light'],
    'General Items' => ['Gift Wrap Roll', 'Reusable Shopping Bag', 'Small Torch', 'Keychain Set', 'Sewing Kit', 'Pocket Mirror', 'Travel Pouch', 'Mini Calculator', 'Luggage Tag', 'Greeting Card'],
];

$demoProducts = [];
$demoFixedPrices = [100, 250, 500];
$productSequence = 1;
foreach ($demoProductNames as $category => $names) {
    foreach ($names as $index => $name) {
        // Most products use the store's configurable fixed-price groups.
        // A few products retain an individually editable/variable retail price.
        $isVariable = in_array($index, [3, 8], true) && in_array($category, ['Electronics Accessories', 'Cosmetics', 'Kitchen', 'General Items'], true);
        $price = $isVariable
            ? [180, 320, 650, 750][$productSequence % 4]
            : $demoFixedPrices[($productSequence + $index) % count($demoFixedPrices)];
        $stock = (($productSequence * 7) % 29 === 0)
            ? 0
            : ((($productSequence * 5) % 23 === 0) ? 4 : 12 + (($productSequence * 11) % 55));
        $demoProducts[] = [
            'id' => $productSequence,
            'product' => $name,
            'sku' => sprintf('NOM-%04d', $productSequence),
            'barcode' => sprintf('200%010d', $productSequence),
            'category' => $category,
            'price' => number_format($price, 2, '.', ''),
            'purchase_price' => number_format($price * 0.62, 2, '.', ''),
            'stock' => $stock,
            'price_type' => $isVariable ? 'Variable' : 'Fixed',
            'price_group' => $isVariable ? 'Custom' : 'Rs. ' . number_format($price, 0),
            'status' => $stock === 0 ? 'Out of Stock' : ($stock <= 5 ? 'Low Stock' : 'In Stock'),
        ];
        $productSequence++;
    }
}

$demoSuppliers = [
    ['id' => 1, 'supplier_name' => 'Al-Madina Wholesale Traders', 'contact_person' => 'Usman Ali', 'phone' => '0301-5550101', 'email' => 'sales@almadina.example.test', 'address' => 'Grain Market, Okara', 'city' => 'Okara', 'status' => 'Active'],
    ['id' => 2, 'supplier_name' => 'Hassan General Suppliers', 'contact_person' => 'Hassan Raza', 'phone' => '0302-5550102', 'email' => 'orders@hassangeneral.example.test', 'address' => 'Depalpur Road, Okara', 'city' => 'Okara', 'status' => 'Active'],
    ['id' => 3, 'supplier_name' => 'Punjab Plastic House', 'contact_person' => 'Imran Shah', 'phone' => '0303-5550103', 'email' => 'info@punjabplastic.example.test', 'address' => 'Shah Alam Market, Lahore', 'city' => 'Lahore', 'status' => 'Active'],
    ['id' => 4, 'supplier_name' => 'City Stationers & Toys', 'contact_person' => 'Bilal Ahmed', 'phone' => '0304-5550104', 'email' => 'sales@citystationers.example.test', 'address' => 'College Road, Okara', 'city' => 'Okara', 'status' => 'Active'],
    ['id' => 5, 'supplier_name' => 'Bright Home Distributors', 'contact_person' => 'Farhan Iqbal', 'phone' => '0305-5550105', 'email' => 'orders@brighthome.example.test', 'address' => 'Brandreth Road, Lahore', 'city' => 'Lahore', 'status' => 'Active'],
    ['id' => 6, 'supplier_name' => 'Care & Beauty Wholesale', 'contact_person' => 'Ahsan Malik', 'phone' => '0306-5550106', 'email' => 'care@beautywholesale.example.test', 'address' => 'Rail Bazaar, Faisalabad', 'city' => 'Faisalabad', 'status' => 'Active'],
    ['id' => 7, 'supplier_name' => 'Smart Accessories Supply', 'contact_person' => 'Waqas Tariq', 'phone' => '0307-5550107', 'email' => 'sales@smartsupply.example.test', 'address' => 'Hall Road, Lahore', 'city' => 'Lahore', 'status' => 'Active'],
    ['id' => 8, 'supplier_name' => 'Rana Trading Company', 'contact_person' => 'Rana Shahid', 'phone' => '0308-5550108', 'email' => 'rana@trading.example.test', 'address' => 'M.A. Jinnah Road, Okara', 'city' => 'Okara', 'status' => 'Active'],
];

$demoCustomers = [
    ['id' => 1, 'customer_name' => 'Walk-in Customer', 'phone' => '—', 'email' => '', 'address' => 'Walk-in', 'balance' => 0, 'status' => 'Active'],
    ['id' => 2, 'customer_name' => 'Muhammad Ahmed', 'phone' => '0300-5550202', 'email' => 'm.ahmed@example.test', 'address' => 'Farid Town, Okara', 'balance' => 1250, 'status' => 'Active'],
    ['id' => 3, 'customer_name' => 'Sana Khalid', 'phone' => '0301-5550203', 'email' => 'sana.khalid@example.test', 'address' => 'Model Town, Okara', 'balance' => 0, 'status' => 'Active'],
    ['id' => 4, 'customer_name' => 'Usman Farooq', 'phone' => '0302-5550204', 'email' => 'usman.farooq@example.test', 'address' => 'A-Block, Okara', 'balance' => 780, 'status' => 'Active'],
    ['id' => 5, 'customer_name' => 'Ayesha Noor', 'phone' => '0303-5550205', 'email' => 'ayesha.noor@example.test', 'address' => 'Depalpur Road, Okara', 'balance' => 0, 'status' => 'Active'],
    ['id' => 6, 'customer_name' => 'Hira Aslam', 'phone' => '0304-5550206', 'email' => 'hira.aslam@example.test', 'address' => 'Renala Road, Okara', 'balance' => 450, 'status' => 'Active'],
    ['id' => 7, 'customer_name' => 'Ali Hassan', 'phone' => '0305-5550207', 'email' => 'ali.hassan@example.test', 'address' => 'Garden Town, Okara', 'balance' => 0, 'status' => 'Active'],
    ['id' => 8, 'customer_name' => 'Mariam Iqbal', 'phone' => '0306-5550208', 'email' => 'mariam.iqbal@example.test', 'address' => 'Rehman Colony, Okara', 'balance' => 920, 'status' => 'Active'],
];

$demoEmployees = [
    ['id' => 1, 'employee_name' => 'Ahmed Raza', 'role' => 'Store Manager', 'phone' => '0300-5550301', 'email' => 'ahmed.raza@example.test', 'branch' => 'Main Branch', 'status' => 'Active'],
    ['id' => 2, 'employee_name' => 'Hamza Tariq', 'role' => 'Cashier', 'phone' => '0300-5550302', 'email' => 'hamza.tariq@example.test', 'branch' => 'Main Branch', 'status' => 'Active'],
    ['id' => 3, 'employee_name' => 'Fatima Noor', 'role' => 'Inventory Assistant', 'phone' => '0300-5550303', 'email' => 'fatima.noor@example.test', 'branch' => 'Main Branch', 'status' => 'Active'],
    ['id' => 4, 'employee_name' => 'Usman Javed', 'role' => 'Sales Assistant', 'phone' => '0300-5550304', 'email' => 'usman.javed@example.test', 'branch' => 'Main Branch', 'status' => 'Active'],
];

$demoBranches = [
    ['id' => 1, 'branch_name' => 'Main Branch', 'branch_code' => 'OKR-001', 'address' => 'Main Bazaar, Okara, Punjab', 'phone' => '044-2550100', 'manager' => 'Ahmed Raza', 'status' => 'Active'],
];

$demoExpenses = [
    ['id' => 1, 'title' => 'Shop Rent', 'type' => 'Rent', 'amount' => 35000, 'date' => '2026-11-11', 'branch' => 'Main Branch', 'payment_method' => 'Bank Transfer', 'description' => 'Monthly premises rent'],
    ['id' => 2, 'title' => 'Electricity Bill', 'type' => 'Utilities', 'amount' => 12800, 'date' => '2026-11-12', 'branch' => 'Main Branch', 'payment_method' => 'Cash', 'description' => 'Monthly electricity bill'],
    ['id' => 3, 'title' => 'Staff Salaries', 'type' => 'Salaries', 'amount' => 52000, 'date' => '2026-11-13', 'branch' => 'Main Branch', 'payment_method' => 'Bank Transfer', 'description' => 'Monthly staff payroll'],
    ['id' => 4, 'title' => 'Internet & Phone', 'type' => 'Utilities', 'amount' => 3500, 'date' => '2026-11-13', 'branch' => 'Main Branch', 'payment_method' => 'Cash', 'description' => 'Internet and phone service'],
    ['id' => 5, 'title' => 'Shop Supplies', 'type' => 'General', 'amount' => 4200, 'date' => '2026-11-14', 'branch' => 'Main Branch', 'payment_method' => 'Cash', 'description' => 'Cleaning and stationery supplies'],
    ['id' => 6, 'title' => 'Delivery & Transport', 'type' => 'Transport', 'amount' => 6800, 'date' => '2026-11-14', 'branch' => 'Main Branch', 'payment_method' => 'Cash', 'description' => 'Goods delivery and transport'],
];


$demoSales = [];
for ($saleIndex = 1; $saleIndex <= 40; $saleIndex++) {
    $saleDate = date('Y-m-d', strtotime('2026-11-01 +' . (($saleIndex - 1) % 14) . ' days'));
    $saleTotal = 850 + (($saleIndex * 437) % 6200);
    $paymentMethod = ['Cash', 'Bank', 'Split', 'Credit'][$saleIndex % 4];
    $paidAmount = ['Cash'=>$saleTotal,'Bank'=>$saleTotal,'Split'=>(int)round($saleTotal * 0.5),'Credit'=>0][$paymentMethod];
    $customerName = $demoCustomers[$saleIndex % count($demoCustomers)]['customer_name'];
    $cashier = $demoEmployees[$saleIndex % count($demoEmployees)]['employee_name'];
    $product = $demoProducts[($saleIndex * 3) % count($demoProducts)];
    $quantity = max(1, (int) floor($saleTotal / max(1, (int)$product['price'])));
    $unitPrice = (int) round($saleTotal / $quantity);
    $demoSales[] = [
        'id' => $saleIndex,
        'invoice' => sprintf('INV-26-%05d', $saleIndex),
        'date' => $saleDate,
        'customer' => $customerName,
        'branch' => 'Main Branch',
        'cashier' => $cashier,
        'item_count' => 1,
        'items' => [[
            'product_id' => $product['id'],
            'product' => $product['product'],
            'sku' => $product['sku'],
            'barcode' => $product['barcode'],
            'quantity' => $quantity,
            'unit_price' => $unitPrice,
            'line_discount' => 0,
            'line_total' => $saleTotal,
        ]],
        'subtotal' => $saleTotal,
        'discount' => 0,
        'tax' => 0,
        'total' => $saleTotal,
        'payment_method' => $paymentMethod,
        'payment_reference' => $paymentMethod === 'Cash' ? '—' : sprintf('PAY-26-%05d', $saleIndex),
        'notes' => 'Illustrative demo transaction',
        'status' => ['Cash'=>'Paid','Bank'=>'Paid','Split'=>'Partially Paid','Credit'=>'Unpaid'][$paymentMethod],
        'paid_amount' => $paidAmount,
        'due_amount' => $saleTotal - $paidAmount,
    ];
}
foreach ($demoCustomers as &$customer) $customer['balance'] = 0;
unset($customer);
foreach ($demoSales as $sale) {
    if ($sale['due_amount'] > 0) {
        $customerName = $sale['customer'];
        foreach ($demoCustomers as &$customer) {
            if ($customer['customer_name'] === $customerName) $customer['balance'] += $sale['due_amount'];
        }
        unset($customer);
    }
}
$demoSalesTotal = array_sum(array_column($demoSales, 'total'));
$demoPurchasesTotal = 0;
for ($purchaseIndex = 1; $purchaseIndex <= 15; $purchaseIndex++) {
    $demoPurchasesTotal += 8500 + (($purchaseIndex * 1723) % 14500);
}
$demoCashBalance = array_sum(array_map(static function ($sale) {
    if ($sale['payment_method'] === 'Cash') return (float) $sale['total'];
    if ($sale['payment_method'] === 'Split') return (float) $sale['paid_amount'];
    return 0;
}, $demoSales));
$demoGrossProfit = (int) round($demoSalesTotal * 0.28);


$demoProductCount = count($demoProducts);
$demoStockUnits = array_sum(array_column($demoProducts, 'stock'));
$demoStockValue = array_sum(array_map(static function ($product) {
    return (float) $product['purchase_price'] * (int) $product['stock'];
}, $demoProducts));
$demoLowStockCount = count(array_filter($demoProducts, static function ($product) {
    return (int) $product['stock'] > 0 && (int) $product['stock'] <= 5;
}));
$demoOutOfStockCount = count(array_filter($demoProducts, static function ($product) {
    return (int) $product['stock'] === 0;
}));
$demoExpenseTotal = array_sum(array_column($demoExpenses, 'amount'));
$demoNetProfit = $demoGrossProfit - $demoExpenseTotal;
$demoCustomerDue = array_sum(array_column($demoCustomers, 'balance'));

/**
 * Customer summaries and transaction-level ledgers are derived from sales.
 * A sale increases the receivable (debit); its collected payment reduces it
 * (credit). The closing balance therefore matches each customer's due amount.
 */
$demoCustomerSummary = [];
$demoCustomerLedger = [];
foreach ($demoCustomers as $customer) {
    $customerId = (int) $customer['id'];
    $demoCustomerSummary[$customerId] = [
        'total_sales' => 0,
        'total_paid' => 0,
        'outstanding' => 0,
        'invoice_count' => 0,
        'last_sale_date' => '—',
    ];
    $demoCustomerLedger[$customerId] = [];
}
foreach ($demoSales as $sale) {
    foreach ($demoCustomers as $customer) {
        if ($customer['customer_name'] !== $sale['customer']) continue;
        $customerId = (int) $customer['id'];
        $demoCustomerSummary[$customerId]['total_sales'] += (int) $sale['total'];
        $demoCustomerSummary[$customerId]['total_paid'] += (int) $sale['paid_amount'];
        $demoCustomerSummary[$customerId]['outstanding'] += (int) $sale['due_amount'];
        $demoCustomerSummary[$customerId]['invoice_count']++;
        $demoCustomerSummary[$customerId]['last_sale_date'] = $sale['date'];
        $demoCustomerLedger[$customerId][] = [
            'date' => $sale['date'], 'sort_order' => 1,
            'reference' => $sale['invoice'], 'description' => 'Sale ' . $sale['invoice'],
            'debit' => (int) $sale['total'], 'credit' => 0,
        ];
        if ((int) $sale['paid_amount'] > 0) {
            $demoCustomerLedger[$customerId][] = [
                'date' => $sale['date'], 'sort_order' => 2,
                'reference' => 'RCPT-' . substr($sale['invoice'], -5),
                'description' => 'Payment received for ' . $sale['invoice'],
                'debit' => 0, 'credit' => (int) $sale['paid_amount'],
            ];
        }
        break;
    }
}
foreach ($demoCustomerLedger as $customerId => &$entries) {
    usort($entries, static function ($a, $b) {
        $dateCompare = strcmp($a['date'], $b['date']);
        return $dateCompare !== 0 ? $dateCompare : ($a['sort_order'] <=> $b['sort_order']);
    });
    $runningBalance = 0;
    foreach ($entries as &$entry) {
        $runningBalance += $entry['debit'] - $entry['credit'];
        $entry['balance'] = $runningBalance;
        unset($entry['sort_order']);
    }
    unset($entry);
}
unset($entries);



// Additional coherent records used by the shared list pages.
$demoPurchases = [];
for ($purchaseIndex = 1; $purchaseIndex <= 15; $purchaseIndex++) {
    $demoPurchases[] = [
        'id' => $purchaseIndex,
        'reference' => sprintf('PUR-26-%04d', $purchaseIndex),
        'date' => date('Y-m-d', strtotime('2026-11-01 +' . (($purchaseIndex - 1) % 14) . ' days')),
        'supplier' => $demoSuppliers[($purchaseIndex - 1) % count($demoSuppliers)]['supplier_name'],
        'branch' => 'Main Branch',
        'total' => $purchaseTotal = 8500 + (($purchaseIndex * 1723) % 14500),
        'paid' => min($purchaseTotal, 5000 + (($purchaseIndex * 613) % 9000)),
        'due' => max(0, $purchaseTotal - min($purchaseTotal, 5000 + (($purchaseIndex * 613) % 9000))),
        'payment_method' => ['Cash', 'Bank Transfer', 'Cheque'][$purchaseIndex % 3],
        'status' => min($purchaseTotal, 5000 + (($purchaseIndex * 613) % 9000)) >= $purchaseTotal ? 'Paid' : 'Partially Paid',
    ];
}
$demoExpenseTypes = [
    ['expense_type' => 'Rent', 'description' => 'Monthly shop rent and premises charges', 'status' => 'Active'],
    ['expense_type' => 'Utilities', 'description' => 'Electricity, internet and phone bills', 'status' => 'Active'],
    ['expense_type' => 'Salaries', 'description' => 'Staff wages and payroll', 'status' => 'Active'],
    ['expense_type' => 'General', 'description' => 'Routine shop and office supplies', 'status' => 'Active'],
    ['expense_type' => 'Transport', 'description' => 'Delivery and goods transportation', 'status' => 'Active'],
];
$demoSupplierLedger = [];
$runningSupplierBalances = [];
foreach ($demoPurchases as $purchase) {
    $supplierName = $purchase['supplier'];
    if (!isset($runningSupplierBalances[$supplierName])) $runningSupplierBalances[$supplierName] = 0;
    $runningSupplierBalances[$supplierName] += (int) $purchase['total'] - (int) $purchase['paid'];
    $demoSupplierLedger[] = [
        'date' => $purchase['date'], 'supplier' => $supplierName,
        'description' => 'Purchase ' . $purchase['reference'] . ' (payment applied)',
        'debit' => number_format($purchase['paid'], 2, '.', ''),
        'credit' => number_format($purchase['total'], 2, '.', ''),
        'balance' => number_format($runningSupplierBalances[$supplierName], 2, '.', ''),
    ];
}
$demoBranchLedger = [];
$runningBranchBalance = 0;
foreach ($demoSales as $sale) {
    $runningBranchBalance += (int) $sale['total'];
    $demoBranchLedger[] = [
        'date' => $sale['date'], 'branch' => 'Main Branch',
        'description' => 'Sale ' . $sale['invoice'],
        'debit' => '0.00', 'credit' => number_format($sale['total'], 2, '.', ''),
        'balance' => number_format($runningBranchBalance, 2, '.', ''),
    ];
}
$demoSalesReport = [];
foreach ($demoSales as $sale) {
    $reportDate = $sale['date'];
    if (!isset($demoSalesReport[$reportDate])) {
        $demoSalesReport[$reportDate] = ['date' => $reportDate, 'branch' => 'Main Branch', 'invoices' => 0, 'gross_sales' => 0, 'discount' => 0, 'net_sales' => 0];
    }
    $demoSalesReport[$reportDate]['invoices']++;
    $demoSalesReport[$reportDate]['gross_sales'] += (int) $sale['total'] + (($sale['id'] % 5) * 10);
    $demoSalesReport[$reportDate]['discount'] += ($sale['id'] % 5) * 10;
    $demoSalesReport[$reportDate]['net_sales'] += (int) $sale['total'];
}
$demoSalesReport = array_values($demoSalesReport);
$demoExpenseReport = [];
foreach ($demoExpenses as $expense) {
    $demoExpenseReport[] = [
        'date' => $expense['date'],
        'branch' => $expense['branch'], 'expense_type' => $expense['type'],
        'amount' => number_format($expense['amount'], 2, '.', ''),
        'notes' => $expense['title'],
    ];
}
$demoProfitLoss = [[
    'period' => 'November 2026 (Demo)',
    'revenue' => number_format($demoSalesTotal, 2, '.', ''),
    'cost_of_goods' => number_format($demoSalesTotal - $demoGrossProfit, 2, '.', ''),
    'expenses' => number_format($demoExpenseTotal, 2, '.', ''),
    'net_profit_loss' => number_format($demoNetProfit, 2, '.', ''),
]];


$demoSupplierPayments = [];
foreach ($demoPurchases as $purchase) {
    if ((int) $purchase['paid'] > 0) {
        $demoSupplierPayments[] = [
            'date'=>$purchase['date'],
            'reference'=>'PAY-' . substr($purchase['reference'], -4),
            'supplier'=>$purchase['supplier'],
            'purchase_reference'=>$purchase['reference'],
            'amount'=>$purchase['paid'],
            'method'=>['Cash','Bank Transfer','Cheque'][$purchase['id'] % 3],
            'status'=>'Recorded (demo)',
        ];
    }
}

/**
 * Illustrative stock movement history. These rows are examples only and do
 * not post back into the demo product quantities above.
 */
$demoStockMovements = [
    ['date'=>'2026-11-14 09:10','reference'=>'OPEN-0001','product'=>'Microfiber Duster','movement'=>'Opening Balance','change'=>40,'reason'=>'Initial stock setup','employee'=>'Ahmed Raza'],
    ['date'=>'2026-11-14 10:25','reference'=>'ADJ-0008','product'=>'USB Cable','movement'=>'Stock In','change'=>12,'reason'=>'Physical count correction','employee'=>'Fatima Noor'],
    ['date'=>'2026-11-13 17:40','reference'=>'ADJ-0007','product'=>'Face Powder','movement'=>'Stock Out','change'=>-3,'reason'=>'Damaged goods','employee'=>'Ahmed Raza'],
    ['date'=>'2026-11-13 15:15','reference'=>'PUR-26-0014','product'=>'A4 Notebook','movement'=>'Purchase Received','change'=>50,'reason'=>'Supplier delivery','employee'=>'Fatima Noor'],
    ['date'=>'2026-11-12 19:05','reference'=>'ADJ-0006','product'=>'Plastic Mug','movement'=>'Stock Out','change'=>-2,'reason'=>'Sample / internal use','employee'=>'Hamza Tariq'],
];
