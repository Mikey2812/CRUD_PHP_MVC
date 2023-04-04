<?php include_once 'views/layouts/'.$this->layout.'header.php'; ?>

<div class="container mt-5">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Product Add
                        <a href="<?php echo html_helpers::url(array('ctl'=>'products')); ?>" class="btn btn-outline-secondary
                                float-end">BACK</a>
                    </h4>
                </div>
                <?php include_once 'views/products/_form.php'; ?>
            </div>
        </div>
    </div>
</div>
</div>
<?php include_once 'views/layouts/'.$this->layout.'footer.php'; ?>