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
    ['id' => 1, 'supplier_name' => 'Al-Madina Wholesale Traders', 'contact_person' => 'Usman Ali', 'phone' => '0301-5550101', 'city' => 'Okara', 'status' => 'Active'],
    ['id' => 2, 'supplier_name' => 'Hassan General Suppliers', 'contact_person' => 'Hassan Raza', 'phone' => '0302-5550102', 'city' => 'Okara', 'status' => 'Active'],
    ['id' => 3, 'supplier_name' => 'Punjab Plastic House', 'contact_person' => 'Imran Shah', 'phone' => '0303-5550103', 'city' => 'Lahore', 'status' => 'Active'],
    ['id' => 4, 'supplier_name' => 'City Stationers & Toys', 'contact_person' => 'Bilal Ahmed', 'phone' => '0304-5550104', 'city' => 'Okara', 'status' => 'Active'],
    ['id' => 5, 'supplier_name' => 'Bright Home Distributors', 'contact_person' => 'Farhan Iqbal', 'phone' => '0305-5550105', 'city' => 'Lahore', 'status' => 'Active'],
    ['id' => 6, 'supplier_name' => 'Care & Beauty Wholesale', 'contact_person' => 'Ahsan Malik', 'phone' => '0306-5550106', 'city' => 'Faisalabad', 'status' => 'Active'],
    ['id' => 7, 'supplier_name' => 'Smart Accessories Supply', 'contact_person' => 'Waqas Tariq', 'phone' => '0307-5550107', 'city' => 'Lahore', 'status' => 'Active'],
    ['id' => 8, 'supplier_name' => 'Rana Trading Company', 'contact_person' => 'Rana Shahid', 'phone' => '0308-5550108', 'city' => 'Okara', 'status' => 'Active'],
];

$demoCustomers = [
    ['id' => 1, 'customer_name' => 'Walk-in Customer', 'phone' => '—', 'balance' => 0, 'status' => 'Active'],
    ['id' => 2, 'customer_name' => 'Muhammad Ahmed', 'phone' => '0300-5550202', 'balance' => 1250, 'status' => 'Active'],
    ['id' => 3, 'customer_name' => 'Sana Khalid', 'phone' => '0301-5550203', 'balance' => 0, 'status' => 'Active'],
    ['id' => 4, 'customer_name' => 'Usman Farooq', 'phone' => '0302-5550204', 'balance' => 780, 'status' => 'Active'],
    ['id' => 5, 'customer_name' => 'Ayesha Noor', 'phone' => '0303-5550205', 'balance' => 0, 'status' => 'Active'],
    ['id' => 6, 'customer_name' => 'Hira Aslam', 'phone' => '0304-5550206', 'balance' => 450, 'status' => 'Active'],
    ['id' => 7, 'customer_name' => 'Ali Hassan', 'phone' => '0305-5550207', 'balance' => 0, 'status' => 'Active'],
    ['id' => 8, 'customer_name' => 'Mariam Iqbal', 'phone' => '0306-5550208', 'balance' => 920, 'status' => 'Active'],
];

$demoEmployees = [
    ['id' => 1, 'employee_name' => 'Ahmed Raza', 'role' => 'Store Manager', 'branch' => 'Main Branch', 'status' => 'Active'],
    ['id' => 2, 'employee_name' => 'Hamza Tariq', 'role' => 'Cashier', 'branch' => 'Main Branch', 'status' => 'Active'],
    ['id' => 3, 'employee_name' => 'Fatima Noor', 'role' => 'Inventory Assistant', 'branch' => 'Main Branch', 'status' => 'Active'],
    ['id' => 4, 'employee_name' => 'Usman Javed', 'role' => 'Sales Assistant', 'branch' => 'Main Branch', 'status' => 'Active'],
];

$demoBranches = [
    ['id' => 1, 'branch_name' => 'Main Branch', 'branch_code' => 'OKR-001', 'address' => 'Main Bazaar, Okara, Punjab', 'status' => 'Active'],
];

$demoExpenses = [
    ['id' => 1, 'title' => 'Shop Rent', 'type' => 'Rent', 'amount' => 35000],
    ['id' => 2, 'title' => 'Electricity Bill', 'type' => 'Utilities', 'amount' => 12800],
    ['id' => 3, 'title' => 'Staff Salaries', 'type' => 'Salaries', 'amount' => 52000],
    ['id' => 4, 'title' => 'Internet & Phone', 'type' => 'Utilities', 'amount' => 3500],
    ['id' => 5, 'title' => 'Shop Supplies', 'type' => 'General', 'amount' => 4200],
    ['id' => 6, 'title' => 'Delivery & Transport', 'type' => 'Transport', 'amount' => 6800],
];

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
$demoCustomerDue = array_sum(array_column($demoCustomers, 'balance'));
