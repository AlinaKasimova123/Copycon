<?php
session_start();
//ini_set('display_errors', 1);
include("pricesFromDB.php");
include(__DIR__."/../event.php");
$event = new EventPrices();
$event2 = new Event();
$eventPrices = $event->getPrices();
$eventCalc = $event2->getCalc();
include(__DIR__."/../templates/header.php");
?>
	
<div class="wrapper clearfix">

<div id="main" class="grid-block">

<div id="maininner" class="grid-box">



<section id="content" class="grid-block">


<div id="system">


<article class="item">




<div class="content clearfix">

<p style="text-align: center;"><strong style="font-size: 23px;">Рассчитать примерную стоимость услуги:</strong></p>
<div><script type="text/javascript">function qfCh() {return "1d24bd95b7459dc27def18270de75afc4";}</script><div class="qfblock"><form action="index.php" method="post"><script>
//8ч/5д
function calcCost()
{
let cost = 0;
if(document.getElementById("typeProgramm").value == "Эконом")
{
    if(parseInt(document.getElementById("pcCount").value) < 1)
    {
        document.getElementById("pcCount").value = 0;
    }
    <?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
    <?php foreach($eventPrices as $key=>$element) {
        if($element["id"] == 1) {?>
            else if(parseInt(document.getElementById("pcCount").value) <?php print $element["step"];?>)
            {
                cost += <?php print $element["value"];?> * document.getElementById("pcCount").value;
                <?php }} } ?>
            }
    <?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
    <?php foreach($eventPrices as $key=>$element) {
        if($element["id"] == 2) {?>
            else if(parseInt(document.getElementById("pcCount").value) >9 && parseInt(document.getElementById("pcCount").value) <?php print $element["step"];?>)
            {
                cost += <?php print $element["value"];?> * document.getElementById("pcCount").value;
                <?php }} } ?>
            }
    <?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
    <?php foreach($eventPrices as $key=>$element) {
        if($element["id"] == 3) {?>
            else if(parseInt(document.getElementById("pcCount").value) > 19 && parseInt(document.getElementById("pcCount").value) <?php print $element["step"];?>)
            {
                cost += <?php print $element["value"];?> * document.getElementById("pcCount").value;
                <?php }} } ?>
            }
    <?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
    <?php foreach($eventPrices as $key=>$element) {
        if($element["id"] == 4) {?>
            else if(parseInt(document.getElementById("pcCount").value) > 29 && parseInt(document.getElementById("pcCount").value) <?php print $element["step"];?>)
            {
                cost += <?php print $element["value"];?> * document.getElementById("pcCount").value;
                <?php }} } ?>
            }
    <?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
    <?php foreach($eventPrices as $key=>$element) {
        if($element["id"] == 5) {?>
            else if(parseInt(document.getElementById("pcCount").value) > 39 && parseInt(document.getElementById("pcCount").value) <?php print $element["step"];?>)
            {
                cost += <?php print $element["value"];?> * document.getElementById("pcCount").value;
                <?php }} } ?>
            }
    else
    {
        <?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
                <?php foreach($eventPrices as $key=>$element) {
                    if($element["id"] == 6) {?>
    cost += <?php print $element["value"];?> * document.getElementById("pcCount").value;
        <?php }} } ?>
    }

if(document.getElementById("serverCount").value)
{

if(parseInt(document.getElementById("serverCount").value) < 1)
{
    document.getElementById("serverCount").value = 0;
}
<?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
<?php foreach($eventPrices as $key=>$element) {
    if($element["id"] == 7) {?>
        else if(parseInt(document.getElementById("serverCount").value) <?php print $element["step"];?>)
        {
            cost += <?php print $element["value"];?> * document.getElementById("serverCount").value;
            <?php }} } ?>
        }
<?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
<?php foreach($eventPrices as $key=>$element) {
    if($element["id"] == 8) {?>
        else if(parseInt(document.getElementById("serverCount").value) > 5 && parseInt(document.getElementById("serverCount").value) <?php print $element["step"];?>)
        {
            cost += <?php print $element["value"];?> * document.getElementById("serverCount").value;
            <?php }} } ?>
        }
else
{
    <?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
            <?php foreach($eventPrices as $key=>$element) {
                if($element["id"] == 9) {?>
                    cost += <?php print $element["value"];?> * document.getElementById("serverCount").value;
    <?php }} } ?>
}
}
}

