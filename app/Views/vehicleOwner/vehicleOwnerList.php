<?= $this->extend('layouts/main'); ?>
		<?= $this->section('content'); ?>
		<h1 class="h3 mb-3"><strong><?= $title; ?></strong> List Menu </h1>
		<div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">	Vehicle Owner List <a href="<?= base_url('vehicleowner/form'); ?>" class="btn btn-primary btn-sm float-end" >Create New Vehicle Owner</a></h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table">
        <thead> 
           <th>SR No</th> 
           <th>Owner</th> 
           <th>Contact No.</th> 
           <th>Address</th>  
           <th>GST No</th> 
           <th>Action</th>
         </thead>
        <tbody>
        <?php $i=1; foreach($Vehicleowner as $vehicleowner ): ?>   
            <tr>  
                <td><?= $i++ ?> </td>  
                <td><?= $vehicleowner['name'] ?> </td>   
                <td><?= $vehicleowner['contactNo'] ?> </td>  
                <td><?= $vehicleowner['address'] ?> </td>  
                <td><?= $vehicleowner['gstin'] ?> </td>  
                <td>
                     <a href="<?php echo base_url('vehicleowner/editVehicleOwner?id=' . $vehicleowner["id"]); ?>"> <span class="fa fa-edit"></span></a>
                     <a href="<?php echo base_url('vehicleowner/deleteVehicleOwner?id=' . $vehicleowner["id"]); ?>"> <span class="fa fa-trash-alt"></span></a>
                     <span data-id="<?=$vehicleowner["id"]?>" class="fa fa-eye view-party" style="color:#3b7ddd;"></span>
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
                           <b>Name</b>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <b>:&nbsp;</b><span id="ContentPlaceHolder1_lblPartyName"></span>
                        </div>
                     </div>
                     
                     <div class="col-md-2">
                        <div class="form-group">
                           <b>Email Address</b>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <b>: &nbsp;</b><span id="ContentPlaceHolder1_lblEmailAddress"></span>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <b>GSTN</b>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <b>: &nbsp;</b><span id="ContentPlaceHolder1_lblGSTN"></span>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <b>Contact No.</b>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <b>: &nbsp;</b><span id="ContentPlaceHolder1_lblContactNum"></span>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <b>Aadhaar No</b>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <b>: &nbsp;</b><span id="ContentPlaceHolder1_lblAadhaarNo"></span>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <b>State</b>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <b>: &nbsp;</b><span id="ContentPlaceHolder1_lblState"></span>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <b>Address</b>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <b>: &nbsp;</b><span id="ContentPlaceHolder1_lblAddress"></span>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <b>Branch</b>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <b>: &nbsp;</b><span id="ContentPlaceHolder1_lblBranch"></span>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <b>Opening Balance</b>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <b>: &nbsp;</b><span id="ContentPlaceHolder1_lblOpeningBalance"></span>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <b>Pan No </b>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <b>: &nbsp;</b><span id="ContentPlaceHolder1_lblPanNo"></span>
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
           var partyData = <?=json_encode($Vehicleowner)?>;
           var selectedParty = partyData.find(function(party) {
           if(party.id == id){
               return party;
           }
               //  return party.id === id;
        });
   
        if (selectedParty) {
           // Show the Bootstrap modal
           $("#ContentPlaceHolder1_lblPartyName").html(selectedParty.name);
           $("#ContentPlaceHolder1_lblGSTN").html(selectedParty.gstin);
           $("#ContentPlaceHolder1_lblEmailAddress").html(selectedParty.email);
           $("#ContentPlaceHolder1_lblContactNum").html(selectedParty.contactNo);
           $("#ContentPlaceHolder1_lblAadhaarNo").html(selectedParty.adhaarNo);
           $("#ContentPlaceHolder1_lblBranch").html(selectedParty.branch);
           $("#ContentPlaceHolder1_lblAddress").html(selectedParty.address);
           $("#ContentPlaceHolder1_lblOpeningBalance").html(selectedParty.openingBalance);
           $("#ContentPlaceHolder1_lblPanNo").html(selectedParty.panNo);
           $("#ContentPlaceHolder1_lblState").html(selectedParty.state);
           $('#partyModal').modal('show');
       }
   
       });
   });
</script>
		<?= $this->endSection(); ?>
		