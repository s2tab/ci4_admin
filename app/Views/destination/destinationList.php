<?= $this->extend('layouts/main'); ?>
		<?= $this->section('content'); ?>
		<h1 class="h3 mb-3"><strong><?= $title; ?></strong> List Menu </h1>
		<div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">	Destination List <a href="<?= base_url('destination/form'); ?>" class="btn btn-primary btn-sm float-end" >Create New Destination</a></h5>
            </div>
            <div class="card-body">
                <div>                       
                    <table class="table">
                        <thead> 
                        <th>Sr No</th> 
                        <th>Name</th> 
                        <th>Action</th> 
                        </thead>
                        <tbody>
                        <?php
                        $i=1;
                        foreach($Destination as $destination ): ?>   
                            <tr>  
                                <td><?= $i++ ?> </td>  
                                <td><?= $destination['name'] ?> </td>  
                                <td>
                                    <a href="<?php echo base_url('destination/editDestination?id='.$destination["id"]);?>"> <span class="fa fa-edit"></span></a>
                                    <a href="<?php echo base_url('destination/deleteDestination?id='.$destination["id"]);?>"> <span class="fa fa-trash-alt"></span></a>
                                    <!-- <a href="<?php echo base_url('destination/deletedestination?id='.$destination["id"]);?>"> <span class="fa fa-eye"></span></a> -->
                                        
                                </td>  
                                 
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
		<?= $this->endSection(); ?>
		