else
{
if(parseInt(document.getElementById("pcCount").value) < 1)
{
document.getElementById("pcCount").value = 0;

}
<?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
<?php foreach($eventPrices as $key=>$element) {
    if($element["id"] == 16) {?>
        else if(parseInt(document.getElementById("pcCount").value) <?php print $element["step"];?>)
        {
            cost += <?php print $element["value"];?> * document.getElementById("pcCount").value;
            <?php }} } ?>
        }
<?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
<?php foreach($eventPrices as $key=>$element) {
    if($element["id"] == 17) {?>
        else if(parseInt(document.getElementById("pcCount").value) >9 && parseInt(document.getElementById("pcCount").value) <?php print $element["step"];?>)
        {
            cost += <?php print $element["value"];?> * document.getElementById("pcCount").value;
            <?php }} } ?>
        }
<?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
<?php foreach($eventPrices as $key=>$element) {
    if($element["id"] == 18) {?>
        else if(parseInt(document.getElementById("pcCount").value) > 19 && parseInt(document.getElementById("pcCount").value) <?php print $element["step"];?>)
        {
            cost += <?php print $element["value"];?> * document.getElementById("pcCount").value;
            <?php }} } ?>
        }
<?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
<?php foreach($eventPrices as $key=>$element) {
    if($element["id"] == 19) {?>
        else if(parseInt(document.getElementById("pcCount").value) > 29 && parseInt(document.getElementById("pcCount").value) <?php print $element["step"];?>)
        {
            cost += <?php print $element["value"];?> * document.getElementById("pcCount").value;
            <?php }} } ?>
        }
else
    <?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
    <?php foreach($eventPrices as $key=>$element) {
        if($element["id"] == 20) {?>
            if(parseInt(document.getElementById("pcCount").value) > 39 && parseInt(document.getElementById("pcCount").value) <?php print $element["step"];?>)
            {
                cost += <?php print $element["value"];?> * document.getElementById("pcCount").value;
                <?php }} } ?>
            }
            else
            {
                <?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
                        <?php foreach($eventPrices as $key=>$element) {
                            if($element["id"] == 21) {?>
            cost += <?php print $element["value"];?> * document.getElementById("pcCount").value;
                <?php }} } ?>
            }


if (document.getElementById("serverCount").value)
{

if(parseInt(document.getElementById("serverCount").value) < 1)
{
document.getElementById("serverCount").value = 0;

}
<?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
<?php foreach($eventPrices as $key=>$element) {
    if($element["id"] == 22) {?>
        else if(parseInt(document.getElementById("serverCount").value) <?php print $element["step"];?>)
        {
            cost += <?php print $element["value"];?> * document.getElementById("serverCount").value;
            <?php }} } ?>
        }
<?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
<?php foreach($eventPrices as $key=>$element) {
    if($element["id"] == 23) {?>
        else if(parseInt(document.getElementById("serverCount").value) > 5 && parseInt(document.getElementById("serverCount").value) <?php print $element["step"];?>)
        {
            cost += <?php print $element["value"];?> * document.getElementById("serverCount").value;
            <?php }} } ?>
        }
        else
        {
            <?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
            <?php foreach($eventPrices as $key=>$element) {
            if($element["id"] == 24) {?>
        cost += <?php print $element["value"];?> * document.getElementById("serverCount").value;
        <?php }} } ?>
        }
}
}

