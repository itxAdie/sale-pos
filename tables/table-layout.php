<?php
/**
 * Shared AdminLTE table/form layout with deterministic demo records.
 * Records are presentation-only; no database writes are performed here.
 */
require_once __DIR__ . '/../data/demo-data.php';
$pageMode = $pageConfig['mode'] ?? 'table';
$pageColumns = $pageConfig['columns'] ?? [];
$pageFields = $pageConfig['fields'] ?? [];
$pageActions = $pageConfig['actions'] ?? [];
$tableTitle = $pageConfig['tableTitle'] ?? ($pageTitle . ' List');
$tableColumnDefinitions = [];
foreach ($pageColumns as $column) {
    $field = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '_', $column), '_'));
    $tableColumnDefinitions[] = ['title' => $column, 'field' => $field, 'headerSort' => true];
}
$money = static function ($amount) {
    return 'Rs. ' . number_format((float) $amount, 2);
};
$tableDemoData = [];
switch ($currentPage) {
    case 'supplier-payments.php':
        $tableDemoData = array_map(static function ($p) use ($money) {
            return ['date'=>$p['date'],'payment_reference'=>$p['reference'],'supplier'=>$p['supplier'],'purchase_reference'=>$p['purchase_reference'],'amount'=>$money($p['amount']),'method'=>$p['method'],'status'=>$p['status']];
        }, $demoSupplierPayments);
        break;
    case 'inventory-adjustments.php':
        $tableDemoData = array_map(static function ($m) {
            return ['date'=>$m['date'],'reference'=>$m['reference'],'product'=>$m['product'],'sku'=>$m['product_sku'],'movement'=>$m['movement'],'quantity_change'=>($m['change'] > 0 ? '+' : '') . $m['change'],'stock_before'=>$m['stock_before'],'stock_after'=>$m['stock_after'],'reason'=>$m['reason'],'employee'=>$m['employee']];
        }, $demoStockMovements);
        break;
    case 'all-purchases.php':
        $tableDemoData = array_map(static function ($p) use ($money) {
            return ['reference'=>$p['reference'],'date'=>$p['date'],'supplier'=>$p['supplier'],'branch'=>$p['branch'],'items'=>$p['item_count'],'total'=>$money($p['total']),'discount'=>$money($p['discount']),'tax'=>$money($p['tax']),'paid_amount'=>$money($p['paid']),'due_amount'=>$money($p['due']),'payment_method'=>$p['payment_method'],'payment_reference'=>$p['payment_reference'],'received_status'=>$p['received_status'],'payment_status'=>$p['status']];
        }, $demoPurchases);
        break;
    case 'all-products.php':
        $tableDemoData = array_map(static function ($p) use ($money) {
            return ['product'=>$p['product'],'sku'=>$p['sku'],'barcode'=>$p['barcode'],'category'=>$p['category'],'unit'=>$p['unit'],'purchase_price'=>$money($p['purchase_price']),'selling_price'=>$money($p['price']),'pricing_type'=>$p['price_type'],'price_group'=>$p['price_group'],'stock_quantity'=>$p['stock'],'reorder_level'=>$p['reorder_level'],'status'=>$p['status']];
        }, $demoProducts);
        break;
    case 'all-branches.php':
        $tableDemoData = array_map(static function ($b) {
            return ['branch_name'=>$b['branch_name'],'branch_code'=>$b['branch_code'],'address'=>$b['address'],'city'=>$b['city'],'phone'=>$b['phone'],'manager'=>$b['manager'],'opening_date'=>$b['opening_date'],'status'=>$b['status']];
        }, $demoBranches);
        break;
    case 'all-suppliers.php':
        $tableDemoData = array_map(static function ($s) use ($money) {
            return ['supplier_name'=>$s['supplier_name'],'contact_person'=>$s['contact_person'],'phone'=>$s['phone'],'email'=>$s['email'],'address'=>$s['address'],'city'=>$s['city'],'opening_balance'=>$money($s['opening_balance']),'payment_terms'=>$s['payment_terms'],'status'=>$s['status']];
        }, $demoSuppliers);
        break;
    case 'all-sales.php':
        $tableDemoData = array_map(static function ($s) use ($money) {
            return ['invoice'=>$s['invoice'],'date'=>$s['date'],'customer'=>$s['customer'],'branch'=>$s['branch'],'total'=>$money($s['total']),'paid_amount'=>$money($s['paid_amount']),'due_amount'=>$money($s['due_amount']),'payment_method'=>$s['payment_method'],'items'=>$s['item_count'],'cashier'=>$s['cashier'],'discount'=>$money($s['discount']),'payment_status'=>$s['status']];
        }, $demoSales);
        break;
    case 'all-expenses.php':
        $tableDemoData = array_map(static function ($e) use ($money) {
            return ['expense'=>$e['reference'],'date'=>$e['date'],'expense_title'=>$e['title'],'expense_type'=>$e['type'],'branch'=>$e['branch'],'amount'=>$money($e['amount']),'payment_method'=>$e['payment_method'],'payment_reference'=>'—','description'=>$e['description'],'status'=>$e['status']];
        }, $demoExpenses);
        break;
    case 'expense-types.php':
        $tableDemoData = $demoExpenseTypes;
        break;
    case 'all-employees.php':
        $tableDemoData = array_map(static function ($e) {
            return ['employee_name'=>$e['employee_name'],'role'=>$e['role'],'phone'=>$e['phone'],'email'=>$e['email'],'branch'=>$e['branch'],'joining_date'=>$e['joining_date'],'employment_type'=>$e['employment_type'],'status'=>$e['status']];
        }, $demoEmployees);
        break;
    case 'branch-ledger.php':
        $tableDemoData = $demoBranchLedger;
        break;
    case 'supplier-ledger.php':
        $tableDemoData = $demoSupplierLedger;
        break;
    case 'sales-report.php':
        $tableDemoData = array_map(static function ($r) use ($money) {
            return ['date'=>$r['date'],'branch'=>$r['branch'],'invoices'=>$r['invoices'],'gross_sales'=>$money($r['gross_sales']),'discount'=>$money($r['discount']),'net_sales'=>$money($r['net_sales'])];
        }, $demoSalesReport);
        break;
    case 'expense-report.php':
        $tableDemoData = array_map(static function ($r) use ($money) {
            return ['date'=>$r['date'],'branch'=>$r['branch'],'expense_type'=>$r['expense_type'],'amount'=>$money($r['amount']),'notes'=>$r['notes']];
        }, $demoExpenseReport);
        break;
    case 'profit-loss.php':
        $tableDemoData = array_map(static function ($r) use ($money) {
            return ['period'=>$r['period'],'revenue'=>$money($r['revenue']),'cost_of_goods'=>$money($r['cost_of_goods']),'expenses'=>$money($r['expenses']),'net_profit_loss'=>$money($r['net_profit_loss'])];
        }, $demoProfitLoss);
        break;
    case 'users.php':
        $tableDemoData = $demoUsers;
        break;
    case 'tax.php':
        $tableDemoData = array_map(static function ($tax) { return ['tax_name'=>$tax['tax_name'],'tax_code'=>$tax['tax_code'],'rate'=>$tax['rate'],'applies_to'=>$tax['applies_to'],'calculation'=>$tax['calculation'],'effective_from'=>$tax['effective_from'],'status'=>$tax['status']]; }, $demoTaxRates);
        break;
}
$entityEditRoutes = [
    'all-suppliers.php' => 'edit-supplier.php',
    'all-employees.php' => 'edit-employee.php',
    'all-branches.php' => 'edit-branch.php',
    'all-expenses.php' => 'edit-expense.php',
];
if (isset($entityEditRoutes[$currentPage])) {
    foreach ($tableDemoData as $index => $record) {
        $tableDemoData[$index]['actions'] = $entityEditRoutes[$currentPage] . '?id=' . (int)($index + 1);
    }
    $tableColumnDefinitions[] = ['title'=>'Actions','field'=>'actions','headerSort'=>false,'formatter'=>'editLink'];
}
?>
  <main class="app-main">
  <?php include '../layout/page-header.php'; ?>
  <div class="app-content">
    <div class="container-fluid">
      <?php if ($currentPage === 'product-add.php'): ?>
        <form class="card" autocomplete="off" onsubmit="return false;">
          <div class="card-header"><h3 class="card-title">Product information</h3><span class="badge text-bg-light">UI preview</span></div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-lg-8">
                <label class="form-label" for="product-name">Product name <span class="text-danger">*</span></label>
                <input class="form-control" id="product-name" placeholder="e.g. Stainless Steel Tea Strainer" required>
              </div>
              <div class="col-lg-4">
                <label class="form-label" for="product-sku">SKU <span class="text-danger">*</span></label>
                <input class="form-control" id="product-sku" placeholder="e.g. NOM-0101" required>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="product-category">Category <span class="text-danger">*</span></label>
                <select class="form-select" id="product-category" required>
                  <option value="">Choose category</option>
                  <?php foreach ($demoCategories as $category): ?><option><?= htmlspecialchars($category, ENT_QUOTES, 'UTF-8') ?></option><?php endforeach; ?>
                  <option value="Other">Other / create later</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="product-unit">Unit</label>
                <select class="form-select" id="product-unit"><option>Piece</option><option>Pack</option><option>Pair</option><option>Dozen</option><option>Kg</option><option>Gram</option><option>Liter</option><option>Box</option></select>
              </div>
              <div class="col-12"><hr class="my-1"><h5 class="mb-0">Pricing</h5><p class="text-body-secondary small mb-0">Choose a configurable fixed-price group or set an individual selling price.</p></div>
              <div class="col-md-4">
                <label class="form-label" for="price-type">Pricing method</label>
                <select class="form-select" id="price-type"><option value="fixed">Fixed-price group</option><option value="variable">Variable / custom price</option></select>
              </div>
              <div class="col-md-4" id="fixed-group-wrap">
                <label class="form-label" for="fixed-group">Fixed-price group</label>
                <select class="form-select" id="fixed-group"><option value="100">Rs. 100</option><option value="250">Rs. 250</option><option value="500">Rs. 500</option><option value="750">Rs. 750</option><option value="1000">Rs. 1,000</option><option value="custom">Custom group (configure later)</option></select>
              </div>
              <div class="col-md-4">
                <label class="form-label" for="selling-price">Selling price (PKR) <span class="text-danger">*</span></label>
                <input class="form-control" type="number" min="0" step="0.01" id="selling-price" placeholder="0.00" required>
              </div>
              <div class="col-md-4">
                <label class="form-label" for="purchase-price">Purchase cost (PKR)</label>
                <input class="form-control" type="number" min="0" step="0.01" id="purchase-price" placeholder="0.00">
              </div>
              <div class="col-12"><hr class="my-1"><h5 class="mb-0">Barcode & inventory</h5></div>
              <div class="col-md-6">
                <label class="form-label" for="product-barcode">Existing manufacturer barcode</label>
                <input class="form-control" id="product-barcode" placeholder="Scan or enter existing barcode">
                <div class="form-text">Keep the manufacturer's barcode when one already exists.</div>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="internal-barcode">Internal barcode preview</label>
                <div class="input-group"><input class="form-control" id="internal-barcode" value="Generated when needed" readonly><button class="btn btn-outline-secondary" type="button" id="preview-barcode">Preview</button></div>
                <div class="form-text">Code 128 will be generated only when no usable barcode is supplied.</div>
              </div>
              <div class="col-md-4">
                <label class="form-label" for="opening-stock">Opening stock</label>
                <input class="form-control" type="number" min="0" step="1" id="opening-stock" value="0">
              </div>
              <div class="col-md-4">
                <label class="form-label" for="reorder-level">Low-stock alert at</label>
                <input class="form-control" type="number" min="0" step="1" id="reorder-level" value="5">
              </div>
              <div class="col-md-4">
                <label class="form-label" for="product-status">Status</label>
                <select class="form-select" id="product-status"><option>Active</option><option>Inactive</option></select>
              </div>
              <div class="col-12"><div class="alert alert-info mb-0"><i class="bi bi-info-circle me-1"></i>This is a front-end prototype. Product creation, barcode persistence and stock posting will be connected when the backend is implemented.</div></div>
            </div>
          </div>
          <div class="card-footer d-flex flex-wrap gap-2"><button class="btn btn-primary" type="button" disabled>Save product (backend pending)</button><a href="all-products.php" class="btn btn-outline-secondary">Cancel</a></div>
        </form>
        <script>
        document.addEventListener('DOMContentLoaded', function () {
          const type=document.getElementById('price-type'), group=document.getElementById('fixed-group'), price=document.getElementById('selling-price'), wrap=document.getElementById('fixed-group-wrap');
          function syncPrice(){const fixed=type.value==='fixed';wrap.classList.toggle('d-none',!fixed);if(fixed&&group.value!=='custom')price.value=group.value;price.readOnly=fixed&&group.value!=='custom';}
          type.addEventListener('change',syncPrice);group.addEventListener('change',syncPrice);syncPrice();
          document.getElementById('preview-barcode').addEventListener('click',function(){const sku=document.getElementById('product-sku').value.trim().toUpperCase().replace(/[^A-Z0-9]/g,'');document.getElementById('internal-barcode').value=sku?'INT-'+sku:'Enter an SKU first';});
          document.getElementById('product-barcode').addEventListener('input',function(){document.getElementById('internal-barcode').placeholder=this.value?'Manufacturer barcode supplied; internal barcode not required':'Preview internal Code 128';});
        });
        </script>
      <?php elseif (in_array($currentPage, ['add-supplier.php','edit-supplier.php','add-employee.php','edit-employee.php','add-branch.php','edit-branch.php','add-expense.php','edit-expense.php'], true)): ?>
        <?php
          $editing = strpos($currentPage, 'edit-') === 0;
          $entity = strpos($currentPage, 'supplier') !== false ? 'supplier' : (strpos($currentPage, 'employee') !== false ? 'employee' : (strpos($currentPage, 'branch') !== false ? 'branch' : 'expense'));
          $recordId = max(1, (int)($_GET['id'] ?? 1));
          $record = [];
          $entityRows = ['supplier'=>$demoSuppliers,'employee'=>$demoEmployees,'branch'=>$demoBranches,'expense'=>$demoExpenses];
          foreach ($entityRows[$entity] as $row) if ((int)$row['id'] === $recordId) { $record = $row; break; }
          if (!$record && $editing) $record = $entityRows[$entity][0] ?? [];
          $entityFields = [
            'supplier'=>[
              ['name'=>'supplier_name','label'=>'Supplier / Company Name','type'=>'text','required'=>true],
              ['name'=>'contact_person','label'=>'Contact Person','type'=>'text','required'=>true],
              ['name'=>'phone','label'=>'Phone Number','type'=>'tel','required'=>true],
              ['name'=>'email','label'=>'Email Address','type'=>'email'],
              ['name'=>'address','label'=>'Street Address','type'=>'text'],
              ['name'=>'city','label'=>'City','type'=>'select','options'=>['Okara','Lahore','Faisalabad','Multan','Other']],
              ['name'=>'opening_balance','label'=>'Opening Balance (PKR)','type'=>'number'],
              ['name'=>'payment_terms','label'=>'Payment Terms','type'=>'select','options'=>['Cash','7 days','15 days','30 days']],
              ['name'=>'status','label'=>'Status','type'=>'select','options'=>['Active','Inactive']],
            ],
            'employee'=>[
              ['name'=>'employee_name','label'=>'Full Name','type'=>'text','required'=>true],
              ['name'=>'role','label'=>'Role','type'=>'select','options'=>['Store Manager','Cashier','Inventory Assistant','Sales Assistant','Branch Manager','Accountant']],
              ['name'=>'phone','label'=>'Phone Number','type'=>'tel','required'=>true],
              ['name'=>'email','label'=>'Email Address','type'=>'email'],
              ['name'=>'branch','label'=>'Assigned Branch','type'=>'select','options'=>array_column($demoBranches,'branch_name')],
              ['name'=>'joining_date','label'=>'Joining Date','type'=>'date'],
              ['name'=>'employment_type','label'=>'Employment Type','type'=>'select','options'=>['Full-time','Part-time','Contract']],
              ['name'=>'status','label'=>'Employment Status','type'=>'select','options'=>['Active','Inactive']],
            ],
            'branch'=>[
              ['name'=>'branch_name','label'=>'Branch Name','type'=>'text','required'=>true],
              ['name'=>'branch_code','label'=>'Branch Code','type'=>'text','required'=>true],
              ['name'=>'address','label'=>'Full Address','type'=>'text','required'=>true],
              ['name'=>'city','label'=>'City','type'=>'text','required'=>true],
              ['name'=>'phone','label'=>'Contact Number','type'=>'tel'],
              ['name'=>'manager','label'=>'Branch Manager','type'=>'select','options'=>array_column($demoEmployees,'employee_name')],
              ['name'=>'opening_date','label'=>'Opening Date','type'=>'date'],
              ['name'=>'status','label'=>'Branch Status','type'=>'select','options'=>['Active','Inactive']],
            ],
            'expense'=>[
              ['name'=>'title','label'=>'Expense Title','type'=>'text','required'=>true],
              ['name'=>'type','label'=>'Expense Category','type'=>'select','options'=>array_column($demoExpenseTypes,'expense_type')],
              ['name'=>'branch','label'=>'Branch','type'=>'select','options'=>array_column($demoBranches,'branch_name')],
              ['name'=>'amount','label'=>'Amount (PKR)','type'=>'number','required'=>true],
              ['name'=>'date','label'=>'Expense Date','type'=>'date'],
              ['name'=>'payment_method','label'=>'Payment Method','type'=>'select','options'=>['Cash','Bank Transfer','Card']],
              ['name'=>'reference','label'=>'Payment / Voucher Reference','type'=>'text'],
              ['name'=>'description','label'=>'Description / Notes','type'=>'textarea'],
            ],
          ];
          $entityTitle = ucfirst($entity);
          $formTitle = ($editing ? 'Edit ' : 'Add ') . $entityTitle;
        ?>
        <div class="card">
          <div class="card-header"><h3 class="card-title"><?= htmlspecialchars($formTitle, ENT_QUOTES, 'UTF-8') ?></h3><span class="badge text-bg-light">Demo form</span></div>
          <form autocomplete="off" onsubmit="return false;">
            <div class="card-body"><div class="row g-3">
              <?php foreach ($entityFields[$entity] as $field): $value = $record[$field['name']] ?? ''; ?>
                <div class="<?= $field['type'] === 'textarea' ? 'col-12' : 'col-md-6' ?>">
                  <label class="form-label" for="<?= htmlspecialchars($field['name'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($field['label'], ENT_QUOTES, 'UTF-8') ?><?= !empty($field['required']) ? ' *' : '' ?></label>
                  <?php if ($field['type'] === 'select'): ?>
                    <select class="form-select" id="<?= htmlspecialchars($field['name'], ENT_QUOTES, 'UTF-8') ?>" <?= !empty($field['required']) ? 'required' : '' ?>>
                      <option value="">Select <?= htmlspecialchars(strtolower($field['label']), ENT_QUOTES, 'UTF-8') ?></option>
                      <?php foreach ($field['options'] as $option): ?><option value="<?= htmlspecialchars($option, ENT_QUOTES, 'UTF-8') ?>" <?= (string)$value === (string)$option ? 'selected' : '' ?>><?= htmlspecialchars($option, ENT_QUOTES, 'UTF-8') ?></option><?php endforeach; ?>
                    </select>
                  <?php elseif ($field['type'] === 'textarea'): ?>
                    <textarea class="form-control" id="<?= htmlspecialchars($field['name'], ENT_QUOTES, 'UTF-8') ?>" rows="3"><?= htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8') ?></textarea>
                  <?php else: ?>
                    <input class="form-control" id="<?= htmlspecialchars($field['name'], ENT_QUOTES, 'UTF-8') ?>" type="<?= htmlspecialchars($field['type'], ENT_QUOTES, 'UTF-8') ?>" value="<?= htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8') ?>" <?= !empty($field['required']) ? 'required' : '' ?> <?= $field['type'] === 'number' ? 'min="0" step="0.01"' : '' ?>>
                  <?php endif; ?>
                </div>
              <?php endforeach; ?>
            </div>
            <div class="alert alert-info mt-3 mb-0">Prototype only: form values are prefilled for editing, but saving and validation against stored records will be implemented with the backend.</div>
            </div>
            <div class="card-footer d-flex gap-2"><button type="button" class="btn btn-primary" disabled><?= $editing ? 'Update' : 'Save' ?> <?= htmlspecialchars($entityTitle, ENT_QUOTES, 'UTF-8') ?> (backend pending)</button><a href="<?= $entity === 'supplier' ? 'all-suppliers.php' : ($entity === 'employee' ? 'all-employees.php' : ($entity === 'branch' ? 'all-branches.php' : 'all-expenses.php')) ?>" class="btn btn-outline-secondary">Cancel</a></div>
          </form>
        </div>
      <?php elseif ($pageMode === 'form'): ?>
        <div class="card">
          <div class="card-header"><h3 class="card-title"><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></h3></div>
          <form method="post" action="" autocomplete="off">
            <div class="card-body">
              <div class="row">
                <?php foreach ($pageFields as $field): ?>
                  <?php
                    $label = $field['label'] ?? 'Field';
                    $type = $field['type'] ?? 'text';
                    $name = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '_', $label), '_'));
                  ?>
                  <div class="col-md-6 mb-3">
                    <label class="form-label" for="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?></label>
                    <?php if ($type === 'textarea'): ?>
                      <textarea class="form-control" id="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>" name="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>" rows="3"></textarea>
                    <?php else: ?>
                      <input class="form-control" id="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>" name="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>" type="<?= htmlspecialchars($type, ENT_QUOTES, 'UTF-8') ?>">
                    <?php endif; ?>
                  </div>
                <?php endforeach; ?>
              </div>
              <p class="small text-body-secondary mb-0">UI preview only. Saving is not connected to a backend yet.</p>
            </div>
            <div class="card-footer d-flex gap-2">
              <button type="submit" class="btn btn-primary" disabled>Save (not connected)</button>
              <a href="javascript:history.back()" class="btn btn-outline-secondary">Cancel</a>
            </div>
          </form>
        </div>
      <?php elseif ($pageMode === 'table'): ?>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><?= htmlspecialchars($tableTitle, ENT_QUOTES, 'UTF-8') ?></h3>
            <div class="card-tools d-flex align-items-center gap-2">
              <?php
                $addRoutes = ['all-suppliers.php'=>'add-supplier.php','all-employees.php'=>'add-employee.php','all-branches.php'=>'add-branch.php','all-expenses.php'=>'add-expense.php'];
                if (isset($addRoutes[$currentPage])): ?>
                  <a class="btn btn-sm btn-primary" href="<?= htmlspecialchars($addRoutes[$currentPage], ENT_QUOTES, 'UTF-8') ?>"><i class="bi bi-plus-lg me-1"></i>Add New</a>
              <?php endif; ?>
              <div class="input-group input-group-sm" style="width: 16rem">
                <span class="input-group-text"><i class="bi bi-search" aria-hidden="true"></i></span>
                <input id="table-filter" type="search" class="form-control" placeholder="Filter rows…" aria-label="Filter rows">
              </div>
            </div>
          </div>
          <div class="card-body">
            <?php if ($currentPage === 'all-products.php'): ?>
              <div class="row g-2 mb-3">
                <div class="col-sm-4"><div class="border rounded p-3"><div class="text-body-secondary small">Catalog products</div><strong><?= number_format(count($demoProducts)) ?></strong></div></div>
                <div class="col-sm-4"><div class="border rounded p-3"><div class="text-body-secondary small">Low stock</div><strong><?= number_format($demoLowStockCount) ?></strong></div></div>
                <div class="col-sm-4"><div class="border rounded p-3"><div class="text-body-secondary small">Out of stock</div><strong><?= number_format($demoOutOfStockCount) ?></strong></div></div>
              </div>
              <p class="small text-body-secondary">Sample inventory for Nomi Shopping Mall · Okara. Fixed-price groups and variable-price products are both represented.</p>
            <?php endif; ?>
            <div class="d-flex gap-2 mb-3">
              <button id="export-csv" type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-filetype-csv me-1" aria-hidden="true"></i>Export CSV</button>
              <button id="export-pdf" type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-filetype-pdf me-1" aria-hidden="true"></i>Export PDF</button>
              <button id="print-table" type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-printer me-1" aria-hidden="true"></i>Print</button>
            </div>
            <div id="users-table" aria-label="<?= htmlspecialchars($tableTitle, ENT_QUOTES, 'UTF-8') ?>"></div>
            <div id="table-pagination" class="d-flex flex-wrap gap-2 justify-content-end mt-2"></div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</main>
