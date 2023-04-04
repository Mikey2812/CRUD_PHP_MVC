<?php 
$params = (isset($this->record))? array('id'=>$this->record['id']):'';
?>
<div class="card-body">
    <form method="post" enctype="multipart/form-data" action="<?php echo html_helpers::url(
		array('ctl'=>'categories', 
			  'act'=>$this->action, 
			  'params'=>$params
        )); ?>">
        <div class="mb-3">
            <label>Category Name</label>
            <input name="data[<?php echo $this->controller; ?>][name]" type="text" class="form-control" id="name"
                placeholder="name" <?php echo (isset($this->record))? "value='".$this->record['name']."'":""; ?>>
        </div>
        <div class="mb-3">
            <label>Parent Name</label>
            <select id="path" placeholder="path" class="form-select" aria-label="Default select example"
                name="data[<?php echo $this->controller; ?>][path]">
                <option selected> <?php echo (isset($this->parent))?$this->parent['name']:'Select'?> </option>
                <option value=''>New Root</option>
                <!-- <option selected> --------- Menu --------- </option> -->
                <?php if($this->records) {?>
                <?php while($row = mysqli_fetch_array($this->records)) : ?>
                <option value=<?php echo $row['path'] ?>>
                    <?php echo $row['name'] ?></option>
                <?php endwhile; ?>
                <?php } ?>
            </select>
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