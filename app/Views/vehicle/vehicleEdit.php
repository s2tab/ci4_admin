<?=$this->extend('layouts/main');?>
<?=$this->section('content');?>
<h1 class="h3 mb-3"><strong><?=$title;?></strong> Form Menu </h1>
<div class="card">
   <div class="card-header">
      <h5 class="card-title mb-0">	Vehicle Owner Form </h5>
   </div>
   <div class="card-body">
   <form action="<?=base_url('vehicle/updateVehicle');?>" method="post" class="row g-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputVehicleName">Vehicle Name</label>
                        <input type="text" value="<?=$vehicle['vehicle_name']?>" class="form-control" name="inputVehicleName" id="inputVehicleName" >
                        <input type="hidden" value="<?=$vehicle['id']?>" class="form-control" name="inputVehicleID" id="inputVehicleID" >
                    </div>
                    <div class="form-group">
                        <label for="inputVehicleNumber">Vehicle Number</label>
                        <input type="text"  value="<?=$vehicle['vehicle_number']?>" class="form-control" name="inputVehicleNumber" id="inputVehicleNumber" >
                    </div>
                    <div class="form-group">
                        <label for="inputBusinessName">Business Name / Owner Name </label>
                        <input type="text"  value="<?=$vehicle['business_name']?>" class="form-control" name="inputBusinessName" id="inputBusinessName" >
                    </div>
                    <div class="form-group">
                        <label for="inputInsuranceNo">Insurance No</label>
                        <input type="text" value="<?=$vehicle['insurance_no']?>" class="form-control" name="inputInsuranceNo" id="inputInsuranceNo" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputInsuranceValidFrom">Insurance Valid From</label>
                        <input type="date" value="<?=$vehicle['insurance_valid_from']?>" class="form-control" name="inputInsuranceValidFrom" id="inputInsuranceValidFrom" >
                    </div>
                    <div class="form-group">
                        <label for="inputInsuranceValidTill">Insurance Valid Till</label>
                        <input type="date" value="<?=$vehicle['insurance_valid_till']?>" class="form-control" name="inputInsuranceValidTill" id="inputInsuranceValidTill" >
                    </div>
                    <div class="form-group">
                        <label for="inputVehicleCapacity">Vehicle Capacity (in ton)</label>
                        <input type="text" value="<?=$vehicle['vehicle_capacity']?>" class="form-control" name="inputVehicleCapacity" id="inputVehicleCapacity" >
                    </div>
                    <div class="form-group">
                        <label for="inputVehicleSize">Vehicle Size (L x W x H)</label>
                        <input type="text" value="<?=$vehicle['vehicle_size']?>" class="form-control" name="inputVehicleSize" id="inputVehicleSize" >
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