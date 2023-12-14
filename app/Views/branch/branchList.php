<?=$this->extend('layouts/main');?>
		<?=$this->section('content');?>
		<h1 class="h3 mb-3"><strong><?=$title;?></strong> List Menu </h1>
		<div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">	Branch List <a href="<?=base_url('Branch/form');?>" class="btn btn-primary btn-sm float-end" >Create New Branch</a></h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table" id="branchList">
                    <thead>
                    <th>Sr No</th>
                    <th>Name</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $i = 0; foreach ($Branch as $branch): ?>
                        <tr>
                            <td><?=++$i?> </td>
                            <td><?=$branch['name']?> </td>
                            <td>
                                    <a href="<?php echo base_url('branch/editbranch?id='.$branch["id"]);?>"> <span class="fa fa-edit"></span></a>
                                    <a href="<?php echo base_url('branch/deletebranch?id='.$branch["id"]);?>"> <span class="fa fa-trash-alt"></span></a>   
                            </td> 
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <script>
          $(document).ready(function(){
            $('#branchList').DataTable({
            responsive: true,
            pageLength: 10
        });
          });

        </script>
		<?=$this->endSection();?>
