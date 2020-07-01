<?php 
      include('header.php');
      include('action.php');

?>
        <!--- Alert ---->
        <?php if(isset($_SESSION['response'])) { ?>
        <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
          <?php $_SESSION['response'];?>
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <?= $_SESSION['response'];?>
        </div>
        <?php } unset($_SESSION['response']);?>

<div class="main">
    <div class="add_product">
        <h2 align="center">Add Product</h2>
        <!-------- FORM --------->
        <form action="action.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $id; ?>">
          <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" class="form-control" id="product_name" name="product_name" value="<?= $product_name; ?>">
          </div>
          <div class="form-group">
            <label for="product_price">Product Price($)</label>
            <input type="text" class="form-control" id="product_price" name="product_price" value="<?= $product_price; ?>">
          </div>
          <div class="form-group">
            <label for="product_description">Product Description</label>
            <textarea class="form-control" id="product_description" min="1" name="product_description"> <?= $product_description; ?> </textarea>
          </div>
          <div class="form-group">
            <input type="hidden" name="oldimage" value="<?= $product_image; ?>">
            <label for="product_image">Product Image</label>
            <input type="file" id="product_image" name="product_image" class="input-file">
            <img src="<?= $product_image; ?>" width="120" class="img-thumbnail">
          </div>
          <?php if($update == true){ ?>
            <button type="submit" name="update" class="btn btn-primary">Update Record</button>
          <?php } else { ?>
            <button type="submit" name="add" class="btn btn-primary">Add Product</button>
          <?php } ?>
        </form>
        <!-------- FORM --------->
    </div>
    
    <div class="table_product">
      <?php
        $query = "SELECT * FROM product";	
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
      ?>
      <h2 align="center">Records In Database</h2>
      <table class="table">
        <thead>
            <tr>
              <th scope="col">#ID</th>
              <th scope="col">Product Name</th>
              <th scope="col">Product Image</th>
              <th scope="col">Product Price</th>
              <th scope="col">Product Description</th>
              <th scope="col">Date</th>
              <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
        <?php while($row=$result->fetch_assoc()) { ?>
            <tr>
              <th scope="row"><?= $row['id']; ?></th>
              <td><?= $row['product_name']; ?></td>
              <td><img src="<?= $row['product_image']; ?>" width="90px"></td>
              <td><?= $row['product_price']; ?></td>
              <td><?= $row['product_description']; ?></td>
              <td><?= $row['product_date']; ?></td>
              <td>
                <a href="view.php?view=<?= $row['id']; ?>" class="badge badge-primary">View</a> |
                <a href="action.php?delete=<?= $row['id']; ?>" onclick="return confirm('Do you want delete this product?')" class="badge badge-primary">Delete</a> |
                <a href="add_product.php?edit=<?= $row['id']; ?>" class="badge badge-primary">Edit</a> 
              </td>
              </tr>
        <?php } ?>
          </tbody>
      </table>
    </div>
</div>








    
<?php include('footer.php');?> 
