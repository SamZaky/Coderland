
    <form class="form"  method="post">
        <fieldset>
            <legend><i class="far fa-sticky-note"></i> Nouvelle article</legend>
            <div class="name">
                <label >Name :</label>
                <input class="input"type="text" name="name">
            </div>

            <div class="name">
                <label >Description :</label>
                <textarea class="input"type="text" name="description"></textarea>
            </div>

            <div <!--class="img"-->
            <label >Image :</label>
            <!--<input class="file" type="file" accept="image/*">-->
            <input class="input"type="text" name="image" placeholder="../public/assets/img/">
            </div>

            <div class="button">
                <button type="submit" name="button" class="btn">Save</button>
                <a href="../public/admin" class="cancel">Cancel</a>

            </div>
        </fieldset>
    </form>
