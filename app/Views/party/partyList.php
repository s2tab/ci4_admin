<?=$this->extend('layouts/main');?>
<?=$this->section('content');?>
<h1 class="h3 mb-3"><strong><?=$title;?></strong> List Menu </h1>
<div class="card">
   <div class="card-header">
      <h5 class="card-title mb-0">	Party List <a href="<?=base_url('party/form');?>" class="btn btn-primary btn-sm float-end" >Create New Party</a></h5>
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table">
            <thead>
               <th>Sr No</th>
               <th>Name</th>
               <th>Contact Person</th>
               <th>Party Type</th>
               <th>Contact No</th>
               <th>Action</th>
            </thead>
            <tbody>
               <?php $i = 1;foreach ($Party as $party): ?>
               <tr>
                  <td><?=$i++?> </td>
                  <td><?=$party['name']?> </td>
                  <td><?=$party['contactPerson']?> </td>
                  <td><?=$party['partyType']?> </td>
                  <td><?=$party['contactNo']?> </td>
                  <td>
                     <a href="<?php echo base_url('party/editParty?id=' . $party["id"]); ?>"> <span class="fa fa-edit"></span></a>
                     <a href="<?php echo base_url('party/deleteParty?id=' . $party["id"]); ?>"> <span class="fa fa-trash-alt"></span></a>
                     <span data-id="<?=$party["id"]?>" class="fa fa-eye view-party" style="color:#3b7ddd;"></span>
                  </td>
               </tr>
               <?php endforeach;?>
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
            <h5 class="modal-title" id="partyModalLabel">Party Details</h5>
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
                           <b>Contact Person</b>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <b>: &nbsp;</b><span id="ContentPlaceHolder1_lblContactPerson"></span>
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
                           <b>Alt. Contact No.</b>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <b>: &nbsp;</b><span id="ContentPlaceHolder1_lblAltContactNum"></span>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                           <b>Party Type</b>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <b>: &nbsp;</b><span id="ContentPlaceHolder1_lblPartyType"></span>
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
                           <b>Bilty Charges </b>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <b>: &nbsp;</b><span id="ContentPlaceHolder1_lblBiltyCharges"></span>
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
           var partyData = <?=json_encode($Party)?>;
           var selectedParty = partyData.find(function(party) {
           if(party.id == id){
               return party;
           }
               //  return party.id === id;
        });
   
        if (selectedParty) {
           // Show the Bootstrap modal
           $("#ContentPlaceHolder1_lblPartyName").html(selectedParty.name);
           $("#ContentPlaceHolder1_lblContactPerson").html(selectedParty.contactPerson);
           $("#ContentPlaceHolder1_lblGSTN").html(selectedParty.gstin);
           $("#ContentPlaceHolder1_lblEmailAddress").html(selectedParty.email);
           $("#ContentPlaceHolder1_lblAltContactNum").html(selectedParty.alternateContactNo);
           $("#ContentPlaceHolder1_lblContactNum").html(selectedParty.contactNo);
           $("#ContentPlaceHolder1_lblPartyType").html(selectedParty.partyType);
           $("#ContentPlaceHolder1_lblBranch").html(selectedParty.branch);
           $("#ContentPlaceHolder1_lblAddress").html(selectedParty.address);
           $("#ContentPlaceHolder1_lblOpeningBalance").html(selectedParty.openingBalance);
           $("#ContentPlaceHolder1_lblBiltyCharges").html(selectedParty.bc);
           $("#ContentPlaceHolder1_lblState").html(selectedParty.state);
           $('#partyModal').modal('show');
       }
   
       });
   });
</script>
<?=$this->endSection();?>