<?php 
$params = (isset($this->record))? array('id'=>$this->record['id']):'';
?>
<div class="card-body">
    <form method="post" enctype="multipart/form-data" action="<?php echo html_helpers::url(
		array('ctl'=>'products', 
			  'act'=>$this->action, 
			  'params'=>$params
        )); ?>">
        <div class="mb-3">
            <label>Category Name</label>
            <select id="Parent" placeholder="Parent" class="form-select" aria-label="Default select example"
                name="data[<?php echo $this->controller; ?>][category_id]">
                <?php if($this->records) {?>
                <?php while($row = mysqli_fetch_array($this->records)) : ?>
                <option value=<?php echo $row['id'] ?>><?php echo $row['name'] ?></option>
                <?php endwhile; ?>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Product Name</label>
            <input name="data[<?php echo $this->controller; ?>][product_name]" type="text" class="form-control"
                id="name" placeholder="name"
                <?php echo (isset($this->record))? "value='".$this->record['product_name']."'":""; ?>>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <input name="data[<?php echo $this->controller; ?>][description]" type="text" class="form-control"
                id="description" placeholder="description"
                <?php echo (isset($this->record))? "value='".$this->record['description']."'":""; ?>>
        </div>
        <div class="mb-3">
            <label>Price</label>
            <input name="data[<?php echo $this->controller; ?>][price]" type="text" class="form-control" id="price"
                placeholder="price" <?php echo (isset($this->record))? "value='".$this->record['price']."'":""; ?>>
        </div>
        <div class="mb-3">
            <label>Quantity</label>
            <input name="data[<?php echo $this->controller; ?>][quantity]" type="text" class="form-control"
                id="quantity" placeholder="quantity"
                <?php echo (isset($this->record))? "value='".$this->record['quantity']."'":""; ?>>
        </div>
        <div class="mb-3 image-upload">
            <label>Photo</label>
            <input name="image" type="file" class="form-control" id="photo" placeholder="photo">
            <?php if (isset($this->record)): ?>
            <img src="<?php echo "media/upload/" .$this->controller.'/'.$this->record['photo']; ?>"
                alt="<?php echo $this->record['product_name']; ?>" class="img-thumbnail">
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <button name="btn_submit" type="submit"
                class="btn btn-primary"><?php echo ucwords($this->action); ?></button>
        </div>
    </form>
</div>
<?php global $mediaFiles; ?>
<?php array_push($mediaFiles['js'], RootREL."media/js/jquery.min.js"); ?>
<?php array_push($mediaFiles['js'], RootREL."media/js/form.js"); 