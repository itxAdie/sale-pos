<?php
/**
 * Shared AdminLTE table/form layout.
 * Table pages use the same Tabulator structure and controls throughout the app.
 */
$pageMode = $pageConfig['mode'] ?? 'table';
$pageColumns = $pageConfig['columns'] ?? [];
$pageFields = $pageConfig['fields'] ?? [];
$pageActions = $pageConfig['actions'] ?? [];
$tableTitle = $pageConfig['tableTitle'] ?? ($pageTitle . ' List');
$tableColumnDefinitions = [];
foreach ($pageColumns as $index => $column) {
    $field = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '_', $column), '_'));
    $tableColumnDefinitions[] = [
        'title' => $column,
        'field' => $field,
        'headerSort' => true,
    ];
}
?>
<main class="app-main">
  <?php include '../layout/page-header.php'; ?>
  <div class="app-content">
    <div class="container-fluid">
      <?php if ($pageMode === 'form'): ?>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></h3>
          </div>
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
              <p class="small text-body-secondary mb-0">This is a UI scaffold. Saving is not connected to a backend yet.</p>
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
                <span class="input-group-text">
                  <i class="bi bi-search" aria-hidden="true"></i>
                </span>
                <input
                  id="table-filter"
                  type="search"
                  class="form-control"
                  placeholder="Filter rows&hellip;"
                  aria-label="Filter rows"
                />
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex gap-2 mb-3">
              <button id="export-csv" type="button" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-filetype-csv me-1" aria-hidden="true"></i>
                Export CSV
              </button>
              <button id="export-pdf" type="button" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-filetype-pdf me-1" aria-hidden="true"></i>
                Export PDF
              </button>
              <button id="print-table" type="button" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-printer me-1" aria-hidden="true"></i>
                Print
              </button>
            </div>
            <div id="users-table" aria-label="Users"></div>
            <div
              id="table-pagination"
              class="d-flex flex-wrap gap-2 justify-content-end mt-2"
            ></div>
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
  const table = new Tabulator('#users-table', {
    data: [],
    columns: columns,
    layout: 'fitColumns',
    placeholder: 'No records to display.',
    pagination: true,
    paginationElement: document.getElementById('table-pagination'),
    paginationSize: 10,
    paginationSizeSelector: [10, 25, 50, 100],
    movableColumns: true,
  });

  document.getElementById('table-filter').addEventListener('input', function () {
    const query = this.value.trim().toLocaleLowerCase();
    if (!query) {
      table.clearFilter();
      return;
    }
    table.setFilter(function (rowData) {
      return Object.values(rowData).some(function (value) {
        return String(value ?? '').toLocaleLowerCase().includes(query);
      });
    });
  });

  document.getElementById('export-csv').addEventListener('click', function () {
    table.download('csv', '<?= htmlspecialchars(preg_replace('/[^a-zA-Z0-9_-]+/', '-', strtolower($currentPage)), ENT_QUOTES, 'UTF-8') ?>.csv');
  });

  document.getElementById('export-pdf').addEventListener('click', function () {
    if (typeof window.jspdf === 'undefined') {
      window.alert('PDF export library could not be loaded.');
      return;
    }
    table.download('pdf', '<?= htmlspecialchars(preg_replace('/[^a-zA-Z0-9_-]+/', '-', strtolower($currentPage)), ENT_QUOTES, 'UTF-8') ?>.pdf', {
      orientation: 'landscape',
      title: <?= json_encode($tableTitle) ?>,
    });
  });

  document.getElementById('print-table').addEventListener('click', function () {
    table.print(false, true);
  });
});
</script>
<?php endif; ?>
