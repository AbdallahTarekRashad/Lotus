<form action="../Controllers/addProductController.php" method="post" enctype="multipart/form-data">
    <textarea name="script_en" placeholder="English Script"></textarea>
    <textarea name="script_ar" placeholder="Arabic Script"></textarea>
    <input type="text" name="name_en" placeholder="English Name">
    <input type="text" name="name_ar" placeholder="Arabic Name">
    <input type="text" name="video" placeholder="YouTube ID">
    <input type="number" name="price" placeholder="Price">
    <input type="file"  name="image">
    <input type="submit" name="submit" value="addProduct">
</form>