
    <form class="form"  method="post">
        <fieldset>
            <legend><i class="far fa-sticky-note"></i> Edit article</legend>

            <div class="name">
                <label for="name">Name :</label>
                <input class="input"type="text" name='name'  value="<?php echo $product['name']?>">
            </div>

            <div class="description">
                <label for="description">Description :</label>
                <textarea type="text" name='description' ><?php echo $product['description']?></textarea>
            </div>

            <div <!--class="img"-->
            <label >Image :</label>
            <!--<input class="file" type="file" accept="image/*">-->
            <input class="input"type="text" name="image" value="<?php echo $product['image']?>">
            </div>

            <div class="button">
                <button type="submit" name="button" class="save">Save Modification</button>
                <a href="../public/admin" class="cancel">Cancel</a>
                <!--<button type="button" name="button" class="cancel">Cancel</button>-->
            </div>
        </fieldset>
    </form>
