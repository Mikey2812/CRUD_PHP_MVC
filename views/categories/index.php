<?php include_once 'views/layouts/'.$this->layout.'header.php'; ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0">Category Details
                        <a href="<?php echo html_helpers::url(array('ctl'=>'categories', 'act'=>'add')); ?>"
                            class="btn btn-outline-primary float-end">Add categories</a>
                    </h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($this->records) { ?>
                            <?php while($row = mysqli_fetch_array($this->records)) : ?>
                            <tr>
                                <td width="10%" scope="row"><?php echo $row['id']; ?></td>
                                <td width="60%"><?php echo $row['name']; ?></td>
                                <td width="30%">
                                    <a class="btn btn-outline-success" role="button" href="<?php echo html_helpers::url(
                                        ['ctl'=>'categories', 
                                            'act'=>'view', 
                                            'params'=>array(
                                                'id'=>$row['id']
                                                )
                                        ]); ?>">
                                        View
                                    </a>
                                    <a class="btn btn-outline-warning" role="button" href="<?php echo html_helpers::url(
                                        array('ctl'=>'categories', 
                                            'act'=>'edit', 
                                            'params'=>array(
                                                'id'=>$row['id']
                                        ))); ?>">
                                        Edit
                                    </a>
                                    <a class="btn btn-outline-danger table-link delete"
                                        data-product-id="<?php echo $row['id']; ?>"
                                        data-path="<?php echo $row['path']; ?>" role="button" href="<?php echo html_helpers::url(
                                        array('ctl'=>'categories', 
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
<?php array_push($mediaFiles['js'], RootREL."media/js/categories.js"); ?>
<?php include_once 'views/layouts/'.$this->layout.'footer.php'; ?>