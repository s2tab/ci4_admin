<?=$this->extend('layouts/main');?>
	<?=$this->section('content');?>
	    <div class="card">
            <div class="card-header">
            LR-Receipt
            </div>
            <div class="card-body">
                <div id="print_table_data">   
                    <style>
                    table.lr-reciept {
                        font-size: 13px;
                        font-weight: 700;
                        margin-bottom: 20px;
                        border-collapse: collapse; /* This line ensures proper border rendering */
                    }
                    table.lr-reciept th,
                    table.lr-reciept td {
                        border: 1px solid #000; /* Border style */
                        padding: 5px; /* Padding for content */
                    }
                    </style>
                   <?php
                            $no_article_array = array();
                            $description_array = array();
                            $invoice_no_array = array();
                            $no_of_article_total =0;
                            $actual_wt_total = 0;
                            $charge_wt_total = 0;
                            foreach ($LrArticle as $article){
                                // echo $article;
                                $no_of_article_total = $no_of_article_total + (float)$article['article_no'];
                                $actual_wt_total = $actual_wt_total + (float)$article['actual_wt'];
                                $charge_wt_total = $charge_wt_total + (float)$article['charge_wt'];
                                array_push($no_article_array,$article['article_no']);
                                array_push($invoice_no_array,$article['invoice_no']);
                                array_push($description_array,$article['article_type']." (".$article['contains'].")");
                            }
                        ?>
                        <table border="1" width="100%" cellpadding="4px" style="font-size: 13px; font-weight: 700; margin-bottom: 10px;">
                            <thead>
                                <tr style="border: 1px solid;">                    
                                    <th>LR No.</th>                 
                                    <th>:<?=$LrDetails['manual_lr_no']?></th>
                                    <th>From</th>
                                    <th>:<?=$LrDetails['consignor_address']?></th>
                                    <th>To</th>
                                    <th>:<?=$LrDetails['delivery_destination']?></th>
                                    <th align="right">Date</th>
                                    <th align="right">:<?=$LrDetails['date']?></th>    
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Consignor</td>                 
                                    <td colspan="3">:<?=$LrDetails['consignor_name']?></td>                    
                                    <td>Consignee</td>
                                    <td colspan="3">:<?=$LrDetails['consignee_name']?></td>
                                </tr>
                                <tr>
                                    <td>Mobile No.</td>
                                    <td>:<?=$LrDetails['consignor_mobile_no']?></td>
                                    <td>GSTN</td>
                                    <td>:<?=$LrDetails['consignor_gstn']?></td>
                                    <td>Mobile No.</td>
                                    <td>:<?=$LrDetails['consignee_mobile_no']?></td>
                                    <td>GSTN</td>
                                    <td>:<?=$LrDetails['consignee_gstn']?></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="lr-reciept" border="1" cellpadding="5" cellspacing="0" width="100%" style="font-size: 13px; font-weight: 700; margin-bottom:20px">
                            <tr>
                                <th width="10%">Article</th>
                                <th width="40%">Description</th>
                                <th width="14%">Invoice No.</th>
                                <th width="12%">Actual Wt</th>
                                <th width="12%">Charges</th>
                                <th width="12%">Amount</th>
                            </tr>

                            <tr>
                                <td>
                                    <?php
                                    foreach($no_article_array as $article){
                                        echo $article.'<br />';
                                    }
                                    ?>
                                </td>
                                <td><?php
                                    foreach($description_array as $description){
                                        echo $description.'<br />';
                                    }
                                    ?></td>
                                <td rowspan="6" valign="top">
                                    <?php
                                    foreach($invoice_no_array as $invoice){
                                        echo $invoice."<br />";
                                    }
                                    ?></td>
                                <td rowspan="2"><?=$actual_wt_total?></td>
                                <td>Freight</td>
                                <td><?=$LrDetails['freight']?></td>
                            </tr>
                           

                            <tr>
                                <td rowspan="4"></td>
                                <td rowspan="4"></td>
                                <td>Hamali</td>
                                <td><?=$LrDetails['hamali']?></td>
                            </tr>

                            <tr>
                                
                                <td>Charge Wt</td>
                                <td>B. C</td>
                                <td><?=$LrDetails['bc']?></td>
                            </tr>

                            <tr>
                                
                                <td rowspan="3"><?=$charge_wt_total?></td>
                                <td>Door Delivery</td>
                                <td><?=$LrDetails['door_delivery']?></td>
                            </tr>

                            <tr>
                                
                                <td>Collection</td>
                                <td><?=$LrDetails['collection']?></td>
                            </tr>

                            <tr>
                                <td><?=$no_of_article_total?></td>
                                <td>LR Type:<?=$LrDetails['lr_type']?></td>
                                <td>Other</td>
                                <td><?=$LrDetails['other']?></td>
                            </tr>

                            <tr>
                                <td colspan="5">

                                <span style="width:160px; display:inline-block; font-size:12px">Freight Upto &nbsp;&nbsp;&nbsp;&nbsp; :N/A</span>

                                <span style="width:145px; display:inline-block; font-size:12px">E-Way Bill No :<?=$LrDetails['e_way_bill_no']?></span>

                                <span style="width:200px; display:inline-block; font-size:12px">Deliver At : <?=$LrDetails['deliver_at']?></span>

                                <!-- <span style="width:200px; display:inline-block;"></span> -->

                                </td>
                                
                                <td ><?=$LrDetails['total']?></td>
                            </tr>

                        </table>
                </div>
                
                    <button onclick="printDiv()">Print Table Data</button>
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
                                    var show = '<a href="<?php echo base_url('lrmaster/viewLrMasterDetails?id='); ?>' + lr.lr_id + '"><span class="fa fa-eye"></span></a>';
                                    
                                    table.row.add([
                                        i + 1, // Assuming i starts from 0 for row number
                                        lr.date,
                                        lr.manual_lr_no,
                                        lr.consignor_name,
                                        lr.consignee_name,
                                        lr.delivery_destination,
                                        lr.lr_type,
                                        0, // Example value
                                        show
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
    function printDiv() {
        var printContents = document.getElementById("print_table_data").innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
		<?=$this->endSection();?>
