<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <!-- Main Page Content -->

    <section class="dashboard_section1">
      <div class="container-fluid mb-3">
        <div class="row">
          <div class="col-lg-3">
            <div class="card text-end mb-3">
              <div class="card-body">
                <p style="font-size: 12px;">TODAYS LR COUNT / TOTAL WT</p>
                <h5>0 / 0</h5>
                <a href="#" class="text-danger">View More</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="card text-end mb-3">
              <div class="card-body">
                <p style="font-size: 12px;">TODAYS PAID TOTAL</p>
                <h5> ₹ 0</h5>
                <a href="#" class="text-danger">View More</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="card text-end mb-3">
              <div class="card-body">
                <p style="font-size: 12px;">TODAYS TO PAY TOTAL</p>
                <h5> ₹ 0</h5>
                <a href="#" class="text-danger">View More</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="card text-end mb-3">
              <div class="card-body">
                <p style="font-size: 12px;">TODAYS TBB TOTAL</p>
                <h5> ₹ 0</h5>
                <a href="#" class="text-danger">View More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="dashboard_section2">
      <div class="container-fluid mb-3">
        <div class="row">
          <div class="col">
            <div class="bg-white d-flex flex-column flex-md-row align-items-md-center justify-content-md-between mb-3" style="padding: 20px 10px;">
              <label for="searchMemo" class="mb-2 mb-md-0" style="font-size: 14px;">
                <input type="radio" id="searchMemo" >
                Search Memo By LR No.
              </label>
              <div class="input-group mt-3 mt-md-0" style="max-width: 400px;">
                <input type="text" class="form-control shadow-none" placeholder="e.g. LR/01" style="font-size: 14px;">
                <button id="Dashboard_show_btn" class="btn btn-primary">Show</button>
              </div>
            </div>

            <div class="bg-white d-flex flex-column flex-md-row align-items-md-center justify-content-md-between mb-3" style="padding: 20px 10px;">
              <label for="searchMemo" class="mb-2 mb-md-0" style="font-size: 14px;">
                <input type="radio" id="searchMemo">
                Search LR By LR No.
              </label>
              <div class="input-group mt-3 mt-md-0" style="max-width: 400px;">
                <input type="text" class="form-control shadow-none" placeholder="e.g. LR/01" style="font-size: 14px;">
                <button id="Dashboard_show_btn" class="btn btn-primary">Show</button>
              </div>
            </div>

            <div class="bg-white d-flex flex-column flex-md-row align-items-md-center justify-content-md-between mb-3" style="padding: 20px 10px;">
              <label for="searchMemo" class="mb-2 mb-md-0" style="font-size: 14px;">
                <input type="radio" id="searchMemo">
                Search POD By LR No.
              </label>
              <div class="input-group mt-3 mt-md-0" style="max-width: 400px;">
                <input type="text" class="form-control shadow-none" placeholder="e.g. LR/01" style="font-size: 14px;">
                <button id="Dashboard_show_btn" class="btn btn-primary">Show</button>
              </div>
            </div>

            <div class="bg-white d-flex flex-column flex-lg-row align-items-lg-center justify-content-lg-center mb-3" style="padding: 20px 10px;">
              <div class="col-lg-6 mb-3 mb-lg-0 d-flex flex-column align-items-start justify-content-center">
                <p style="font-size: 14px; font-weight: 600; margin-bottom: 10px;" class="ms-5">Search By Consignor Name</p>
                <select class="form-control shadow-none mx-auto" style="width: 90%;">
                  <option value="" selected>Select Consignor</option>
                  <option value="">One</option>
                  <option value="">Two</option>
                  <option value="">Three</option>
                </select>
              </div>
            
              <div class="col-lg-6 d-flex flex-column align-items-start justify-content-center">
                <p style="font-size: 14px; font-weight: 600; margin-bottom: 10px;" class="ms-5">Search By Consignor Name</p>
                <select class="form-control shadow-none mx-auto" style="width: 90%;">
                  <option value="" selected>Select Consignor</option>
                  <option value="">One</option>
                  <option value="">Two</option>
                  <option value="">Three</option>
                </select>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="dashboard_section3">
      <div class="container-fluid">
        <div class="row gx-4">
          <div class="col bg-white mb-3 mb-lg-0">
            <div style="padding: 10px 0px;">
              <p class="ms-4" style="font-size: 12px; font-weight: 600;"> INSURANCE THAT WILL EXPIRE SOON</p>
              <p class="ms-4" style="font-size: 12px; font-weight: 600;"> No Records Found</p>
            </div>
          </div>
    
          <div class="col-lg-5 bg-white">
            <div style="padding: 10px 0px;">
              <p class="ms-4" style="font-size: 12px; font-weight: 600;"> INSURANCE THAT WILL EXPIRE SOON</p>
              <p class="ms-4" style="font-size: 12px; font-weight: 600;"> No Records Found</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    
    
    <!-- Main Page Content End -->

  </main><!-- End #main -->
<?= $this->endSection(); ?>