<?php include_once 'views/layouts/'.$this->layout.'header.php'; ?>

<div class="container mt-5">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Category View Details
                        <a href="<?php echo html_helpers::url(array('ctl'=>'categories')); ?>" class="btn btn-outline-secondary
                                float-end">BACK</a>
                    </h4>
                </div>
                <?php if($this->record) {?>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="mb-2">ID</label>
                        <p class="form-control">
                            <?php echo $this->record['id']; ?>
                        </p>
                    </div>
                    <div class="mb-3">
                        <label class="mb-2">Name</label>
                        <p class="form-control">
                            <?php echo $this->record['name']; ?>
                        </p>
                    </div>
                    <?php }  else { ?>
                    <p class='not-found-ID'>No Such Id Found</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'views/layouts/'.$this->layout.'footer.php'; ?>