<?php if ($pageMode === 'table'): ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tabulator-tables@6.6.1/dist/css/tabulator_bootstrap5.min.css" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/tabulator-tables@6.6.1/dist/js/tabulator.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jspdf@2.5.2/dist/jspdf.umd.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jspdf-autotable@3.8.4/dist/jspdf.plugin.autotable.min.js" crossorigin="anonymous"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const tableElement = document.getElementById('users-table');
  if (!tableElement || typeof Tabulator === 'undefined') return;

  const columns = <?= json_encode($tableColumnDefinitions, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
  const records = <?= json_encode($tableDemoData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
  const table = new Tabulator(tableElement, {
    data: records,
    columns: columns.map(column => column.field === 'actions' ? {...column, formatter: function(cell) { const url=String(cell.getValue() || '#'); return '<a class="btn btn-sm btn-outline-primary" href="' + url.replace(/&/g, '&amp;').replace(/"/g, '&quot;') + '">Edit</a>'; }} : column),
    layout: 'fitColumns',
    placeholder: 'No demo records are configured for this page yet.',
    pagination: true,
    paginationElement: document.getElementById('table-pagination'),
    paginationSize: 10,
    paginationSizeSelector: [10, 25, 50, 100],
    movableColumns: true,
    responsiveLayout: 'hide',
  });

  const filter = document.getElementById('table-filter');
  filter?.addEventListener('input', function () {
    const query = this.value.trim().toLocaleLowerCase();
    if (!query) return table.clearFilter();
    table.setFilter(row => Object.values(row).some(value => String(value ?? '').toLocaleLowerCase().includes(query)));
  });

  document.getElementById('export-csv')?.addEventListener('click', () => table.download('csv', '<?= htmlspecialchars(preg_replace('/[^a-zA-Z0-9_-]+/', '-', strtolower($currentPage)), ENT_QUOTES, 'UTF-8') ?>.csv'));
  document.getElementById('export-pdf')?.addEventListener('click', () => {
    if (typeof window.jspdf === 'undefined') return window.alert('PDF export library could not be loaded.');
    table.download('pdf', '<?= htmlspecialchars(preg_replace('/[^a-zA-Z0-9_-]+/', '-', strtolower($currentPage)), ENT_QUOTES, 'UTF-8') ?>.pdf', {orientation: 'landscape', title: <?= json_encode($tableTitle) ?>});
  });
  document.getElementById('print-table')?.addEventListener('click', () => table.print(false, true));
});
</script>
<?php endif; ?>
