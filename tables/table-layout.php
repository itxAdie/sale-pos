<?php
/**
 * Shared AdminLTE table/form layout.
 * Demo records are injected by page; this remains presentation-only.
 */
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

$tableDemoData = [];
if ($currentPage === 'all-products.php') {
    require_once __DIR__ . '/../data/demo-data.php';
    $tableDemoData = array_map(static function ($product) {
        return [
            'product' => $product['product'],
            'sku' => $product['sku'],
            'category' => $product['category'],
            'price' => 'Rs. ' . number_format((float) $product['price'], 2),
            'stock' => $product['stock'],
            'status' => $product['status'],
        ];
    }, $demoProducts);
}
?>
<main class="app-main">
  <?php include '../layout/page-header.php'; ?>
  <div class="app-content">
    <div class="container-fluid">
      <?php if ($pageMode === 'form'): ?>
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
            <div class="card-tools">
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
    columns: columns,
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