//12ч/7д
if(document.getElementById("workTime").value == "12 часов 7 дней в неделю")
{ cost= 0;
    if(document.getElementById("typeProgramm").value == "Безлимитный")
    {
        if(parseInt(document.getElementById("pcCount").value) < 1)
        {
            document.getElementById("pcCount").value = 0;
        }
        <?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
        <?php foreach($eventPrices as $key=>$element) {
            if($element["id"] == 25) {?>
                else if(parseInt(document.getElementById("pcCount").value) <?php print $element["step"];?>)
                {
                    cost += <?php print $element["value"];?> * document.getElementById("pcCount").value;
                    <?php }} } ?>
                }
        <?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
        <?php foreach($eventPrices as $key=>$element) {
            if($element["id"] == 26) {?>
                else if(parseInt(document.getElementById("pcCount").value) >9 && parseInt(document.getElementById("pcCount").value) <?php print $element["step"];?>)
                {
                cost += <?php print $element["value"];?> * document.getElementById("pcCount").value;
                    <?php }} } ?>
                }

        <?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
        <?php foreach($eventPrices as $key=>$element) {
            if($element["id"] == 27) {?>
                else if(parseInt(document.getElementById("pcCount").value) > 19 && parseInt(document.getElementById("pcCount").value) <?php print $element["step"];?>)
                {
                cost += <?php print $element["value"];?> * document.getElementById("pcCount").value;
                    <?php }} } ?>
                }
        <?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
        <?php foreach($eventPrices as $key=>$element) {
            if($element["id"] == 28) {?>
                else if(parseInt(document.getElementById("pcCount").value) > 29 && parseInt(document.getElementById("pcCount").value) <?php print $element["step"];?>)
                {
                cost += <?php print $element["value"];?> * document.getElementById("pcCount").value;
                    <?php }} } ?>
                }

        <?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
        <?php foreach($eventPrices as $key=>$element) {
            if($element["id"] == 29) {?>
                else if(parseInt(document.getElementById("pcCount").value) > 39 && parseInt(document.getElementById("pcCount").value) <?php print $element["step"];?>)
                {
                cost += <?php print $element["value"];?> * document.getElementById("pcCount").value;
                    <?php }} } ?>
                }
        else
        {
            <?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
            <?php foreach($eventPrices as $key=>$element) {
            if($element["id"] == 30) {?>
        cost += <?php print $element["value"];?> * document.getElementById("pcCount").value;
            <?php }} } ?>
        }

if(document.getElementById("serverCount").value)
{
    if(parseInt(document.getElementById("serverCount").value) < 1)
    {
        document.getElementById("serverCount").value = 0;
    }

    <?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
    <?php foreach($eventPrices as $key=>$element) {
        if($element["id"] == 31) {?>
            else if(parseInt(document.getElementById("serverCount").value) <?php print $element["step"];?>)
            {
                cost += <?php print $element["value"];?> * document.getElementById("serverCount").value;
                <?php }} } ?>
            }
    <?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
    <?php foreach($eventPrices as $key=>$element) {
        if($element["id"] == 32) {?>
            else if(parseInt(document.getElementById("serverCount").value) > 5 && parseInt(document.getElementById("serverCount").value) <?php print $element["step"];?>)
            {
            cost += <?php print $element["value"];?> * document.getElementById("serverCount").value;
                <?php }} } ?>
            }
    else
    {
        <?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
        <?php foreach($eventPrices as $key=>$element) {
        if($element["id"] == 33) {?>
        cost += <?php print $element["value"];?> * document.getElementById("serverCount").value;
        <?php }} } ?>
    }}
    }
else
{
    if(parseInt(document.getElementById("pcCount").value) < 1)
    {
        document.getElementById("pcCount").value = 0;
    }

    <?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
    <?php foreach($eventPrices as $key=>$element) {
        if($element["id"] == 34) {?>
            else if(parseInt(document.getElementById("pcCount").value) <?php print $element["step"];?>)
            {
            cost += <?php print $element["value"];?> * document.getElementById("pcCount").value;
                <?php }} } ?>
            }

    <?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
    <?php foreach($eventPrices as $key=>$element) {
        if($element["id"] == 35) {?>
            else if(parseInt(document.getElementById("pcCount").value) >9 && parseInt(document.getElementById("pcCount").value) <?php print $element["step"];?>)
            {
            cost += <?php print $element["value"];?> * document.getElementById("pcCount").value;
                <?php }} } ?>
            }

    <?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
    <?php foreach($eventPrices as $key=>$element) {
        if($element["id"] == 36) {?>
            else if(parseInt(document.getElementById("pcCount").value) > 19 && parseInt(document.getElementById("pcCount").value) <?php print $element["step"];?>)
            {
            cost += <?php print $element["value"];?> * document.getElementById("pcCount").value;
                <?php }} } ?>
            }

    <?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
    <?php foreach($eventPrices as $key=>$element) {
        if($element["id"] == 37) {?>
            else if(parseInt(document.getElementById("pcCount").value) > 29 && parseInt(document.getElementById("pcCount").value) <?php print $element["step"];?>)
            {
            cost += <?php print $element["value"];?> * document.getElementById("pcCount").value;
                <?php }} } ?>
            }

    <?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
    <?php foreach($eventPrices as $key=>$element) {
        if($element["id"] == 38) {?>
            else if(parseInt(document.getElementById("pcCount").value) > 39 && parseInt(document.getElementById("pcCount").value) <?php print $element["step"];?>)
            {
            cost += <?php print $element["value"];?> * document.getElementById("pcCount").value;
                <?php }} } ?>
            }
            else
            {
                <?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
                <?php foreach($eventPrices as $key=>$element) {
                if($element["id"] == 39) {?>
            cost += <?php print $element["value"];?> * document.getElementById("pcCount").value;
                <?php }} } ?>
            }


    if (document.getElementById("serverCount").value)
    {
        if(parseInt(document.getElementById("serverCount").value) < 1)
        {
            document.getElementById("serverCount").value = 0;
        }
        <?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
        <?php foreach($eventPrices as $key=>$element) {
            if($element["id"] == 40) {?>
        else if(parseInt(document.getElementById("serverCount").value) <?php print $element["step"];?>)
        {
            cost += <?php print $element["value"];?> * document.getElementById("serverCount").value;
            <?php }} } ?>
        }

        <?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
        <?php foreach($eventPrices as $key=>$element) {
            if($element["id"] == 41) {?>
                else if(parseInt(document.getElementById("serverCount").value) > 5 && parseInt(document.getElementById("serverCount").value) <?php print $element["step"];?>)
                {
                cost += <?php print $element["value"];?> * document.getElementById("serverCount").value;
                    <?php }} } ?>
                }
            else
            {
                <?php if(!empty($eventPrices) && count($eventPrices)>0) { ?>
                <?php foreach($eventPrices as $key=>$element) {
                if($element["id"] == 42) {?>
            cost += <?php print $element["value"];?> * document.getElementById("serverCount").value;
                <?php }} } ?>
            }
    }
    }}


