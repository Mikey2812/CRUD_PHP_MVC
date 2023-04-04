<?php include_once 'views/layouts/'.$this->layout.'header.php'; ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0">Product Details
                        <a href="<?php echo html_helpers::url(array('ctl'=>'products', 'act'=>'add')); ?>"
                            class="btn btn-outline-primary float-end">Add Products</a>
                    </h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($this->records) { ?>
                            <?php while($row = mysqli_fetch_array($this->records)) : ?>
                            <tr>
                                <td width="5%" scope="row"><?php echo $row['id']; ?></td>
                                <td width="7%" scope="row"><?php echo $row['name']; ?></td>
                                <td width="10%"><?php echo $row['product_name']; ?></td>
                                <td width="20%"><?php echo $row['description']; ?></td>
                                <td width="10%"><?php echo $row['price']; ?></td>
                                <td width="10%"><?php echo $row['quantity']; ?></td>
                                <td width="25%"><img
                                        src="<?php echo "media/upload/" .$this->controller.'/'.$row['photo']; ?>"
                                        alt="<?php echo $row['product_name']; ?>" class="img-thumbnail"></td>
                                <td width="13%">
                                    <a class="btn btn-outline-success" role="button" href="<?php echo html_helpers::url(
                                        ['ctl'=>'products', 
                                            'act'=>'view', 
                                            'params'=>array(
                                                'id'=>$row['id']
                                                )
                                        ]); ?>">
                                        View
                                    </a>
                                    <a class="btn btn-outline-warning" role="button" href="<?php echo html_helpers::url(
                                        array('ctl'=>'products', 
                                            'act'=>'edit', 
                                            'params'=>array(
                                                'id'=>$row['id']
                                        ))); ?>">
                                        Edit
                                    </a>
                                    <a class="btn btn-outline-danger table-link delete"
                                        data-product-id="<?php echo $row['id']; ?>" role="button" href="<?php echo html_helpers::url(
                                        array('ctl'=>'products', 
                                            'act'=>'del', 
                                            'params'=>array(
                                                'id'=>$row['id']
                                        ))); ?>">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                            <?php } else { ?>
                            <tr>
                                <td colspan="7" scope="row">There are no record!</td>
                            </tr>
                            <?php }  ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
global $mediaFiles;
?>
<?php array_push($mediaFiles['js'], RootREL."media/js/jquery.min.js"); ?>
<?php array_push($mediaFiles['js'], RootREL."media/js/products.js"); ?>
<?php include_once 'views/layouts/'.$this->layout.'footer.php'; ?>