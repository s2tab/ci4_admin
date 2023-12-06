<?= $this->extend('layouts/main'); ?>
		<?= $this->section('content'); ?>
		<h1 class="h3 mb-3"><strong><?= $title; ?></strong> List Menu </h1>
		<div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">	Article Type List <a href="<?= base_url('ArticleTypeMaster/form'); ?>" class="btn btn-primary btn-sm float-end" >Create New Article Type</a></h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table">
        <thead> 
           <th>Sr No</th> 
           <th>Name</th> 
           <th>Action</th>
         </thead>
        <tbody>
        <?php 
        $i=1;
        foreach($Articletype as $articletype ): ?>   
            <tr>  
                <td><?= $i++?> </td>  
                <td><?= $articletype['name'] ?> </td>  
                <td>
                   <a href="<?php echo base_url('ArticleTypeMaster/editArticletype?id='.$articletype["id"]);?>"> <span class="fa fa-edit"></span></a>
                   <a href="<?php echo base_url('ArticleTypeMaster/deleteArticletype?id='.$articletype["id"]);?>"> <span class="fa fa-trash-alt"></span></a>
                   <!-- <a href="<?php echo base_url('ArticleTypeMaster/deleteArticletype?id='.$articletype["id"]);?>"> <span class="fa fa-eye"></span></a> -->
                    
                </td>  
                 
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
                </div>
            </div>
        </div>
		<?= $this->endSection(); ?>
		