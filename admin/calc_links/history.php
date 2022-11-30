<?php
require_once(__DIR__.'/../check_IP_from_white_list.php');
session_start();
require(__DIR__."/../check_for_verif.php");
include(__DIR__."/../../DBConnClass.php");

try 
    {
        $id_of_link=$_REQUEST['val'];
        $stmt = DBConnClass::run()->prepare("SELECT time_4, param_4, IP_4  FROM personal_links WHERE id_refer = :id_of_link;");
        $stmt->bindParam(":id_of_link", $id_of_link, PDO::PARAM_INT);
        $stmt->execute();
        while($result = $stmt->fetchAll(\PDO::FETCH_ASSOC)){ ?>
              <div class="table-responsive">
<table class="zebra" style="width: auto; margin-right: auto; margin-left: auto; height: 171px;" border="1">
<tbody>
<tr>
<td><strong>Время</strong></td>
<td><strong>Параметры</strong></td>
<td><strong>IP</strong></td>
</tr>
 <?php foreach($result as $key=>$element) { ?>
<tr>
    <td><?php print $element['time_4'];?></td>
    <td><?php print $element['param_4'];?></td>
    <td><?php print $element['IP_4'];?></td>
</tr>
<?php } ?>
</tbody>
</table>
       <?php
         }} catch (PDOException $e) {
             die("Не получилось подсоединиться к базе данных:" . $e);
         }
