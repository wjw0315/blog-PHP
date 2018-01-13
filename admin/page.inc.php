<nav aria-label="Page navigation">
  <ul class="pagination">
<?php $hreftp1='<li><a href="blog.php?page=%d">%s</a></li>'; 
      for ($i=1; $i<=$maxpage ; $i++) { 
       echo  sprintf($hreftp1,$i,"第{$i}页");
      }
?>
  </ul>
</nav>