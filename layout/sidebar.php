<?php $currentPage = basename($_SERVER['PHP_SELF']); ?>
      <!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="./dashboard.php" class="brand-link">
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Nomi Shopping Mall</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Search-->
        <div class="sidebar-search" role="search">
          <label for="sidebar-search-input" class="visually-hidden">Filter menu</label>
          <input
            type="search"
            id="sidebar-search-input"
            class="form-control form-control-sm"
            placeholder="Filter menu…"
            autocomplete="off"
            data-lte-toggle="sidebar-search"
            data-lte-target="#navigation"
          />
          <p class="fs-7 text-secondary mt-2 mb-0" data-lte-search-empty role="status" hidden>
            No matching pages.
          </p>
        </div>
        <!--end::Sidebar Search-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2" aria-label="Main navigation">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              data-accordion="false"
              id="navigation"
            >
              <li class="nav-item">
                    <a
                      href="./dashboard.php"
                      class="nav-link<?= $currentPage === 'dashboard.php' ? ' active' : '' ?>"
                      <?= $currentPage === 'dashboard.php' ? 'aria-current="page"' : '' ?>
                    >
                      <i class="nav-icon bi bi-speedometer"></i>
                      <p>Dashboard</p>
                    </a>
              </li>
              <li class="nav-item">
                <a
                  href="./pos.php"
                  class="nav-link<?= $currentPage === 'pos.php' ? ' active' : '' ?>"
                  <?= $currentPage === 'pos.php' ? 'aria-current="page"' : '' ?>
                >
                  <i class="nav-icon bi bi-shop-window"></i>
                  <p>POS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-box-seam-fill"></i>
                  <p>
                    Products
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a 
                    href="./all-products.php"
                  class="nav-link<?= $currentPage === 'all-products.php' ? ' active' : '' ?>"
                  <?= $currentPage === 'all-products.php' ? 'aria-current="page"' : '' ?>
                  >
                      <i class="nav-icon bi bi-cart"></i>
                      <p>All Products</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./product-add.php" class="nav-link<?= $currentPage === 'product-add.php' ? ' active' : '' ?>">
                      <i class="nav-icon bi bi-cart-plus"></i>
                      <p>Add Product</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./generate-tags.php" class="nav-link<?= $currentPage === 'generate-tags.php' ? ' active' : '' ?>">
                      <i class="nav-icon bi bi-upc"></i>
                      <p>Genrate Tags</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-shop"></i>
                  <p>
                    Branches
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./all-branches.php" class="nav-link<?= $currentPage === 'all-branches.php' ? ' active' : '' ?>">
                      <i class="nav-icon bi bi-door-closed"></i>
                      <p>All Branches</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./add-branch.php" class="nav-link<?= $currentPage === 'add-branch.php' ? ' active' : '' ?>">
                      <i class="nav-icon bi bi-door-open"></i>
                      <p>Add Branch</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-truck"></i>
                  <p>
                    Suppliers
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./all-suppliers.php" class="nav-link<?= $currentPage === 'all-suppliers.php' ? ' active' : '' ?>">
                      <i class="nav-icon bi bi-people"></i>
                      <p>All Suppliers</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./add-supplier.php" class="nav-link<?= $currentPage === 'add-supplier.php' ? ' active' : '' ?>">
                      <i class="nav-icon bi bi-person-add"></i>
                      <p>Add Supplier</p>
                    </a>
                  </li>
                </ul>
              </li>
               <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-cash"></i>
                  <p>
                    Sales
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./all-sales.php" class="nav-link<?= $currentPage === 'all-sales.php' ? ' active' : '' ?>">
                      <i class="nav-icon bi bi-cash-coin"></i>
                      <p>All Sales</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./add-sale.php" class="nav-link<?= $currentPage === 'add-sale.php' ? ' active' : '' ?>">
                      <i class="nav-icon bi bi-cash-stack"></i>
                      <p>Add Sale</p>
                    </a>
                  </li>
                </ul>
              </li>
               <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-receipt-cutoff"></i>
                  <p>
                    Expenses
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./all-expenses.php" class="nav-link<?= $currentPage === 'all-expenses.php' ? ' active' : '' ?>">
                      <i class="nav-icon bi bi-cash-coin"></i>
                      <p>All Expenses</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./add-expense.php" class="nav-link<?= $currentPage === 'add-expense.php' ? ' active' : '' ?>">
                      <i class="nav-icon bi bi-cash-stack"></i>
                      <p>Add Expense</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./expense-types.php" class="nav-link<?= $currentPage === 'expense-types.php' ? ' active' : '' ?>">
                      <i class="nav-icon bi bi-cash"></i>
                      <p>Expense Type</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-people-fill"></i>
                  <p>
                    Employees
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./all-employees.php" class="nav-link<?= $currentPage === 'all-employees.php' ? ' active' : '' ?>">
                      <i class="nav-icon bi bi-people"></i>
                      <p>All Employees</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./add-employee.php" class="nav-link<?= $currentPage === 'add-employee.php' ? ' active' : '' ?>">
                      <i class="nav-icon bi bi-person-add"></i>
                      <p>Add Employee</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-clipboard2-data"></i>
                  <p>
                    Ledger
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./branch-ledger.php" class="nav-link<?= $currentPage === 'branch-ledger.php' ? ' active' : '' ?>">
                      <i class="nav-icon bi bi-shop"></i>
                      <p>Branch Ledger</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./supplier-ledger.php" class="nav-link<?= $currentPage === 'supplier-ledger.php' ? ' active' : '' ?>">
                      <i class="nav-icon bi bi-people"></i>
                      <p>Supplier Ledger</p>
                    </a>
                  </li>
                </ul>
              </li>
               <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-graph-up"></i>
                  <p>
                    Reports
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./sales-report.php" class="nav-link<?= $currentPage === 'sales-report.php' ? ' active' : '' ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Sales Report</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./expense-report.php" class="nav-link<?= $currentPage === 'expense-report.php' ? ' active' : '' ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Expense report</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./profit-loss.php" class="nav-link<?= $currentPage === 'profit-loss.php' ? ' active' : '' ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Profit/Loss Statement</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                 <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-postcard"></i>
                  <p>
                    Users
                  </p>
                </a>
              </li>
              <li class="nav-item">
                 <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-sticky"></i>
                  <p>
                    Tax
                  </p>
                </a>
              </li>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->