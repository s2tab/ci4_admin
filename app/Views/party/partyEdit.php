<?=$this->extend('layouts/main');?>
		<?=$this->section('content');?>
		<h1 class="h3 mb-3"><strong><?=$title;?></strong> Form Menu </h1>
		<div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">	Party Form </h5>
            </div>
            <div class="card-body">
            <form id="partyForm" action="<?=base_url('party/updateParty');?>" method="post">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputName">Name</label>
                                    <input type="text" value="<?=$party['name']?>" class="form-control" name="inputName" id="inputName" >
                                    <input type="hidden" value="<?=$party['id']?>" class="form-control" name="inputId" id="inputName" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputContactperson">Contact Person</label>
                                    <input type="text" value="<?=$party['contactPerson']?>" class="form-control" name="inputContactperson" id="inputContactperson" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputEmail">Email</label>
                                        <input type="text" value="<?=$party['email']?>" class="form-control" name="inputEmail" id="inputEmail" >
                                    </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputGstin">GSTN</label>
                                    <input type="text" value="<?=$party['gstin']?>" class="form-control" name="inputGstin" id="inputGstin" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputContactno">Contact No</label>
                                        <input type="text" value="<?=$party['contactNo']?>" class="form-control" name="inputContactno" id="inputContactno" >
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputAlternatecontactno">Alternate Contact No</label>
                                    <input type="text" value="<?=$party['alternateContactNo']?>" class="form-control" name="inputAlternatecontactno" id="inputAlternatecontactno" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputPartytype">Party Type</label>
                                    <input type="text" value="<?=$party['partyType']?>" class="form-control" name="inputPartytype" id="inputPartytype" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputState">State</label>
                                    <input type="text" value="<?=$party['state']?>" class="form-control" name="inputState" id="inputState" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="inputAddress">Address</label>
                                    <input type="text" value="<?=$party['address']?>" class="form-control" name="inputAddress" id="inputAddress" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputBranch">Branch</label>
                                    <input type="text" value="<?=$party['branch']?>" class="form-control" name="inputBranch" id="inputBranch" >
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputOpeningbalance">Opening Balance</label>
                                    <input type="text" value="<?=$party['openingBalance']?>" class="form-control" name="inputOpeningbalance" id="inputOpeningbalance" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputBc">BC Applicable </label>
                                    <div>
                                    <div class="form-check form-check-inline">
                                            <input <?php echo $party['bc']=="Yes"? "checked":"";?> class="form-check-input" type="radio" name="inputBc" id="inputBcYes" value="Yes" >
                                            <label class="form-check-label" for="inputBcYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input  <?php echo $party['bc']=="No"? "checked":"";?> class="form-check-input" type="radio" name="inputBc" id="inputBcNo" value="No" >
                                        <label class="form-check-label" for="inputBcNo">No</label>
                                    </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="d-grid gap-2 mt-3">
                            <button class="btn btn-primary chkbtn" type="submit">Save Data</button>
                        </div>
            </form>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('#partyForm').submit(function (event) {
            event.preventDefault(); // Prevents the default form submission

            // Perform validation here
            let isValid = true;

            // Example: Check if Name field is empty
            let name = $('#inputName').val();
            if (name.trim() === '') {
                isValid = false;
                $('#inputName').addClass('is-invalid'); // Add an error class or display an error message
            } else {
                $('#inputName').removeClass('is-invalid');
            }

            let contactNo = $('#inputContactno').val();
            if (contactNo.trim() === '') {
                isValid = false;
                $('#inputContactno').addClass('is-invalid'); // Add an error class or display an error message
            } else {
                $('#inputContactno').removeClass('is-invalid');
            }
            // You can add similar validation for other fields

            // If all validations pass, submit the form
            if (isValid) {
                this.submit(); // Submits the form
            }
        });

            });
        </script>
		<?=$this->endSection();?>


