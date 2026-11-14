<!doctype html>
<html lang="en">
<?php
  include '../include/page-config.php';
  require_once '../data/demo-data.php';
  include '../include/head.php';
  $posProducts = array_values(array_filter($demoProducts, static fn($p) => (int) $p['stock'] > 0));
?>
<style>
  .pos-product-card{cursor:pointer;transition:transform .12s ease,box-shadow .12s ease}
  .pos-product-card:hover{transform:translateY(-2px);box-shadow:0 .25rem .8rem rgba(0,0,0,.10)}
  .pos-product-card:focus{outline:2px solid var(--bs-primary);outline-offset:2px}
  .pos-product-card .product-name{min-height:2.6rem}
  .pos-product-card .product-price{font-weight:700}
  .pos-cart-table td{vertical-align:middle}
  .pos-cart-table input{max-width:4.5rem}
  #pos-invoice{background:#fff;color:#212529}
  @media print{
    @page{size:auto;margin:8mm}
    body *{visibility:hidden!important}
    #pos-invoice,#pos-invoice *{visibility:visible!important}
    #pos-invoice{position:absolute;inset:0;width:100%;border:0!important;box-shadow:none!important}
    #pos-invoice .no-print{display:none!important}
  }
</style>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
<div class="app-wrapper">
  <?php include '../layout/header.php'; include '../layout/sidebar.php'; ?>
  <main class="app-main">
    <?php include '../layout/page-header.php'; ?>
    <div class="app-content"><div class="container-fluid">
      <div class="row g-3">
        <section class="col-xl-7">
          <div class="card">
            <div class="card-header d-flex flex-wrap gap-2 align-items-center">
              <h3 class="card-title mb-0">Products</h3>
              <span class="badge text-bg-light"><?= count($posProducts) ?> available</span>
              <div class="ms-auto" style="min-width:min(100%,280px)">
                <input id="product-search" class="form-control form-control-sm" type="search" placeholder="Search name, SKU or scan barcode…" autocomplete="off">
              </div>
            </div>
            <div class="card-body">
              <div class="d-flex flex-wrap gap-2 mb-3" id="category-filters">
                <button type="button" class="btn btn-sm btn-primary" data-category="all">All</button>
                <?php foreach ($demoCategories as $category): ?>
                  <button type="button" class="btn btn-sm btn-outline-secondary" data-category="<?= htmlspecialchars($category, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($category, ENT_QUOTES, 'UTF-8') ?></button>
                <?php endforeach; ?>
              </div>
              <div class="row row-cols-2 row-cols-md-3 row-cols-xxl-4 g-2" id="product-grid">
                <?php foreach ($posProducts as $product): ?>
                  <div class="col pos-product-item" data-category="<?= htmlspecialchars($product['category'], ENT_QUOTES, 'UTF-8') ?>">
                    <button type="button" class="card pos-product-card h-100 w-100 text-start p-0 border" data-add-product="<?= (int) $product['id'] ?>" data-search="<?= htmlspecialchars(strtolower($product['product'].' '.$product['sku'].' '.$product['barcode']), ENT_QUOTES, 'UTF-8') ?>">
                      <div class="card-body p-2">
                        <div class="d-flex justify-content-between gap-1 mb-2">
                          <span class="badge text-bg-light text-wrap"><?= htmlspecialchars($product['category'], ENT_QUOTES, 'UTF-8') ?></span>
                          <small class="text-body-secondary">Stock: <?= (int) $product['stock'] ?></small>
                        </div>
                        <div class="product-name fw-semibold"><?= htmlspecialchars($product['product'], ENT_QUOTES, 'UTF-8') ?></div>
                        <div class="small text-body-secondary"><?= htmlspecialchars($product['sku'], ENT_QUOTES, 'UTF-8') ?></div>
                        <div class="product-price mt-2">Rs. <?= number_format((float) $product['price'], 2) ?></div>
                      </div>
                    </button>
                  </div>
                <?php endforeach; ?>
              </div>
              <p id="no-products" class="text-center text-body-secondary py-4 d-none">No matching products found.</p>
            </div>
          </div>
        </section>
        <section class="col-xl-5">
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h3 class="card-title">Current Sale</h3>
              <button type="button" id="clear-cart" class="btn btn-sm btn-outline-danger ms-auto">Clear cart</button>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label class="form-label" for="customer-select">Customer</label>
                <select id="customer-select" class="form-select form-select-sm">
                  <option value="Walk-in Customer">Walk-in Customer</option>
                  <?php foreach ($demoCustomers as $customer): ?>
                    <option value="<?= htmlspecialchars($customer['customer_name'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($customer['customer_name'], ENT_QUOTES, 'UTF-8') ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="table-responsive">
                <table class="table table-sm pos-cart-table">
                  <thead><tr><th>Item</th><th class="text-end">Price</th><th>Qty</th><th class="text-end">Total</th><th></th></tr></thead>
                  <tbody id="cart-lines"><tr><td colspan="5" class="text-center text-body-secondary py-4">No items added yet.</td></tr></tbody>
                </table>
              </div>
              <div class="row g-2 align-items-end">
                <div class="col-6">
                  <label for="discount-input" class="form-label">Discount (Rs.)</label>
                  <input id="discount-input" type="number" min="0" step="0.01" value="0" class="form-control form-control-sm">
                </div>
                <div class="col-6">
                  <label for="payment-method" class="form-label">Payment method</label>
                  <select id="payment-method" class="form-select form-select-sm">
                    <option>Cash</option><option>Bank</option><option>Card</option><option>Credit</option>
                  </select>
                </div>
              </div>
              <hr>
              <div class="d-flex justify-content-between mb-1"><span>Subtotal</span><strong id="subtotal">Rs. 0.00</strong></div>
              <div class="d-flex justify-content-between mb-1"><span>Discount</span><strong id="discount-total">Rs. 0.00</strong></div>
              <div class="d-flex justify-content-between fs-4"><span>Total</span><strong id="grand-total">Rs. 0.00</strong></div>
              <div class="d-grid mt-3"><button type="button" id="complete-sale" class="btn btn-primary">Create demo invoice</button></div>
              <p class="small text-body-secondary mt-2 mb-0">Demo mode: this screen calculates a sale in your browser. It does not save stock, payments or invoices to a database.</p>
            </div>
          </div>
          <div class="card d-none" id="invoice-card">
            <div class="card-header no-print"><h3 class="card-title">Invoice Preview</h3><button type="button" id="print-invoice" class="btn btn-sm btn-primary ms-auto">Print invoice</button></div>
            <div class="card-body" id="pos-invoice">
              <div class="text-center mb-3">
                <h3 class="mb-1"><?= htmlspecialchars($demoStore['name'], ENT_QUOTES, 'UTF-8') ?></h3>
                <div><?= htmlspecialchars($demoStore['city'].', '.$demoStore['province'], ENT_QUOTES, 'UTF-8') ?></div>
                <strong>SALE INVOICE</strong>
              </div>
              <div class="d-flex justify-content-between small mb-2"><span id="invoice-number"></span><span id="invoice-date"></span></div>
              <div class="small mb-3">Customer: <strong id="invoice-customer"></strong></div>
              <div class="table-responsive"><table class="table table-sm table-bordered">
                <thead><tr><th>Item</th><th>Qty</th><th class="text-end">Price</th><th class="text-end">Amount</th></tr></thead>
                <tbody id="invoice-lines"></tbody>
              </table></div>
              <div class="ms-auto" style="max-width:240px">
                <div class="d-flex justify-content-between"><span>Subtotal</span><span id="invoice-subtotal"></span></div>
                <div class="d-flex justify-content-between"><span>Discount</span><span id="invoice-discount"></span></div>
                <div class="d-flex justify-content-between fw-bold fs-5"><span>Total</span><span id="invoice-total"></span></div>
                <div class="small mt-1">Payment: <span id="invoice-payment"></span></div>
              </div>
              <p class="text-center small mt-4 mb-0">Thank you for shopping with us!</p>
            </div>
          </div>
        </section>
      </div>
    </div></div>
  </main>
  <?php include '../layout/footer.php'; ?>
