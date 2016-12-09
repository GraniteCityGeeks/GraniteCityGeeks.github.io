<?php
include("scripts/dbconnect.php");
include ("scripts/header_l2.php.php");
echo "
<main>
";
?>
// This will be used to make/edit club pages.
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>tinymce.init({selector: 'textarea'});</script>
            <form action="createclub" method="post">
                <input type="text" name="clubTitle" placeholder="Club's Name">
                <textarea name="ClubDescription"></textarea>
                <select name="genre">
                    <option value="Sports">Sports</option>
                    <option value="Arts">Arts</option>
                    <option value="Cycling">Cycling</option>
                    <option value="Running">Running</option>
                    <option value="Walking">Walking</option>
                    <option value="hobby">Hobby</option>
                    <option value="other">Other</option>
                </select>
                <input type="submit">
            </form>

<?php
echo "
</main>
";
include("scripts/footer.php");