document.getElementById("costDiv").innerHTML = "Цена: " + String(cost) + " руб.";
let price = "Цена: " + String(cost) + " руб.";
}
</script>


<form name="calcForm">
<input type="hidden" name="formID" value="31131332674344" />
<div class="form-all" style="width: auto;">
<div style="text-align: center; ">
<ul class="form-section" style="display:inline-block; vertical-align: top;">
<li class="form-line" id="id_8">
<label id="label_8" for="input_8"> Кол-во компьютеров </label><br>
<div id="cid_8" class="form-input"> 
<input onChange="calcCost()" type="number" id="pcCount" name="q8_input8" data-type="input-spinner" onkeyup="this.value = this.value.replace (/\D/, '')" class="form-spinner-input form-textbox" />
</div>
</li>
<li class="form-line" id="id_8">
<label id="label_8" for="input_8"> Кол-во серверов </label><br>
<div id="cid_8" class="form-input">
<input onChange="calcCost()" type="number" id="serverCount" name="q8_input8" data-type="input-spinner" onkeyup="this.value = this.value.replace (/\D/, '')" class="form-spinner-input form-textbox" />
</div> 
</li>
</ul>
<ul class="form-section2" style="display:inline-block; vertical-align: top;">
<li class="form-line" id="id_5">
<label id="label_5" for="input_5">Варианты обслуживания</label><br>
<div id="cid_5" class="form-input"> 
<select onChange="calcCost()" class="form-dropdown" id="workTime" name="q5_input5">
<option selected="selected" value="8 часов 5 дней в неделю"> 8 часов 5 дней в неделю </option>
<option value="12 часов 7 дней в неделю"> 12 часов 7 дней в неделю </option>
</select>
</div> 
</li>
<li class="form-line" id="id_6">
<label id="label_6" for="input_6">Тарифы</label><br>
<div id="cid_6" class="form-input">
<select onChange="calcCost()" class="form-dropdown" id="typeProgramm" name="q6_input6">
<option selected="selected" value="Эконом"> Эконом </option>
<option value="Безлимитный"> Безлимитный </option>
</select>
</div> 
</li>
</ul>
</div>
<!-- <div id="costDiv">
Цена:
</div> -->
</div>
</form></div></div>
<div>
    </div>
    </div>
  <center><button type="submit" name="info_calculate" class="btn btn_calc" onclick="loadParam()">Рассчитать</button></center>
  <div id="costDiv" style="color: #ededed">
Цена:
</div>
<br>
    <?php if(!empty($eventCalc) && count($eventCalc)>0) {
             foreach($eventCalc as $key=>$element) {
                 echo $element["main"];}} ?>
    
</div> </div>
</article>
</div></section>
</div>
<?php include(__DIR__."/../templates/footer.php"); ?>