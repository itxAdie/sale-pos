<?php
/**
 * Shared AdminLTE page heading and breadcrumb renderer.
 * Include this inside <main class="app-main">.
 */
$pageTitle = $pageTitle ?? 'Page';
$pageBreadcrumbs = $pageBreadcrumbs ?? [['label' => 'Home', 'url' => 'dashboard.php'], ['label' => $pageTitle]];
?>
<div class="app-content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h1 class="mb-0 fs-3"><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></h1>
      </div>
      <div class="col-sm-6">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb float-sm-end">
            <?php foreach ($pageBreadcrumbs as $index => $crumb): ?>
              <?php $isLast = $index === array_key_last($pageBreadcrumbs); ?>
              <li class="breadcrumb-item<?= $isLast ? ' active' : '' ?>"<?= $isLast ? ' aria-current="page"' : '' ?>>
                <?php if (!$isLast && !empty($crumb['url'])): ?>
                  <a href="<?= htmlspecialchars($crumb['url'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($crumb['label'], ENT_QUOTES, 'UTF-8') ?></a>
                <?php else: ?>
                  <?= htmlspecialchars($crumb['label'], ENT_QUOTES, 'UTF-8') ?>
                <?php endif; ?>
              </li>
            <?php endforeach; ?>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>