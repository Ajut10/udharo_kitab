<?php

if (!session_id()) {
    session_start();
}

include '../includes/header.php';
$page_title = "Credit";
include '../class/credit_class.php';
include '../authentication.php';
$creditobj = new Credit();
$datalist = $creditobj->retrieve();

include 'aside.php';

?>
<main>
    <div class="recent-order">
        <h2>Credits</h2>
        <table>
            <thead>
                <th>Name</th>
                <th>Phone</th>
                <th>Credit no</th>
                <th>Amounts</th>
                <th>Date</th>
            </thead>
            <tbody>
                <?php foreach ($datalist as $credit) {?>
                <tr>
                    <td><?=$credit['name']?></td>
                    <td><?=$credit['phone']?></td>
                    <td><?=$credit['invoice_no']?></td>
                    <td><?=$credit['total_amount']?></td>
                    <td><?=$credit['credited_date']?></td>
                    <td><a href="listCredit_details.php?id=<?=$credit['id'];?>"><span class="material-symbols-outlined primary">info</span></a>
                        </td>

                </tr>
                <?php }?>
                </tbody>
            </table>
        </div>

    </main>
<?php
include '../includes/footer.php';