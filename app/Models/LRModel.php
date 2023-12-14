<?php

namespace App\Models;

use CodeIgniter\Model;

class LRModel extends Model
{
    public function getLrDetails($LrDetailsID = false)
    {
        if ($LrDetailsID) {
            return $this->db->table('lr_details')
                ->where(['lr_details.id' => $LrDetailsID])
                ->get()->getRowArray();
        } else {
            return $this->db->table('lr_details')
            ->where(['lr_details.date' => date("Y-m-d")])
                ->get()->getResultArray();
        }
    }

    public function filterLRDetails($period, $fromDate = false, $toDate = false)
    {
        if ($period == "all") {
            return $this->db->table('lr_details')
                ->get()->getResultArray();
        }else if($period == "today")
        {
            return $this->db->table('lr_details')
            ->where(['lr_details.date' => date("Y-m-d")])
                ->get()->getResultArray();
        }
         else {
           return $this->db->table('lr_details')
            ->where("lr_details.date BETWEEN '$fromDate' AND '$toDate'")
            ->get()
            ->getResultArray();
        }
    }

    public function createLrDetails($dataLrDetails)
    {
        $lr_id = $this->db->table('lr_details')->insert([
            'delivery_destination' => $dataLrDetails['inputDeliveryDestination'],
            'branch' => $dataLrDetails['inputBranch'],
            'date' => $dataLrDetails['inputDate'],
            'consignor_name' => $dataLrDetails['inputConsignorName'],
            'consignor_mobile_no' => $dataLrDetails['inputConsignorMobileNo'],
            'consignor_gstn' => $dataLrDetails['inputConsignorGstn'],
            'consignor_address' => $dataLrDetails['inputConsignorAddress'],
            'consignor_state' => $dataLrDetails['inputConsignorState'],
            'consignee_name' => $dataLrDetails['inputConsigneeName'],
            'consignee_mobile_no' => $dataLrDetails['inputConsigneeMobileNo'],
            'consignee_gstn' => $dataLrDetails['inputConsigneeGstn'],
            'consignee_address' => $dataLrDetails['inputConsigneeAddress'],
            'consignee_state' => $dataLrDetails['inputConsigneeState'],
            'tr_mode' => $dataLrDetails['inputTrMode'],
            'e_way_bill_no' => $dataLrDetails['inputEWayBillNo'],
            'truck_no' => $dataLrDetails['inputTruckNo'],
            'gst_pay_by' => $dataLrDetails['inputGstPayBy'],
            'size' => $dataLrDetails['inputSize'],
            'pod' => $dataLrDetails['inputPod'],
            'lr_type' => $dataLrDetails['inputLrType'],
            'manual_lr_no' => $dataLrDetails['inputManualLrNo'],
            'deliver_at' => $dataLrDetails['inputDeliverAt'],
            'load_type' => $dataLrDetails['inputLoadType'],
            'freight' => $dataLrDetails['inputFreight'],
            'hamali' => $dataLrDetails['inputHamali'],
            'bc' => $dataLrDetails['inputBc'],
            'collection' => $dataLrDetails['inputCollection'],
            'detantion' => $dataLrDetails['inputDetantion'],
            'door_delivery' => $dataLrDetails['inputDoorDelivery'],
            'other' => $dataLrDetails['inputOther'],
            'carting' => $dataLrDetails['inputCarting'],
            'total' => $dataLrDetails['inputTotal'],
            'grand_total' => $dataLrDetails['inputGrandTotal'],
            "created_by"=>session()->get('username')
        ]);
        if($lr_id){
            $insertData = array();

            // Assuming all arrays are of the same length
            $rowCount = count($dataLrDetails['NoOfArticles']); // Assuming 'NoOfArticles' array as reference
    
            for ($i = 0; $i < $rowCount; $i++) {
                $insertData[] = array(
                    "lr_id"=>$lr_id,
                    "invoice_no" => $dataLrDetails['invoiceNo'][$i],
                    "charge_type" => $dataLrDetails['chargeType'][$i],
                    "article_type" => $dataLrDetails['articleType'][$i],
                    "contains" => $dataLrDetails['contains'][$i],
                    "article_no" => $dataLrDetails['NoOfArticles'][$i],
                    "wt_amt" => $dataLrDetails['wtAmount'][$i],
                );
            }
            $builder = $this->db->table("lr_article");
            $builder->insertBatch($insertData);
            // Perform bulk insert
            return $lr_id;
        }
       return 0;

    }

    public function updateLrDetails($dataLrDetails)
    {
        return $this->db->table('lr_details')->update([
            'delivery_destination' => $dataLrDetails['inputDeliveryDestination'],
            'branch' => $dataLrDetails['inputBranch'],
            'date' => $dataLrDetails['inputDate'],
            'consignor_name' => $dataLrDetails['inputConsignorName'],
            'consignor_mobile_no' => $dataLrDetails['inputConsignorMobileNo'],
            'consignor_gstn' => $dataLrDetails['inputConsignorGstn'],
            'consignor_address' => $dataLrDetails['inputConsignorAddress'],
            'consignor_state' => $dataLrDetails['inputConsignorState'],
            'consignee_name' => $dataLrDetails['inputConsigneeName'],
            'consignee_mobile_no' => $dataLrDetails['inputConsigneeMobileNo'],
            'consignee_gstn' => $dataLrDetails['inputConsigneeGstn'],
            'consignee_address' => $dataLrDetails['inputConsigneeAddress'],
            'consignee_state' => $dataLrDetails['inputConsigneeState'],
            'tr_mode' => $dataLrDetails['inputTrMode'],
            'e_way_bill_no' => $dataLrDetails['inputEWayBillNo'],
            'truck_no' => $dataLrDetails['inputTruckNo'],
            'gst_pay_by' => $dataLrDetails['inputGstPayBy'],
            'size' => $dataLrDetails['inputSize'],
            'pod' => $dataLrDetails['inputPod'],
            'lr_type' => $dataLrDetails['inputLrType'],
            'manual_lr_no' => $dataLrDetails['inputManualLrNo'],
            'deliver_at' => $dataLrDetails['inputDeliverAt'],
            'load_type' => $dataLrDetails['inputLoadType'],
            'freight' => $dataLrDetails['inputFreight'],
            'hamali' => $dataLrDetails['inputHamali'],
            'bc' => $dataLrDetails['inputBc'],
            'collection' => $dataLrDetails['inputCollection'],
            'detantion' => $dataLrDetails['inputDetantion'],
            'door_delivery' => $dataLrDetails['inputDoorDelivery'],
            'other' => $dataLrDetails['inputOther'],
            'carting' => $dataLrDetails['inputCarting'],
            'total' => $dataLrDetails['inputTotal'],
            'grand_total' => $dataLrDetails['inputGrandTotal'],
            'created_by' => $dataLrDetails['inputCreatedBy'],
            'created_at' => $dataLrDetails['inputCreatedAt'],
        ], ['id' => $dataLrDetails['inputLrDetailsID']]);
    }

    public function deleteLrDetails($LrDetailsID)
    {
        return $this->db->table('lr_details')->delete(['id' => $LrDetailsID]);
    }
}
