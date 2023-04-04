<?php include_once 'views/layouts/'.$this->layout.'header.php'; ?>

<div class="container mt-5">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Product View Details
                        <a href="<?php echo html_helpers::url(array('ctl'=>'products')); ?>" class="btn btn-outline-secondary
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
                        <label class="mb-2">Category ID</label>
                        <p class="form-control">
                            <?php echo $this->record['category_id']; ?>
                        </p>
                    </div>
                    <div class="mb-3">
                        <label class="mb-2">Name</label>
                        <p class="form-control">
                            <?php echo $this->record['name']; ?>
                        </p>
                    </div>
                    <div class="mb-3">
                        <label class="mb-2">Description</label>
                        <p class="form-control">
                            <?php echo $this->record['description']; ?>
                        </p>
                    </div>
                    <div class="mb-3">
                        <label class="mb-2">Price</label>
                        <p class="form-control">
                            <?php echo $this->record['price']; ?>
                        </p>
                    </div>
                    <div class="mb-3">
                        <label class="mb-2">Quantity</label>
                        <p class="form-control">
                            <?php echo $this->record['quantity']; ?>
                        </p>
                    </div>
                    <div class="mb-3">
                        <label class="mb-2">Image</label>
                        <p class="form-control">
                            <?php echo $this->record['photo']; ?>
                        </p>
                        <img src="<?php echo "media/upload/" .$this->controller.'/'.$this->record['photo']; ?>"
                            alt="<?php echo $this->record['name']; ?>" class="img-thumbnail">
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