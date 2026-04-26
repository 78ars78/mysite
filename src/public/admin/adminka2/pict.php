<div style="margin:15px; position:relative;  float:left">
<img style="margin:0px; position:relative;  float:left" name="mainpic" src="img/evo/1.jpg" width=470 border=0>

<br>

<script> let dd,dd1,dd2;
   </script>   

<?
Class Mainpic { public $pic1,$pic2,$left_pic1,$dd,$dd1,$dd2,$dd3,$dd4,$id,$name;
     public function pic_auto() {
   ?>
<a href="#" onMouseOver="document.mainpic.src = 'img/evo/<? echo $this->pic1; ?>.jpg';
<? echo $this->dd,$this->dd1,$this->dd2,$this->dd3,$this->dd4; ?>  ">  
<img style="margin:0px; position:absolute; top: 0px; left:<? echo $this->left_pic1; ?>px; width:94px; height: 235px; " src="empty.gif"  border=0>   <img  style="border-top:2px solid white; position:relative; top: 0px; left:0px; float:right; width: 94px;" name="<? echo $this->id; ?>" id="<? echo $this->name; ?>" src="img/evo/<? echo $this->pic2; ?>.jpg" ></a>

<?
}
}



$pict1=new Mainpic();
$pict1->dd="dd=document.getElementById('mainpi'); dd.style['border-top']='2px solid red';";
$pict1->dd1="if(dd1) dd1.style['border-top']='2px solid white';";
$pict1->dd2="if(dd2) dd2.style['border-top']='2px solid white';";
$pict1->dd3="if(dd3) dd3.style['border-top']='2px solid white';";
$pict1->dd4="if(dd4) dd4.style['border-top']='2px solid white';";
$pict1->pic1=5;
$pict1->pic2=50;
$pict1->left_pic1=376;
$pict1->id='mainpi';
$pict1->name='mainpi';
$pict1->pic_auto();

$pict2=new Mainpic();
$pict2->dd="if(dd) dd.style['border-top']='2px solid white';";
$pict2->dd1="dd1=document.getElementById('mainpi1'); dd1.style['border-top']='2px solid red';";
$pict2->dd2="if(dd2) dd2.style['border-top']='2px solid white';";
$pict2->dd3="if(dd3) dd3.style['border-top']='2px solid white';";
$pict2->dd4="if(dd4) dd4.style['border-top']='2px solid white';";
$pict2->pic1=4;
$pict2->pic2=40;
$pict2->left_pic1=282;
$pict2->id='mainpi1';
$pict2->name='mainpi1';
$pict2->pic_auto();

$pict3=new Mainpic();
$pict3->dd="if(dd) dd.style['border-top']='2px solid white';";
$pict3->dd1="if(dd1) dd1.style['border-top']='2px solid white';";
$pict3->dd2="dd2=document.getElementById('mainpi2'); dd2.style['border-top']='2px solid red';";
$pict3->dd3="if(dd3) dd3.style['border-top']='2px solid white';";
$pict3->dd4="if(dd4) dd4.style['border-top']='2px solid white';";
$pict3->pic1=3;
$pict3->pic2=30;
$pict3->left_pic1=188;
$pict3->id='mainpi2';
$pict3->name='mainpi2';
$pict3->pic_auto();

$pict4=new Mainpic();
$pict4->dd="if(dd) dd.style['border-top']='2px solid white';";
$pict4->dd1="if(dd1) dd1.style['border-top']='2px solid white';";
$pict4->dd2="if(dd2) dd2.style['border-top']='2px solid white';";
$pict4->dd3="dd3=document.getElementById('mainpi3'); dd3.style['border-top']='2px solid red';";
$pict4->dd4="if(dd4) dd4.style['border-top']='2px solid white';";
$pict4->pic1=2;
$pict4->pic2=20;
$pict4->left_pic1=94;
$pict4->id='mainpi3';
$pict4->name='mainpi3';
$pict4->pic_auto();

$pict5=new Mainpic();
$pict5->dd="if(dd) dd.style['border-top']='2px solid white';";
$pict5->dd1="if(dd1) dd1.style['border-top']='2px solid white';";
$pict5->dd2="if(dd2) dd2.style['border-top']='2px solid white';";
$pict5->dd3="if(dd3) dd3.style['border-top']='2px solid white';";
$pict5->dd4="dd4=document.getElementById('mainpi4'); dd4.style['border-top']='2px solid red';";
$pict5->pic1=1;
$pict5->pic2=10;
$pict5->left_pic1=0;
$pict5->id='mainpi4';
$pict5->name='mainpi4';
$pict5->pic_auto();


?>


</div>
