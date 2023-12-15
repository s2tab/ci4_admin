<?=$this->extend('layouts/main');?>
		<?=$this->section('content');?>
		<h1 class="h3 mb-3"><strong><?=$title;?></strong> </h1>
		<div class="card">
            <div class="card-body">
                <form  method="post">
                    <!-- <main id="main" class="main"> -->
                      <section class="lr_detail_section1">
                        <div class="container-fluid m-0 p-0">
                            <div class="row justify-content-center">
                                <div class=" col-lg-7 p-3 align-right" >
                                    <?=pa($LrDetails)?>
                                    <button class="btn btn-warning  btn-bordered w-md waves-light">Update</button>
                                </div>
                                <div class="col-lg-7 bg-white border p-3 me-2">
                                    <div class="row mb-3">
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                            <div>
                                                <input type="text" value ="<?=$LrDetails['delivery_destination']?>" name="inputDeliveryDestination" placeholder="Delivery Destination" class="w-100 form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 mb-2">
                                            <div>
                                                <select class="w-100 form-control" name="inputBranch" style="height: 29px; font-size: 12px;">
                                                    <option selected>Select Branch</option>
                                                    <?php
                                                        foreach ($Branch as $branch) {
                                                            ?>
                                                                <option <?php echo $LrDetails['branch']==$branch['id']?"selected":""?> value="<?=$branch['id']?>"><?=$branch['name']?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 mb-2">
                                            <input type="date" value="<?=$LrDetails['date']?>" name="inputDate" class="w-100 form-control" style="height: 29px; font-size: 12px;">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <h6>Consignor (From)</h6>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                            <div>
                                                <input type="text" value="<?=$LrDetails['consignor_name']?>" name="inputConsignorName"  placeholder="Consignor Name" class="w-100 form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 mb-2">
                                            <div>
                                                <input type="text" value="<?=$LrDetails['consignor_mobile_no']?>" name="inputConsignorMobileNo" placeholder="Mobile No" class="w-100 form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 mb-2">
                                            <input type="text" value="<?=$LrDetails['consignor_gstn']?>" name="inputConsignorGstn" placeholder="GSTN" class="w-100 form-control" >
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-9 col-md-9 col-sm-12 mb-2">
                                            <div>
                                                <input type="text" value="<?=$LrDetails['consignor_address']?>" name="inputConsignorAddress" placeholder="Address" class="w-100 form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12 mb-2">
                                            <div>
                                                <input type="text" value="<?=$LrDetails['consignor_state']?>" name="inputConsignorState" placeholder="State" class="w-100 form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <h6>Consignee (To)</h6>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                            <div>
                                                <input type="text" value="<?=$LrDetails['consignee_name']?>" name="inputConsigneeName" placeholder="Consignee Name" class="w-100 form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 mb-2">
                                            <div>
                                                <input type="text" value="<?=$LrDetails['consignee_mobile_no']?>" name="inputConsigneeMobileNo" placeholder="Mobile No" class="w-100 form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 mb-2">
                                            <input type="text" value="<?=$LrDetails['consignee_gstn']?>" name="inputConsigneeGstn" placeholder="GSTN" class="w-100 form-control">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-9 col-md-9 col-sm-12 mb-2">
                                            <div>
                                                <input type="text" value="<?=$LrDetails['consignee_address']?>" name="inputConsigneeAddress" placeholder="Address" class="w-100 form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12 mb-2">
                                            <div>
                                                <input type="text" value="<?=$LrDetails['consignee_state']?>" name="inputConsigneeState" placeholder="State" class="w-100 form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3 align-items-end">
                                        <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                                            <div>
                                                <h6>Charge Type <span style="color: red; font-size: 14px;">*</span> </h6>
                                                <input type="text"  placeholder="Article/Fix" class="w-100 form-control article-charge-type">
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                                            <div>
                                                <h6>No. Of Article </h6>
                                                <input type="text" placeholder="00" class="w-100 text-end form-control article-no-of-articles">
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                                            <div>
                                                <h6>Article Type <span style="color: red; font-size: 14px;">*</span> </h6>
                                                <input type="text" placeholder="e.g.Box" class="w-100 form-control article-article-type">
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                                            <div>
                                                <h6>Article Amt</h6>
                                                <input type="text" placeholder="Article Amount" class="w-100 form-control article-article-amt">
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                                            <div>
                                                <h6>Contains</h6>
                                                <input type="text" placeholder="Contains" class="w-100 form-control article-contains">
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                                            <div>
                                                <h6>Invoice No</h6>
                                                <input type="text" placeholder="Invoice No" class="w-100 form-control article-invoice">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-5 d-flex align-items-end">
                                        <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                                            <div>
                                                <h6>Actual Wt(kg)</h6>
                                                <input type="text" placeholder="00" class="w-100 text-end form-control" >
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                                            <div>
                                                <h6>Charge Wt(kg)</h6>
                                                <input type="text" placeholder="00" class="w-100 text-end form-control calculate-amount article-charge-wt">
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                                            <div>
                                                <h6>Wt Rate/kg</h6>
                                                <input type="text" placeholder="00" class="w-100 text-end form-control calculate-amount article-wt-rate-per-kg">
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                                            <div>
                                                <h6>Wt Amt</h6>
                                                <input type="text" disabled placeholder="00" class="w-100 text-end form-control article-wt-amount" >
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                                            <div>
                                                <h6>Fix Amt</h6>
                                                <input type="text" placeholder="00" class="w-100 text-end form-control">
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                                            <div>
                                                <button id="Dashboard_show_btn" class="btn btn-warning btn-add-article" data-count="0">Add</button>
                                            </div>
                                        </div>
                                    </div>
        
                                    <table class="table table-striped table-bordered article-detail" cellspacing="0">
                                        
                                        <th>
                                            Sr.no.
                                        </th>
                                        <th>Invoice No</th>
                                        <th>Charge Type</th>
                                        <th>Article Type</th>
                                        <th>Contains</th>
                                        <th>No. Of Article</th>
                                        <th>Amount</th>
                                        <th scope="col">Edit / Delete </th>
                                        <tbody class="article-body">
                                        <?php
                                            $i=1;
                                            foreach ($LrArticle as $article){
                                        ?>
                                        <tr>
                                            <td><?=$i++?></td>
                                            <td><input type='hidden'  name='invoiceNo[]' value='<?=$article["invoice_no"]?>'><?=$article["invoice_no"]?></td>
                                            <td><input type='hidden'  name='chargeType[]' value='<?=$article["article_type"]?>'><?=$article["article_type"]?></td>
                                            <td><input type='hidden'  name='articleType[]' value='<?=$article["article_type"]?>'><?=$article["article_type"]?></td>
                                            <td><input type='hidden'  name='contains[]' value='<?=$article["contains"]?>'><?=$article["contains"]?></td>
                                            <td><input type='hidden'  name='NoOfArticles[]' value='<?=$article["article_no"]?>'><?=$article["article_no"]?></td>
                                            <td><input type='hidden'  name='wtAmount[]' value='<?=$article["wt_amt"]?>'><?=$article["wt_amt"]?></td>
                                            <td>
                                                <span class=" btn-action fa fa-edit "  data-value = "edit"  data-id="<?=$article["id"]?>"></span>
                                                <span class=" btn-action fa fa-trash " data-value = "delete" data-id="<?=$article["id"]?>"></span>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>  
                                        </tbody>
                                    </table>
                                    <div class="row mb-3 d-flex align-items-end" style="margin-top: 150px;">
                                        <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                                            <div>
                                                <h6>Tr Mode <span style="color: red; font-size: 14px;">*</span> </h6>
                                                <select name="inputTrMode" id="" class="w-100 form-control" style="height: 29px; font-size: 12px;">
                                                    <option value="" > Road</option>
                                                    <option value="" > Test1</option>
                                                    <option value="" > Test2</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                                            <div>
                                                <h6>E-Way Bill No</h6>
                                                <input type="text" value="<?=$LrDetails['e_way_bill_no']?>" name="inputEWayBillNo" placeholder="e.g.12345678" class="w-100 form-control">
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                                            <div>
                                                <h6>Truck No</h6>
                                                <input type="text" value="<?=$LrDetails['truck_no']?>" name="inputTruckNo" placeholder="e.g. MH-12-mh-12" class="w-100 form-control">
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                                            <div>
                                                <h6>GST Pay By</h6>
                                                <select name="inputGstPayBy" id="" class="w-100 form-control" style="height: 29px; font-size: 12px;">
                                                    <option class="option" value="" selected> Consianor</option>
                                                    <option class="option" value="" > Test1</option>
                                                    <option class="option" value="" > Test2</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                                            <div>
                                                <h6>L x W X H</h6>
                                                <input type="text" value="<?=$LrDetails['size']?>" name="inputSize" placeholder="e.g" class="w-100 form-control">
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div class="col-lg-3 bg-white border p-3 mb-0">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <h6 class="m-0">POD</h6>
                                        <label for="">
                                            <input <?php echo $LrDetails['pod']=="yes" ? "checked" : "" ?> name="inputPod" value="yes" type="radio">
                                            Yes
                                        </label>
                                        <label for=""> 
                                            <input <?php echo $LrDetails['pod'] == "no" ? "checked" : "" ?> name="inputPod" value="no" type="radio">
                                            No
                                        </label>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-4 px-2 m-0">
                                            <h6 class="m-0 p-0">LR Type</h6>
                                        </div>
                                        <div class="col-lg-8">
                                            <select name="inputLrType" id="" class="w-100 form-control" style="height: 29px; font-size: 12px;">
                                                <option value="" <?php echo $LrDetails['lr_type'] == "no" ? "selected" : "" ?>>TBB</option>
                                                <option value="" >Test1</option>
                                                <option value="" >Test2</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-4 px-2 m-0">
                                            <h6 class="m-0 p-0">Manual LR No</h6>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" value="<?=$LrDetails['manual_lr_no']?>" name="inputManualLrNo" class="w-100 form-control" placeholder="e.g.LR/01">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-4 px-2 m-0">
                                            <h6 class="m-0 p-0">Delivery At</h6>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" value="<?=$LrDetails['deliver_at']?>" name="inputDeliverAt" class="w-100 form-control" placeholder="Godown">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-4 px-2 m-0">
                                            <h6 class="m-0 p-0">Load Type</h6>
                                        </div>
                                        <div class="col-lg-8">
                                            <select name="inputLoadType" id="" class="w-100 form-control" style="height: 29px; font-size: 12px;">
                                                <option value="" <?php echo $LrDetails['load_type'] == "no" ? "selected" : "" ?>>Part Load</option>
                                                <option value="" >Test1</option>
                                                <option value="" >Test2</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-4 px-2 m-0">
                                            <h6 class="m-0 p-0">Freight</h6>
                                        </div>
                                        <div class="col-lg-8"> 
                                            <input type="text" value="<?=$LrDetails['freight']?>" disabled name="inputFreight1" class="freightAmount w-100 text-end form-control" placeholder="00" >
                                            <input type="hidden" value="<?=$LrDetails['freight']?>" name="inputFreight" class="freightAmount w-100 text-end form-control" placeholder="00" >
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-4 px-2 m-0">
                                            <h6 class="m-0 p-0">Hamali</h6>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" value="<?=$LrDetails['hamali']?>" name="inputHamali" class="amount-calculation w-100 text-end form-control" placeholder="00">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-4 px-2 m-0">
                                            <h6 class="m-0 p-0">B.C</h6>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" value="<?=$LrDetails['bc']?>" name="inputBc" class=" amount-calculation w-100 text-end form-control" placeholder="20.00">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-4 px-2 m-0">
                                            <h6 class="m-0 p-0">Collection</h6>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" value="<?=$LrDetails['collection']?>" name="inputCollection" class=" amount-calculation w-100 text-end form-control" placeholder="00">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-4 px-2 m-0">
                                            <h6 class="m-0 p-0">Detantion</h6>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" value="<?=$LrDetails['detantion']?>" name="inputDetantion" class=" amount-calculation w-100 text-end form-control" placeholder="00">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-4 px-2 m-0">
                                            <h6 class="m-0 p-0">Door Delivery</h6>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" value="<?=$LrDetails['door_delivery']?>" name="inputDoorDelivery" class=" amount-calculation w-100 text-end form-control" placeholder="00">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-4 px-2 m-0">
                                            <h6 class="m-0 p-0">Other</h6>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" value="<?=$LrDetails['other']?>" name="inputOther" class="amount-calculation w-100 text-end form-control" placeholder="00">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-4 px-2 m-0">
                                            <h6 class="m-0 p-0">Carting</h6>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" value="<?=$LrDetails['carting']?>" name="inputCarting" class="amount-calculation w-100 text-end form-control" placeholder="00">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-4 px-2 m-0">
                                            <h6 class="m-0 p-0">Total</h6>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" value="<?=$LrDetails['total']?>" disabled name="inputTotal1" class="calculation-total w-100 text-end form-control" placeholder="00" >
                                            <input type="hidden" value="<?=$LrDetails['total']?>" name="inputTotal" class="calculation-total w-100 text-end form-control" placeholder="00" >
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-4 px-2 m-0">
                                            <h6 class="m-0 p-0">Grand Total</h6>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" value="<?=$LrDetails['grand_total']?>"  name="inputGrandTotal" class="w-100 text-end form-control" placeholder="00" >
                                        </div>
                                    </div>

                                </div>
                            </div>
                         </div>
                        </section>
                    <!-- </main>End #main -->
                </form>    
            </div>
        </div>

           
        <script>
            $(document).ready(function(){

                $(".calculate-amount").on("keyup", function(){
                    var chargewt = parseFloat($(".article-charge-wt").val()); 
                    var wtRatePerKg = parseFloat($(".article-wt-rate-per-kg").val()); 
                    if (!isNaN(chargewt) && !isNaN(wtRatePerKg)) {
                    var wtAmount = chargewt * wtRatePerKg;
                        $(".article-wt-amount").val(wtAmount);
                    }
                    else {
                        $(".article-wt-amount").val("");
                   
                    }
                });

                $(".amount-calculation").on("keyup", function(){
                    // alert($(".freightAmount").val())
                    var freightAmount = parseFloat($(".freightAmount").val());
                   
                    var total = 0;
                    $('.amount-calculation').each(function() {
                        var value = parseFloat($(this).val());
                        console.log("value: " + value);
                        if (!isNaN(value)) {
                            total += value;
                        }
                     });
                     if(freightAmount){
                        total = total + freightAmount
                    }
                     $(".calculation-total").val(total);
                });

                $(".btn-add-article").on("click", function(){
                    event.preventDefault();
                    var count = $(this).attr("data-count");
                    var invoiceNo = $(".article-invoice").val();
                    var chargeType = $(".article-charge-type").val();
                    var articleType = $(".article-article-type").val();
                    var contains = $(".article-contains").val();
                    var NoOfArticles = $(".article-no-of-articles").val();
                    var wtAmount =parseFloat($(".article-wt-amount").val());
                    var str = "";
                    var freightAmount = parseFloat($(".freightAmount").val());
                    var calculationTotal = parseFloat($(".calculation-total").val());
                    
                    if(invoiceNo!="" && chargeType!=""){
                    count++;
                    str = "<tr>"+
                          "<td> "+count+"</td>"+  
                          "<td><input type='hidden'  name='invoiceNo[]' value='"+invoiceNo+"'>"+invoiceNo+"</td>"+
                          "<td><input type='hidden'  name='chargeType[]' value='"+chargeType+"'>"+chargeType+"</td>"+
                          "<td><input type='hidden'  name='articleType[]' value='"+articleType+"'>"+articleType+"</td>"+
                          "<td><input type='hidden'  name='contains[]' value='"+contains+"'>"+contains+"</td>"+
                          "<td><input type='hidden'  name='NoOfArticles[]' value='"+NoOfArticles+"'>"+NoOfArticles+"</td>"+
                          "<td><input type='hidden'  name='wtAmount[]' value='"+wtAmount+"'>"+wtAmount+"</td>"+
                          "</tr>";  

                          freightAmount = freightAmount + wtAmount;
                        $(".freightAmount").val(freightAmount);
                        if(calculationTotal){
                            calculationTotal = calculationTotal+ wtAmount;
                            $(".calculation-total").val(calculationTotal)
                        }
                        else{
                            $(".calculation-total").val(wtAmount)

                        }

                    $(this).attr("data-count",count);
                    $(".article-body").append(str);

                    $(".article-invoice").val("");
                    $(".article-charge-type").val("");
                    $(".article-article-type").val("");
                    $(".article-contains").val("");
                    $(".article-charge-wt").val(""); 
                    $(".article-wt-rate-per-kg").val(""); 
                    $(".article-wt-amount").val("");
                    $(".article-no-of-articles").val("");
                    }
                });


                $(".btn-action").on("click", function(){
                    var id = $(this).data("id");
                    var value = $(this).data("value");
                    if(value == "edit"){
                        var data = <?=json_encode($LrArticle)?>;
                        var selectedArticle = data.find(function(d) {
                        if(d.id == id){
                            return d;
                        }
                        });
                        $(".article-charge-type").val(selectedArticle.charge_type);
                        $(".article-no-of-articles").val(selectedArticle.article_no);
                        $(".article-article-type").val(selectedArticle.article_type);
                        $(".article-article-amt").val(selectedArticle.article_amount);
                        $(".article-charge-type").val(selectedArticle.charge_type);
                        $(".article-charge-type").val(selectedArticle.charge_type);
                        $(".article-charge-type").val(selectedArticle.charge_type);
                        $(".article-charge-type").val(selectedArticle.charge_type);
                    }
                    
                });
            });
        </script>
		<?=$this->endSection();?>
