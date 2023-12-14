<?= $this->extend('layouts/main'); ?>
		<?= $this->section('content'); ?>
		<h1 class="h3 mb-3"><strong><?= $title; ?></strong> List Menu </h1>
		<div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">	Vehicle List <a href="<?= base_url('vehicle/form'); ?>" class="btn btn-primary btn-sm float-end" >Create New Vehicle</a></h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table">
        <thead> 
           <th>Sr No</th> 
           <th> Name</th> 
           <th>Vehicle Number</th> 
           <th>Business Name</th> 
           <th>Insurance No</th> 
           <th>Insurance Valid Till</th> 
           <th>Action</th>
         </thead>
        <tbody>
        <?php $i=1; foreach($Vehicle as $vehicle ): ?>   
            <tr>  
                <td><?= $i++ ?> </td>  
                <td><?= $vehicle['vehicle_name'] ?> </td>  
                <td><?= $vehicle['vehicle_number'] ?> </td>  
                <td><?= $vehicle['business_name'] ?> </td>  
                <td><?= $vehicle['insurance_no'] ?> </td>   
                <td><?= $vehicle['insurance_valid_till'] ?> </td> 
                <td>
                     <a href="<?php echo base_url('vehicle/editVehicle?id=' . $vehicle["id"]); ?>"> <span class="fa fa-edit"></span></a>
                     <a href="<?php echo base_url('vehicle/deleteVehicle?id=' . $vehicle["id"]); ?>"> <span class="fa fa-trash-alt"></span></a>
                     <span data-id="<?=$vehicle["id"]?>" class="fa fa-eye view-party" style="color:#3b7ddd;"></span>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
                </div>
            </div>
        </div>

        <!-- Bootstrap Modal -->
<div class="modal fade" id="partyModal" tabindex="-1" aria-labelledby="partyModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="partyModalLabel">Vehicle Owner</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <!-- Display party details here -->
            <div class="modal-body">
               <div class="col-sm-12">
                  <div class="row">
                     <div class="col-md-2">
                        <div class="form-group">
                           <b>Vehicle Name</b>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <b>:&nbsp;</b><span id="ContentPlaceHolder1_lblVehicleName"></span>
                        </div>
                     </div>
                     
                     <div class="col-md-3">
                        <div class="form-group">
                           <b>Insurance Valid From</b>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <b>: &nbsp;</b><span id="ContentPlaceHolder1_lblValidFrom"></span>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <b>Vehicle Number</b>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <b>: &nbsp;</b><span id="ContentPlaceHolder1_lblVehicleNumber"></span>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <b>Insurance Valid Till</b>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <b>: &nbsp;</b><span id="ContentPlaceHolder1_lblValidTill"></span>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <b>Owner Name</b>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <b>: &nbsp;</b><span id="ContentPlaceHolder1_lblOwnerName"></span>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <b>Vehicle Capacity (in ton)</b>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <b>: &nbsp;</b><span id="ContentPlaceHolder1_lblCapacity"></span>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <b>Insurance No</b>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <b>: &nbsp;</b><span id="ContentPlaceHolder1_lblInsuranceNo"></span>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <b>Vehicle Size (L x W x H)</b>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <b>: &nbsp;</b><span id="ContentPlaceHolder1_lblSize"></span>
                        </div>
                     </div>
                     
                  </div>
               </div>
            </div>
            <div id="partyDetails"></div>
         </div>
      </div>
   </div>
</div>
<script>
   $(document).ready(function(){
       $(".table").dataTable({});
       $(".view-party").on('click',function(){
           id = $(this).data("id");
           var partyData = <?=json_encode($Vehicle)?>;
           var selectedParty = partyData.find(function(party) {
           if(party.id == id){
               return party;
           }
               //  return party.id === id;
        });
   
        if (selectedParty) {
           // Show the Bootstrap modal
           $("#ContentPlaceHolder1_lblSize").html(selectedParty.vehicle_size);
           $("#ContentPlaceHolder1_lblInsuranceNo").html(selectedParty.insurance_no);
           $("#ContentPlaceHolder1_lblCapacity").html(selectedParty.vehicle_capacity);
           $("#ContentPlaceHolder1_lblOwnerName").html(selectedParty.business_name);
           $("#ContentPlaceHolder1_lblValidTill").html(selectedParty.insurance_valid_till);
           $("#ContentPlaceHolder1_lblVehicleNumber").html(selectedParty.vehicle_number);
           $("#ContentPlaceHolder1_lblValidFrom").html(selectedParty.insurance_valid_from);
           $("#ContentPlaceHolder1_lblVehicleName").html(selectedParty.	vehicle_name);
           $('#partyModal').modal('show');
       }
   
       });
   });
</script>
		<?= $this->endSection(); ?>
		