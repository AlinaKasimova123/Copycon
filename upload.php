<?php 
session_start();
require_once __DIR__.DIRECTORY_SEPARATOR."DBConnClass.php";
try
{
    $id_1=$_REQUEST['val'];
    $stmt = DBConnClass::run()->prepare("SELECT description  FROM block_services WHERE id = :id");
    $stmt->bindParam(":id", $id_1, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    $key1 = "";
      foreach($result as $k => $v){
        $key1 = $v;
    }
    echo $key1;
} catch (PDOException $e) {
 die("Не получилось подсоединиться к базе данных: ". $e);
}
?>










































<!-- <!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            table.zebra {
  width: 100%;
}

table {
  display: table;
  border-collapse: separate;
  box-sizing: border-box;
  text-indent: initial;
  border-spacing: 2px;
  max-width: 100%;
  background-color: transparent;
  border-collapse: collapse;
  border-spacing: 0;
  /* border: 1px solid #000; */
  border-color: #333;
  min-width: 500px;
}

td {
  display: table-cell;
  vertical-align: inherit;
}

ul.zebra > li, table.zebra tbody td {
  border: 1px solid #000000;
}


        </style>
    </head>
    <body>
<p>"В сложившихся трудных экономических условиях практически все компании вынуждены проводить оптимизацию предприятия.<br>
    Компания КОПИКОН предлагает как комплексную поддержку ИТ-инфраструктуры так и частичный ИТ-аутсорсинг. <br>
    
    Услугами ИТ-аутсорсинга активно пользуются все уровни предпринимательства: малый, средний и крупный бизнес.<br>
    Связанно это с тем, что компании стремятся получить конкурентное преимущество, сосредоточившись на своём основном виде деятельности, не зацикливаться на аппаратуре и ожиданиях подвохов от нее.
    Поэтому они отдают свой выбор в пользу услуг ИТ-аутсорсинга. Это правильное решение с точки зрения повышения стабильности и надежности работы, а так же финансовой выгоды. <br>
    <b>ИТ-аутсорсинг, штатный сотрудник или студент, что же выбрать?</b>
    <div style="overflow-x:auto;"></div>
    <table class="zebra" width="100%" border="1" align="center">
        <tbody>
        <tr>
        <td align="center" valign="middle"> </td>
        <td align="center" valign="middle"><strong>Компания КОПИКОН</strong></td>
        <td align="center" valign="middle"><strong>Приходящий "студент"</strong></td>
        <td align="center" valign="middle"><strong>Штатный системный<br />администратор</strong></td>
        </tr>
        <tr>
        <td>Время реагирования на заявку</td>
        <td align="center" valign="middle"> до 30 минут</td>
        <td align="center" valign="middle">от 1 часа до нескольких дней, <br />бывает "занят" или может "заболеть"</td>
        <td align="center" valign="middle">от 1 часа до нескольких дней,<br />зависит от текущей загрузки, отпуска и больничного </td>
        </tr>
        <tr>
        <td>Крупный проект или одновременные заявки</td>
        <td align="center" valign="middle"> распределение на несколько<br />сотрудников</td>
        <td align="center" valign="middle">медленно,<br /> не всегда выполнимо </td>
        <td align="center" valign="middle"> медленно,<br /> не всегда выполнимо </td>
        </tr>
        <tr>
        <td>Решение не стандартных сложных вопросов</td>
        <td align="center" valign="middle">применяем знания и опыт <br />всей команды </td>
        <td align="center" valign="middle"> только с привлечением <br />сторонней помощи</td>
        <td align="center" valign="middle">медленно или с привлечением<br />сторонней помощи </td>
        </tr>
        <tr>
        <td>Контроль и отчетность</td>
        <td align="center" valign="middle">регистрация и отчёт по каждой заявке<br />отчёт за месяц</td>
        <td align="center" valign="middle">нет </td>
        <td align="center" valign="middle">нет </td>
        </tr>
        <tr>
        <td>Защита данных</td>
        <td align="center" valign="middle">
        <p>многоуровневая защита от <br />хищения и утери.</p>
        </td>
        <td align="center" valign="middle">нет </td>
        <td align="center" valign="middle">
        <p>необходима разработка планов и<br />постоянный контроль за исполнением</p>
        </td>
        </tr>
        <tr>
        <td>Защита от "аварий"</td>
        <td align="center" valign="middle">плановая профилактика и <br />контроль за состоянием аппаратуры</td>
        <td align="center" valign="middle">нет</td>
        <td align="center" valign="middle">необходима разработка планов и<br />постоянный контроль за исполнением </td>
        </tr>
        </tbody>
        </table>
      </div>
    
    Если Вы заботитесь о сохранности данных, а сбои в работе мешают развиться - выбор очевиден.<br>
    
    Выбирая услугу ИТ-аутсорсинга в компании КОПИКОН, вы будете уверены в надежности своей аппаратуры и выполнении условий договора, а благодаря системе формирования отчетов сможете планировать расходы на поддержку оборудования.<br>
    
    Кроме того,нам не требуется в Вашем офисе площади, и оснащение постоянного рабочего места. За нас не нужно платить налоги и социальные выплаты. А бухгалтерия сможет включать оплату наших услуг в расходы, не переживая за отчетность."</p>
        </body>
    </html> -->