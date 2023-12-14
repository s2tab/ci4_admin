<?=$this->extend('layouts/main');?>
		<?=$this->section('content');?>
		<div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">	L-R List <a href="<?=base_url('Lrmaster/form');?>" class="btn btn-primary btn-sm float-end create_new_lr" >Create New L-R</a></h5>
            </div>
            <div class="card-body">
            <main id="main" class="main">

<!-- Main Page Content -->
<section class="L_R_section1">
    <div class="container-fluid bg-white p-3 mb-3">
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div>
                    <p>Branch</p>
                    <select class="w-100 form-control">
                        <option value="all">All</option>
                        <?php
foreach ($Branch as $branch) {
    ?>
                            <option value="<?=$branch['id']?>"><?=$branch['name']?></option>
                        <?php
}
?>
                    </select>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="d-flex flex-column flex-md-row">
                    <div class="mb-3 mb-md-0 me-md-3">
                        <p>Period</p>
                        <label for="" class="me-3">
                            <input class="period form-check-input" value="today" name="period" checked type="radio"> Today
                        </label>

                        <label for="" class="me-3">
                            <input class="period form-check-input" value="all" name="period" type="radio"> All
                        </label>

                        <label for="">
                            <input class="period form-check-input" value="specific" name="period" type="radio"> Specific
                        </label>
                    </div>
                </div>
            </div>

            <div class=" col-lg-4 col-md-4 col-sm-6 show-date" hidden >
                <div class="row">
                    <div class="col-md-6">
                    <p>From Date *</p>
                    <input type="date" class="w-100 form-controll from-date">
                    </div>
                    <div class="col-md-6">
                    <p>To Date *</p>
                    <input type="date"  class="w-100 form-controll to-date">
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-12 col-sm-12 d-flex align-items-end mt-3">
                <div class="">
                    <button class="lr_master_add_new show">Show</button>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="L_R_section1 lr-table" >
    <div class="container-fluid bg-white p-3">
       <div class="row">
        <div class="col">
            <table id="example" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr.No</th>
                        <th>Date</th>
                        <th>LR No.</th>
                        <th>Consignor</th>
                        <th>Consignee</th>
                        <th>Destination</th>
                        <th>LR Type</th>
                        <th>Total Wt</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                   <?php
                    if (count($LrDetails)) {
                            $i = 1;
                            foreach ($LrDetails as $lr) {
                                ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$lr['date']?></td>
                                <td><?=$lr['manual_lr_no']?></td>
                                <td><?=$lr['consignor_name']?></td>
                                <td><?=$lr['consignee_name']?></td>
                                <td><?=$lr['delivery_destination']?></td>
                                <td><?=$lr['lr_type']?></td>
                                <td><?=0?></td>
                            </tr>    
                        <?php
                        }
                    }
                    ?>
                </tbody>
            </table>

        </div>
       </div>
    </div>

</section>


<!-- Main Page Content End -->




</main><!-- End #main -->
            </div>
        </div>
<script>
    $(document).ready(function() {

        $('#example').DataTable({
            // responsive: true,
            // pageLength: 10
        });

        $(".period").on("change", function(){
            var period = $(this).val();
            if (period == "specific"){
                $(".show-date").removeAttr("hidden")
            }
            else{
                $(".show-date").attr("hidden",true);
            }
        });

        $('.show').on('click', function(){
            $(".show").attr("disabled",true);
            var period = $("input[name='period']:checked").val();
            // alert(period)
            // if(period != "today"){
                // alert(period)
                    $("#tbody").html('');
                
                var requestData = {
                    period: period
                    };
                if(period == "specific"){
                var fromDate = $(".from-date").val();
                var toDate = $(".to-date").val();

                var requestData = {
                    period: period,
                    fromDate: fromDate,
                    toDate: toDate
                    };

                }
                
                $.ajax({
                        url: '<?=base_url('lrmaster/getLrMasterList');?>', // Replace with your endpoint URL
                        type: 'POST', // Change method type if needed (POST, GET, etc.)
                        data: requestData,
                        // success: function(jsonData) {
                        //     var lrData = JSON.parse(jsonData);

                        //     for (var i = 0; i < lrData.length; ) {
                        //             var lr = lrData[i];
                        //             // console.log(lr);
                        //             // Create a table row for each JSON object
                        //             var newRow = $('<tr>');
                        //             newRow.append('<td>' + ++i + '</td>');
                        //             newRow.append('<td>' + lr.date + '</td>');
                        //             newRow.append('<td>' + lr.manual_lr_no + '</td>');
                        //             newRow.append('<td>' + lr.consignor_name + '</td>');
                        //             newRow.append('<td>' + lr.consignee_name + '</td>');
                        //             newRow.append('<td>' + lr.delivery_destination + '</td>');
                        //             newRow.append('<td>' + lr.lr_type + '</td>');
                        //             newRow.append('<td>' + 0 + '</td>'); // Example value

                        //             console.log(newRow);
                        //             // Append the new row to the table body
                        //             $('#tbody').append(newRow);
                        //         }
                        //      $(".show").removeAttr("disabled");

                        // },
                        success: function(jsonData) {
                            var lrData = JSON.parse(jsonData);
                            var table = $('#example').DataTable(); // Replace 'yourTableID' with your actual table ID

                            if (lrData.length === 0) {
                                table.clear().draw(); // Clear and redraw the table to show no data
                            } else {
                                table.clear(); // Clear existing table data
                                for (var i = 0; i < lrData.length; i++) {
                                    var lr = lrData[i];
                                    table.row.add([
                                        i + 1, // Assuming i starts from 0 for row number
                                        lr.date,
                                        lr.manual_lr_no,
                                        lr.consignor_name,
                                        lr.consignee_name,
                                        lr.delivery_destination,
                                        lr.lr_type,
                                        0 // Example value
                                    ]);
                                }
                                table.draw(); // Redraw the table with the updated data
                            }
                            $(".show").removeAttr("disabled");

                            // Update table info if no data present
                            if (lrData.length === 0) {
                                table.rows().invalidate().draw();
                            }
                        },

                        error: function(xhr, status, error) {
                            
                            // Handle errors
                            console.error('Error:', error);
                        }
                    });
                // }
        });
    });
</script>
		<?=$this->endSection();?>