</div>
<?php include '../include/footer-scripts.php'; ?>
<script>
(() => {
  const products = <?= json_encode($posProducts, JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_AMP|JSON_HEX_QUOT) ?>;
  const productById = new Map(products.map(p => [String(p.id), p]));
  const cart = new Map();
  const money = n => 'Rs. ' + Number(n || 0).toLocaleString('en-PK',{minimumFractionDigits:2,maximumFractionDigits:2});
  const search = document.getElementById('product-search');
  let activeCategory = 'all';
  let invoiceSequence = 1;

  function filterProducts() {
    const term = search.value.trim().toLowerCase();
    let visible = 0;
    document.querySelectorAll('.pos-product-item').forEach(el => {
      const btn = el.querySelector('[data-add-product]');
      const matches = (activeCategory === 'all' || el.dataset.category === activeCategory) && (!term || btn.dataset.search.includes(term));
      el.classList.toggle('d-none', !matches);
      if (matches) visible++;
    });
    document.getElementById('no-products').classList.toggle('d-none', visible !== 0);
  }
  document.getElementById('category-filters').addEventListener('click', e => {
    const btn = e.target.closest('[data-category]');
    if (!btn) return;
    activeCategory = btn.dataset.category;
    document.querySelectorAll('#category-filters [data-category]').forEach(b => {
      b.classList.toggle('btn-primary', b === btn);
      b.classList.toggle('btn-outline-secondary', b !== btn);
    });
    filterProducts();
  });
  search.addEventListener('input', filterProducts);
  search.addEventListener('keydown', e => {
    if (e.key !== 'Enter') return;
    const code = search.value.trim().toLowerCase();
    const found = products.find(p => String(p.barcode).toLowerCase() === code || String(p.sku).toLowerCase() === code);
    if (found) { addProduct(found.id); search.value = ''; filterProducts(); }
  });

  function addProduct(id) {
    const p = productById.get(String(id));
    if (!p) return;
    const line = cart.get(String(id));
    if (line) line.qty = Math.min(Number(p.stock), line.qty + 1);
    else cart.set(String(id), {product:p, qty:1});
    renderCart();
  }
  document.getElementById('product-grid').addEventListener('click', e => {
    const btn = e.target.closest('[data-add-product]');
    if (btn) addProduct(btn.dataset.addProduct);
  });
  function totals() {
    const subtotal = [...cart.values()].reduce((sum,line)=>sum + Number(line.product.price)*line.qty,0);
    const discount = Math.min(subtotal, Math.max(0, Number(document.getElementById('discount-input').value)||0));
    return {subtotal,discount,total:subtotal-discount};
  }
  function renderCart() {
    const tbody = document.getElementById('cart-lines');
    if (!cart.size) tbody.innerHTML = '<tr><td colspan="5" class="text-center text-body-secondary py-4">No items added yet.</td></tr>';
    else tbody.innerHTML = [...cart.entries()].map(([id,line]) => {
      const p=line.product;
      return '<tr><td><div class="fw-semibold">'+escapeHtml(p.product)+'</div><small class="text-body-secondary">'+escapeHtml(p.sku)+'</small></td><td class="text-end">'+money(p.price)+'</td><td><input class="form-control form-control-sm cart-qty" type="number" min="1" max="'+Number(p.stock)+'" value="'+line.qty+'" data-qty="'+id+'"></td><td class="text-end">'+money(Number(p.price)*line.qty)+'</td><td><button type="button" class="btn btn-sm btn-link text-danger p-0" data-remove="'+id+'" aria-label="Remove item">&times;</button></td></tr>';
    }).join('');
    const t=totals();
    document.getElementById('subtotal').textContent=money(t.subtotal);
    document.getElementById('discount-total').textContent=money(t.discount);
    document.getElementById('grand-total').textContent=money(t.total);
  }
  function escapeHtml(value) { return String(value).replace(/[&<>"']/g, c => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c])); }
  document.getElementById('cart-lines').addEventListener('change',e=>{
    const input=e.target.closest('[data-qty]'); if(!input)return;
    const line=cart.get(input.dataset.qty); if(!line)return;
    line.qty=Math.max(1,Math.min(Number(line.product.stock),Number(input.value)||1)); renderCart();
  });
  document.getElementById('cart-lines').addEventListener('click',e=>{
    const btn=e.target.closest('[data-remove]'); if(btn){cart.delete(btn.dataset.remove);renderCart();}
  });
  document.getElementById('discount-input').addEventListener('input',renderCart);
  document.getElementById('clear-cart').addEventListener('click',()=>{cart.clear();renderCart();document.getElementById('invoice-card').classList.add('d-none');});
  document.getElementById('complete-sale').addEventListener('click',()=>{
    if(!cart.size){alert('Add at least one product to create an invoice.');return;}
    const t=totals();
    document.getElementById('invoice-number').textContent='Invoice: DEMO-'+String(invoiceSequence++).padStart(5,'0');
    document.getElementById('invoice-date').textContent=new Date().toLocaleString('en-PK');
    document.getElementById('invoice-customer').textContent=document.getElementById('customer-select').value;
    document.getElementById('invoice-payment').textContent=document.getElementById('payment-method').value;
    document.getElementById('invoice-lines').innerHTML=[...cart.values()].map(line=>'<tr><td>'+escapeHtml(line.product.product)+'</td><td>'+line.qty+'</td><td class="text-end">'+money(line.product.price)+'</td><td class="text-end">'+money(Number(line.product.price)*line.qty)+'</td></tr>').join('');
    document.getElementById('invoice-subtotal').textContent=money(t.subtotal);
    document.getElementById('invoice-discount').textContent=money(t.discount);
    document.getElementById('invoice-total').textContent=money(t.total);
    document.getElementById('invoice-card').classList.remove('d-none');
    document.getElementById('invoice-card').scrollIntoView({behavior:'smooth',block:'start'});
  });
  document.getElementById('print-invoice').addEventListener('click',()=>window.print());
  renderCart();
})();
</script>
</body>
</html>
