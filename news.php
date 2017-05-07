<?
include_once 'admin_panel/scripts/conf.php';
include_once 'admin_panel/scripts/logreader.php';
include_once 'admin_panel/scripts/getrow.php';
$result=mysqli_query($link, "SELECT * FROM `News` ORDER BY id DESC") or die(mysqli_error($link));
?>
<html lang="hy">
<head>
<!--SPOILER SCRIPT-->

<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
 $('.spoiler_links').click(function(){
  if($(this).next('div').is(':hidden')) 
  {
    $("div[class^='spoiler_body']").hide('normal');
  }
  $(this).parent().children('div.spoiler_body').toggle('normal');
  return false;
 });
});
</script>
      <title><?=$name?> գրադարան | Նորույթներ</title>

<? require_once 'blocks/head.html' ?>

<!-- Additional styles -->
<link href="css/Spoiler.css" rel="stylesheet">
<!-- ~~~~~~~~~~~~~~~~~ -->

</head>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<body>

<? require_once ('blocks/header.php') ?>
<? require_once ('blocks/Top-Nav.php') ?>

<!--СОДЕРЖАНИЕ ~~~~Описание-->
<div class="Y-Back">

<noindex><h1><i class="Y-Glux">Նորույթներ</i></h1></noindex>
<p class="Text"><i>&nbsp;&nbsp;Այստեղ դուք կարող եք ծանոթանալ առաջիկայում սպասվող կամ արդեն ավելացված հավելումներին։</i></p><hr>

<!--~~~~~~~СОДЕРДАНИЕ~~~~~~Главная часть-->

<?
	mysqli_close($link);
    while ($row=getrow()):
      $full=True;
	    echo '<div style="padding-left: 20px"> <a class="spoiler_links">'.$row['title'].'</a>';
	    echo  '<div class="spoiler_body">'.$row['description'].'</div></div>';
	  endwhile;
  if(!$full) echo '<p style="text-align: center; font-size: 20px; color: #44D5EB">There are no news to show</p>';
?>

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<div><hr> <?require_once ('blocks/footer.php') ?> <!--FOOTER PART-->   </div> </div>

</body>
</html>