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
           <th>Id</th> 
           <th>Name</th> 
           <th>Createdat</th> 
           <th>Updatedat</th> 
         </thead>
        <tbody>
        <?php foreach($Articletype as $articletype ): ?>   
            <tr>  
                <td><?= $articletype['id'] ?> </td>  
                <td><?= $articletype['name'] ?> </td>  
                <td><?= $articletype['createdAt'] ?> </td>  
                <td><?= $articletype['updatedAt'] ?> </td>  
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
                </div>
            </div>
        </div>
		<?= $this->endSection(); ?>
		