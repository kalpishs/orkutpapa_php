<table width="" border="1">
  <tr>
    <th scope="col">Total Category Group</th>
    <th scope="col">Total Category</th>
    <th scope="col">Total Scraps</th>
    <th scope="col">Total Featured Category</th>
    <th scope="col">Total Image Scraps</th>
    <th scope="col">Total Flash Scraps</th>
    <th scope="col">Total Glitre Scraps</th>
  </tr>
  <tr>
    <td><?php echo $adminOb->totalgroup();?></td>
    <td><?php echo $adminOb->totalcategory(); ?></td>
    <td><?php echo $adminOb->totalscraps();?></td>
    <td><?php echo $adminOb->totalFeaturedcategory();?></td>
    <td><?php echo $adminOb->totalscrapDescription("I");?></td>
    <td><?php echo $adminOb->totalscrapDescription("F");?></td>
    <td><?php echo $adminOb->totalscrapDescription("G");?></td>
  </tr>
</table>