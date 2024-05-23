 <?php
 include ('../class/credited_product_class.php');
 include('../database/database.php');
 $id =$_SESSION['u_id'];
 
 $query="select c.*,u.* from credit c, user u where u.u_id=c.customer_id and u.u_id='$id' order by c.id desc";
 $query_run=mysqli_query($conn,$query);
 if($query_run->num_rows>0){
    $datalist=$query_run->fetch_all(MYSQLI_ASSOC);
 }
 ?>
 <section id="landing">
        <div class="container">
            <h3>Transactions</h3>
            <div class="transaction">

                <?php if(!isset($datalist)){
                    echo "no transaction till now";
                }else{?>
                <table>
                    <thead>
                        
                        <th>Credit No.</th>
                        <th>Amount</th>
                        <th>Credited Date</th>
                    </thead>
                    <tbody>
                         <?php foreach ($datalist as $row){?>
                        <tr>
                            <td><?=$row['invoice_no'];?> </td>
                            <td><?=$row['total_amount'];?></td>
                            <td><?=$row['credited_date'];?></td>
                            <td><a href="detailTrans.php?id=<?=$row['id'];?>"><span class="material-symbols-outlined">arrow_forward_ios</span></a></td>
                        </tr>
                       <?php } ?>
                    </tbody>
                </table>
                <?php }?>
                
              
            </div>
        </div>
    </section> 