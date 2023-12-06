<?=$this->extend('layouts/main');?>
<?=$this->section('content');?>
<h1 class="h3 mb-3"><strong><?=$title;?></strong> Form Menu </h1>
<div class="card">
   <div class="card-header">
      <h5 class="card-title mb-0">	Vehicle Owner Form </h5>
   </div>
   <div class="card-body">
      <form action="<?=base_url('vehicleowner/createVehicleowner');?>" method="post" class="row g-3">
         <div class="col-md-6">
            <div class="form-group">
               <label for="inputName">Name</label>
               <input type="text" class="form-control" name="inputName" id="inputName" >
            </div>
            <div class="form-group">
               <label for="inputEmail">Email</label>
               <input type="text" class="form-control" name="inputEmail" id="inputEmail" >
            </div>
            <div class="form-group">
               <label for="inputContactno">Contact No</label>
               <input type="text" class="form-control" name="inputContactno" id="inputContactno" >
            </div>
            <div class="form-group">
               <label for="inputAddress">Address</label>
               <input type="text" class="form-control" name="inputAddress" id="inputAddress" >
            </div>
            <div class="form-group">
               <label for="inputOpeningbalance">Opening Balance</label>
               <input type="text" class="form-control" name="inputOpeningbalance" id="inputOpeningbalance" >
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-group">
               <label for="inputGstin">GSTN</label>
               <input type="text" class="form-control" name="inputGstin" id="inputGstin" >
            </div>
            <div class="form-group">
               <label for="inputState">State</label>
               <input type="text" class="form-control" name="inputState" id="inputState" >
            </div>
            <div class="form-group">
               <label for="inputBranch">Branch</label>
               <input type="text" class="form-control" name="inputBranch" id="inputBranch" >
            </div>
            <div class="form-group">
               <label for="inputAdhaarno">Adhaar No</label>
               <input type="text" class="form-control" name="inputAdhaarno" id="inputAdhaarno" >
            </div>
            <div class="form-group">
               <label for="inputPanno">Pan No</label>
               <input type="text" class="form-control" name="inputPanno" id="inputPanno" >
            </div>
         </div>
         <div class="col-12">
            <div class="d-grid gap-2 mt-3">
               <button class="btn btn-primary" type="submit">Save Data</button>
            </div>
         </div>
      </form>
   </div>
</div>
<?=$this->endSection();?>