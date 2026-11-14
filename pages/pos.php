<!doctype html>
<html lang="en">
  <?php include '../include/head.php'; ?>
  <style>
    @page {
      margin: 0;
    }

    @media print {
      body * {
        visibility: hidden !important;
      }

      .app-header,
      .app-sidebar,
      .app-footer,
      .app-content-header,
      .app-content > .container-fluid > .row > .col-lg-8 {
        display: none !important;
      }

      .app-wrapper,
      .app-main,
      .app-content,
      .app-content > .container-fluid,
      .app-content > .container-fluid > .row,
      .app-content > .container-fluid > .row > .col-lg-4 {
        display: block !important;
        width: 100% !important;
        max-width: none !important;
        margin: 0 !important;
        padding: 0 !important;
      }

      #pos-invoice,
      #pos-invoice * {
        visibility: visible !important;
      }

      #pos-invoice {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        margin: 0 !important;
        border: 0;
        box-shadow: none !important;
      }

      #pos-invoice .card-body {
        padding: 8mm !important;
      }

      #pos-invoice .table-responsive {
        overflow: visible !important;
      }

      #pos-invoice .no-print {
        display: none !important;
      }
    }
  </style>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      
    <?php 
    include '../layout/header.php';
    include '../layout/sidebar.php'; ?>

      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h1 class="mb-0 fs-3">POS</h1>
              </div>
              <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">POS</li>
                  </ol>
                </nav>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-8">
            <!--begin::Card-->
            <div class="card">
              <!--begin::Card Header-->
              <div class="card-header d-flex flex-wrap align-items-center gap-2">
                <div class="card-title">All Products</div>
                <div class="card-tools">
                  <div
                    class="btn-group btn-group-sm"
                    role="group"
                    aria-label="Filter by category"
                    id="gallery-filters"
                  >
                    <button
                      type="button"
                      class="btn btn-primary"
                      data-gallery-filter="all"
                      aria-pressed="true"
                    >
                      All</button
                    ><button
                      type="button"
                      class="btn btn-outline-primary"
                      data-gallery-filter="places"
                      aria-pressed="false"
                    >
                      Places</button
                    ><button
                      type="button"
                      class="btn btn-outline-primary"
                      data-gallery-filter="products"
                      aria-pressed="false"
                    >
                      Products</button
                    ><button
                      type="button"
                      class="btn btn-outline-primary"
                      data-gallery-filter="interiors"
                      aria-pressed="false"
                    >
                      Interiors</button
                    ><button
                      type="button"
                      class="btn btn-outline-primary"
                      data-gallery-filter="people"
                      aria-pressed="false"
                    >
                      People
                    </button>
                  </div>
                </div>
              </div>
              <!--end::Card Header-->
              <!--begin::Card Body-->
              <div class="card-body">
                <!--begin::Gallery Grid-->
                <div
                  class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xxl-4 g-3"
                  id="gallery-grid"
                >
                  <div class="col" data-gallery-item="places">
                    <figure class="card h-100 mb-0">
                      <div class="ratio ratio-4x3">
                        <img
                          src="../assets/img/photo1.png"
                          alt="Old town at dusk"
                          class="card-img-top object-fit-cover"
                          loading="lazy"
                        />
                      </div>
                      <figcaption class="card-body d-flex align-items-start gap-2 py-2">
                        <div class="flex-grow-1 overflow-hidden">
                          <p class="fw-semibold mb-0 text-truncate">Old town at dusk</p>
                          <p class="fs-7 text-body-secondary mb-0">4.2 MB · 3840×2160</p>
                        </div>
                        <div class="dropdown flex-shrink-0">
                          <button
                            class="btn btn-tool"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            aria-label="Actions for Old town at dusk"
                          >
                            <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                              <a class="dropdown-item" href="#">Update</a>
                            </li>
                          </ul>
                        </div>
                      </figcaption>
                    </figure>
                  </div>
                  <div class="col" data-gallery-item="products">
                    <figure class="card h-100 mb-0">
                      <div class="ratio ratio-4x3">
                        <img
                          src="../assets/img/prod-1.jpg"
                          alt="Trail boot, three-quarter"
                          class="card-img-top object-fit-cover"
                          loading="lazy"
                        />
                      </div>
                      <figcaption class="card-body d-flex align-items-start gap-2 py-2">
                        <div class="flex-grow-1 overflow-hidden">
                          <p class="fw-semibold mb-0 text-truncate">Trail boot, three-quarter</p>
                          <p class="fs-7 text-body-secondary mb-0">1.1 MB · 1600×1600</p>
                        </div>
                        <div class="dropdown flex-shrink-0">
                          <button
                            class="btn btn-tool"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            aria-label="Actions for Trail boot, three-quarter"
                          >
                            <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                              <a class="dropdown-item" href="#">Update</a>
                            </li>
                              <li>
                              <a class="dropdown-item text-danger" href="#"> Delete </a>
                            </li>
                          </ul>
                        </div>
                      </figcaption>
                    </figure>
                  </div>
                  <div class="col" data-gallery-item="people">
                    <figure class="card h-100 mb-0">
                      <div class="ratio ratio-4x3">
                        <img
                          src="../assets/img/photo3.jpg"
                          alt="Reading by lamplight"
                          class="card-img-top object-fit-cover"
                          loading="lazy"
                        />
                      </div>
                      <figcaption class="card-body d-flex align-items-start gap-2 py-2">
                        <div class="flex-grow-1 overflow-hidden">
                          <p class="fw-semibold mb-0 text-truncate">Reading by lamplight</p>
                          <p class="fs-7 text-body-secondary mb-0">3.8 MB · 3200×2133</p>
                        </div>
                        <div class="dropdown flex-shrink-0">
                          <button
                            class="btn btn-tool"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            aria-label="Actions for Reading by lamplight"
                          >
                            <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                              <a class="dropdown-item" href="#">Download</a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="#">Rename</a>
                            </li>
                            <li><hr class="dropdown-divider" /></li>
                            <li>
                              <a class="dropdown-item text-danger" href="#"> Delete </a>
                            </li>
                          </ul>
                        </div>
                      </figcaption>
                    </figure>
                  </div>
                  <div class="col" data-gallery-item="products">
                    <figure class="card h-100 mb-0">
                      <div class="ratio ratio-4x3">
                        <img
                          src="../assets/img/prod-2.jpg"
                          alt="Trail boot, profile"
                          class="card-img-top object-fit-cover"
                          loading="lazy"
                        />
                      </div>
                      <figcaption class="card-body d-flex align-items-start gap-2 py-2">
                        <div class="flex-grow-1 overflow-hidden">
                          <p class="fw-semibold mb-0 text-truncate">Trail boot, profile</p>
                          <p class="fs-7 text-body-secondary mb-0">980 KB · 1600×1600</p>
                        </div>
                        <div class="dropdown flex-shrink-0">
                          <button
                            class="btn btn-tool"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            aria-label="Actions for Trail boot, profile"
                          >
                            <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                              <a class="dropdown-item" href="#">Download</a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="#">Rename</a>
                            </li>
                            <li><hr class="dropdown-divider" /></li>
                            <li>
                              <a class="dropdown-item text-danger" href="#"> Delete </a>
                            </li>
                          </ul>
                        </div>
                      </figcaption>
                    </figure>
                  </div>
                  <div class="col" data-gallery-item="interiors">
                    <figure class="card h-100 mb-0">
                      <div class="ratio ratio-4x3">
                        <img
                          src="../assets/img/photo2.png"
                          alt="Dining area, morning"
                          class="card-img-top object-fit-cover"
                          loading="lazy"
                        />
                      </div>
                      <figcaption class="card-body d-flex align-items-start gap-2 py-2">
                        <div class="flex-grow-1 overflow-hidden">
                          <p class="fw-semibold mb-0 text-truncate">Dining area, morning</p>
                          <p class="fs-7 text-body-secondary mb-0">2.6 MB · 2560×1707</p>
                        </div>
                        <div class="dropdown flex-shrink-0">
                          <button
                            class="btn btn-tool"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            aria-label="Actions for Dining area, morning"
                          >
                            <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                              <a class="dropdown-item" href="#">Download</a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="#">Rename</a>
                            </li>
                            <li><hr class="dropdown-divider" /></li>
                            <li>
                              <a class="dropdown-item text-danger" href="#"> Delete </a>
                            </li>
                          </ul>
                        </div>
                      </figcaption>
                    </figure>
                  </div>
                  <div class="col" data-gallery-item="products">
                    <figure class="card h-100 mb-0">
                      <div class="ratio ratio-4x3">
                        <img
                          src="../assets/img/prod-3.jpg"
                          alt="Trail boot, outsole"
                          class="card-img-top object-fit-cover"
                          loading="lazy"
                        />
                      </div>
                      <figcaption class="card-body d-flex align-items-start gap-2 py-2">
                        <div class="flex-grow-1 overflow-hidden">
                          <p class="fw-semibold mb-0 text-truncate">Trail boot, outsole</p>
                          <p class="fs-7 text-body-secondary mb-0">1.4 MB · 1600×1600</p>
                        </div>
                        <div class="dropdown flex-shrink-0">
                          <button
                            class="btn btn-tool"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            aria-label="Actions for Trail boot, outsole"
                          >
                            <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                              <a class="dropdown-item" href="#">Download</a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="#">Rename</a>
                            </li>
                            <li><hr class="dropdown-divider" /></li>
                            <li>
                              <a class="dropdown-item text-danger" href="#"> Delete </a>
                            </li>
                          </ul>
                        </div>
                      </figcaption>
                    </figure>
                  </div>
                  <div class="col" data-gallery-item="places">
                    <figure class="card h-100 mb-0">
                      <div class="ratio ratio-4x3">
                        <img
                          src="../assets/img/photo4.jpg"
                          alt="Canal at first light"
                          class="card-img-top object-fit-cover"
                          loading="lazy"
                        />
                      </div>
                      <figcaption class="card-body d-flex align-items-start gap-2 py-2">
                        <div class="flex-grow-1 overflow-hidden">
                          <p class="fw-semibold mb-0 text-truncate">Canal at first light</p>
                          <p class="fs-7 text-body-secondary mb-0">3.1 MB · 3000×2000</p>
                        </div>
                        <div class="dropdown flex-shrink-0">
                          <button
                            class="btn btn-tool"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            aria-label="Actions for Canal at first light"
                          >
                            <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                              <a class="dropdown-item" href="#">Download</a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="#">Rename</a>
                            </li>
                            <li><hr class="dropdown-divider" /></li>
                            <li>
                              <a class="dropdown-item text-danger" href="#"> Delete </a>
                            </li>
                          </ul>
                        </div>
                      </figcaption>
                    </figure>
                  </div>
                  <div class="col" data-gallery-item="products">
                    <figure class="card h-100 mb-0">
                      <div class="ratio ratio-4x3">
                        <img
                          src="../assets/img/prod-4.jpg"
                          alt="Trail boot, heel detail"
                          class="card-img-top object-fit-cover"
                          loading="lazy"
                        />
                      </div>
                      <figcaption class="card-body d-flex align-items-start gap-2 py-2">
                        <div class="flex-grow-1 overflow-hidden">
                          <p class="fw-semibold mb-0 text-truncate">Trail boot, heel detail</p>
                          <p class="fs-7 text-body-secondary mb-0">1.2 MB · 1600×1600</p>
                        </div>
                        <div class="dropdown flex-shrink-0">
                          <button
                            class="btn btn-tool"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            aria-label="Actions for Trail boot, heel detail"
                          >
                            <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                              <a class="dropdown-item" href="#">Download</a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="#">Rename</a>
                            </li>
                            <li><hr class="dropdown-divider" /></li>
                            <li>
                              <a class="dropdown-item text-danger" href="#"> Delete </a>
                            </li>
                          </ul>
                        </div>
                      </figcaption>
                    </figure>
                  </div>
                  <div class="col" data-gallery-item="interiors">
                    <figure class="card h-100 mb-0">
                      <div class="ratio ratio-4x3">
                        <img
                          src="../assets/img/photo2.png"
                          alt="Dining area, wide"
                          class="card-img-top object-fit-cover"
                          loading="lazy"
                        />
                      </div>
                      <figcaption class="card-body d-flex align-items-start gap-2 py-2">
                        <div class="flex-grow-1 overflow-hidden">
                          <p class="fw-semibold mb-0 text-truncate">Dining area, wide</p>
                          <p class="fs-7 text-body-secondary mb-0">2.6 MB · 2560×1707</p>
                        </div>
                        <div class="dropdown flex-shrink-0">
                          <button
                            class="btn btn-tool"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            aria-label="Actions for Dining area, wide"
                          >
                            <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                              <a class="dropdown-item" href="#">Download</a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="#">Rename</a>
                            </li>
                            <li><hr class="dropdown-divider" /></li>
                            <li>
                              <a class="dropdown-item text-danger" href="#"> Delete </a>
                            </li>
                          </ul>
                        </div>
                      </figcaption>
                    </figure>
                  </div>
                  <div class="col" data-gallery-item="products">
                    <figure class="card h-100 mb-0">
                      <div class="ratio ratio-4x3">
                        <img
                          src="../assets/img/prod-5.jpg"
                          alt="Trail boot, upper"
                          class="card-img-top object-fit-cover"
                          loading="lazy"
                        />
                      </div>
                      <figcaption class="card-body d-flex align-items-start gap-2 py-2">
                        <div class="flex-grow-1 overflow-hidden">
                          <p class="fw-semibold mb-0 text-truncate">Trail boot, upper</p>
                          <p class="fs-7 text-body-secondary mb-0">1.0 MB · 1600×1600</p>
                        </div>
                        <div class="dropdown flex-shrink-0">
                          <button
                            class="btn btn-tool"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            aria-label="Actions for Trail boot, upper"
                          >
                            <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                              <a class="dropdown-item" href="#">Download</a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="#">Rename</a>
                            </li>
                            <li><hr class="dropdown-divider" /></li>
                            <li>
                              <a class="dropdown-item text-danger" href="#"> Delete </a>
                            </li>
                          </ul>
                        </div>
                      </figcaption>
                    </figure>
                  </div>
                  <div class="col" data-gallery-item="places">
                    <figure class="card h-100 mb-0">
                      <div class="ratio ratio-4x3">
                        <img
                          src="../assets/img/photo1.png"
                          alt="Narrow street"
                          class="card-img-top object-fit-cover"
                          loading="lazy"
                        />
                      </div>
                      <figcaption class="card-body d-flex align-items-start gap-2 py-2">
                        <div class="flex-grow-1 overflow-hidden">
                          <p class="fw-semibold mb-0 text-truncate">Narrow street</p>
                          <p class="fs-7 text-body-secondary mb-0">4.2 MB · 3840×2160</p>
                        </div>
                        <div class="dropdown flex-shrink-0">
                          <button
                            class="btn btn-tool"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            aria-label="Actions for Narrow street"
                          >
                            <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                              <a class="dropdown-item" href="#">Download</a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="#">Rename</a>
                            </li>
                            <li><hr class="dropdown-divider" /></li>
                            <li>
                              <a class="dropdown-item text-danger" href="#"> Delete </a>
                            </li>
                          </ul>
                        </div>
                      </figcaption>
                    </figure>
                  </div>
                  <div class="col" data-gallery-item="places">
                    <figure class="card h-100 mb-0">
                      <div class="ratio ratio-4x3">
                        <img
                          src="../assets/img/photo4.jpg"
                          alt="Canal, long exposure"
                          class="card-img-top object-fit-cover"
                          loading="lazy"
                        />
                      </div>
                      <figcaption class="card-body d-flex align-items-start gap-2 py-2">
                        <div class="flex-grow-1 overflow-hidden">
                          <p class="fw-semibold mb-0 text-truncate">Canal, long exposure</p>
                          <p class="fs-7 text-body-secondary mb-0">3.1 MB · 3000×2000</p>
                        </div>
                        <div class="dropdown flex-shrink-0">
                          <button
                            class="btn btn-tool"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            aria-label="Actions for Canal, long exposure"
                          >
                            <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                              <a class="dropdown-item" href="#">Download</a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="#">Rename</a>
                            </li>
                            <li><hr class="dropdown-divider" /></li>
                            <li>
                              <a class="dropdown-item text-danger" href="#"> Delete </a>
                            </li>
                          </ul>
                        </div>
                      </figcaption>
                    </figure>
                  </div>
                </div>
                <!--end::Gallery Grid-->
                <!--begin::Empty State-->
                <p
                  class="text-body-secondary text-center my-5"
                  id="gallery-empty"
                  role="status"
                  hidden
                >
                  Nothing in this category yet.
                </p>
                <!--end::Empty State-->
              </div>
              <!--end::Card Body-->
              <!--begin::Card Footer-->
              <div
                class="card-footer d-flex flex-wrap justify-content-between align-items-center gap-2"
              >
                <span class="fs-7 text-body-secondary" id="gallery-count" aria-live="polite">
                  Showing 12 of 12 items
                </span>
              </div>
              <!--end::Card Footer-->
            </div>
            <!--end::Card-->
          </div>
              <!--end::Products column-->



            <div class="col-lg-4">
            <div class="card" id="pos-invoice">
              <div class="card-body p-4 p-md-5">
                <!-- Header -->
                <div class="row mb-4">
                  <div class="col-sm-6">
                    <h2 class="h4 mb-0 text-primary fw-semibold">Nomi Shopping Mall</h2>
                    
                  </div>
                  <div class="col-sm-6 text-sm-end">
                    <h1 class="h2 mb-1">Invoice</h1>
                    <p class="text-secondary mb-0">
                      <span class="fw-semibold">#</span>INV-2026-00001
                    </p>
                    <span class="badge text-bg-success mt-1">Paid</span>
                  </div>
                </div>

                <!-- Billing details -->
                <div class="row mb-4">
                  <div class="col-sm-6">
                    <p class="text-secondary small mb-1">Billed to</p>
                    <p class="mb-0 fw-semibold">Walk-in customer</p>
                  </div>
                  <div class="col-sm-6 text-sm-end">
                    <p class="text-secondary small mb-1">Issue date</p>
                    <p class="mb-2">20 Nov 2026</p>
                  </div>
                </div>

                <!-- Items -->
                <div class="table-responsive mb-3">
                  <table class="table align-middle mb-0">
                    <thead>
                      <tr>
                        <th class="border-top-0">Description</th>
                        <th class="border-top-0 text-end" style="width: 6rem">Qty</th>
                        <th class="border-top-0 text-end" style="width: 9rem">Unit price</th>
                        <th class="border-top-0 text-end" style="width: 9rem">Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <p class="mb-0 fw-semibold">Pro plan subscription</p>
                          <small class="text-secondary">May 18 - Jun 18, 2026</small>
                        </td>
                        <td class="text-end">1</td>
                        <td class="text-end">29.00</td>
                        <td class="text-end">29.00</td>
                      </tr>
                      <tr>
                        <td>
                          <p class="mb-0 fw-semibold">Additional seats</p>
                          <small class="text-secondary">Pro-rated for current period</small>
                        </td>
                        <td class="text-end">3</td>
                        <td class="text-end">12.50</td>
                        <td class="text-end"> 37.50</td>
                      </tr>
                      <tr>
                        <td>
                          <p class="mb-0 fw-semibold">SMS notifications add-on</p>
                          <small class="text-secondary">1,000 messages</small>
                        </td>
                        <td class="text-end">1</td>
                        <td class="text-end">5.00</td>
                        <td class="text-end">5.00</td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <!-- Totals -->
                <div class="row justify-content-end">
                  <div class="col-md-5 col-lg-4">
                    <dl class="row mb-0">
                      <dt class="col-7 text-secondary fw-normal">Subtotal</dt>
                      <dd class="col-5 text-end mb-2">71.50</dd>
                      <dt class="col-7 text-secondary fw-normal">Tax (8.25%)</dt>
                      <dd class="col-5 text-end mb-2">5.90</dd>
                      <dt class="col-7 fw-semibold border-top pt-2">Total due</dt>
                      <dd class="col-5 text-end fw-semibold border-top pt-2 mb-0">77.40 </dd>
                    </dl>
                  </div>
                </div>

                <!-- Footer note -->
                <hr class="my-4" />
                <div class="d-flex justify-content-between align-items-center gap-3">
                  <p class="text-secondary small mb-0">
                    Thanks for shopping with us! Nomi Shopping Mall.
                  </p>
                  <button class="btn btn-outline-secondary flex-shrink-0 no-print" onclick="window.print()" type="button">
                    <i class="bi bi-printer me-1" aria-hidden="true"></i>Print
                  </button>
                </div>
              </div>
            </div>
            </div>
          </div>
          <!--end::App Content-->
      </main>
      <!--end::App Main-->
    <!-- </div> -->
    <!--end::App Wrapper-->

      <?php include '../layout/footer.php'; ?>
    </div>
    <!--end::App Wrapper-->
<?php include '../include/footer-scripts.php'; ?>
  </body>
  <!--end::Body-->
</html>
