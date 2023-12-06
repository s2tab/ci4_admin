<?=$this->extend('layouts/main');?>
		<?=$this->section('content');?>
		<h1 class="h3 mb-3"><strong><?=$title;?></strong> Form Menu </h1>
		<div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">	Article Type Form </h5>
            </div>
            <div class="card-body">
            <form action="<?=base_url('ArticleTypeMaster/createArticletype');?>" method="post">
            <div class="form-group">
                <label for="inputName">Name</label>
                <input type="text" class="form-control" name="inputName" id="inputName" required>
            </div>
        <div class="d-grid gap-2 mt-3">
                        <button class="btn btn-primary" type="submit">Save Data</button>
                    </div>
    </form>
            </div>
        </div>
		<?=$this->endSection();?>
