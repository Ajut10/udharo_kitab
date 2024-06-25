<?php
if (!session_id()) {
    session_start();
}

$page_title="Products";
include '../includes/header.php';
include '../class/product_class.php';
include '../class/addtional_function.php';
include '../authentication.php';

$productObj = new Product();
$datalist = $productObj->retrieve();
include 'aside.php';

?>

<main>
    <?php alertMessage();?>
    <div class="recent-order">
                    <h2>Products</h2>
                    <table>
                        <thead>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php foreach ($datalist as $product) {?>
                            <tr>
                                <td><?php echo $product['p_name']; ?></td>
                                <td><?php echo $product['p_price']; ?> </td>
                                <td align="center"> <img src="../images/<?php echo $product['image'] ?>" alt="loading"></td>
                                <td class="success"><?= $product['status']?></td>
                                <td class="warning"><a href="editProduct.php?p_id=<?php echo $product['p_id'] ?>"><span class="material-symbols-outlined warning">edit</span></a></td>
                                <td class="danger"><a href="deleteProduct.php?p_id=<?php echo $product['p_id'] ?>"><span class="material-symbols-outlined danger">delete</span></a></td>
                            </tr>
                            <?php }?>


                        </tbody>
                    </table>

    </div>
</main>

<?php
include 'right.php';

?>
</div>
<script src="../javascript/dashScript.js"></script>

<?php
include '../includes/footer.php';
?>