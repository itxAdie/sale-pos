<?php
/**
 * Shared AdminLTE content layout for table and form pages.
 * Include after page-config.php and the shared header/sidebar.
 */
$pageMode = $pageConfig['mode'] ?? 'table';
$pageColumns = $pageConfig['columns'] ?? [];
$pageFields = $pageConfig['fields'] ?? [];
$pageActions = $pageConfig['actions'] ?? [];
?>
<main class="app-main">
  <?php include '../layout/page-header.php'; ?>
  <div class="app-content"><div class="container-fluid">
    <?php if ($pageMode === 'form'): ?>
      <div class="card">
        <div class="card-header"><h3 class="card-title"><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></h3></div>
        <form method="post" action="" autocomplete="off">
          <div class="card-body"><div class="row">
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
    <?php else: ?>
      <div class="card">
        <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
          <h3 class="card-title"><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></h3>
          <div class="card-tools d-flex flex-wrap gap-2">
            <div class="input-group input-group-sm" style="width:16rem">
              <span class="input-group-text"><i class="bi bi-search" aria-hidden="true"></i></span>
              <input id="table-filter" type="search" class="form-control" placeholder="Filter rows…" aria-label="Filter rows">
            </div>
            <?php foreach ($pageActions as $action): ?>
              <a class="btn btn-sm btn-primary" href="<?= htmlspecialchars($action['url'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($action['label'], ENT_QUOTES, 'UTF-8') ?></a>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="card-body"><div class="table-responsive">
          <table class="table table-hover align-middle" id="shared-data-table">
            <thead><tr><?php foreach ($pageColumns as $column): ?><th scope="col"><?= htmlspecialchars($column, ENT_QUOTES, 'UTF-8') ?></th><?php endforeach; ?></tr></thead>
            <tbody><tr><td colspan="<?= max(count($pageColumns), 1) ?>" class="text-center text-body-secondary py-5">No records to display. Connect this page to its data source to show records.</td></tr></tbody>
          </table>
        </div></div>
        <div class="card-footer text-body-secondary small">Showing 0 records</div>
      </div>
    <?php endif; ?>
  </div></div>
</main>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const filter = document.getElementById('table-filter');
  const table = document.getElementById('shared-data-table');
  if (!filter || !table) return;
  filter.addEventListener('input', function () {
    const query = this.value.trim().toLocaleLowerCase();
    table.querySelectorAll('tbody tr').forEach(function (row) {
      row.hidden = !row.textContent.toLocaleLowerCase().includes(query);
    });
  });
});
</script>
