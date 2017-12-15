<?php
include("header.php");

include("$lib_path/view-tabs.php");

?>


<h4>IPLD source view:</h4>


<div id="tab-source">

<!--table formatting for the document -->
<!--<table class="TFtable";>-->
<?php
echo "\"" . str_replace('.', '_', str_replace('/', '_', $dir)) . "\" , \"";

foreach($contents as $n) {
        list($k, $v) = array_pad( explode ("=", $n, 2), 2, null);

if(preg_match('/\[(.+?)\]/', $v, $matches)) {
 
   if(strlen($k) > 0){
     $vlink = "[" . str_replace('.', '_', str_replace('/', '_', $matches[1])) . "]" ;//don't wrap in link for IPLD view
	  echo "$k=$vlink\\n"; 
   }
   else{ 
     $vlink = "=[" . str_replace('.', '_', str_replace('/', '_', $matches[1])) . "]"; //don't wrap in link for IPLD view
     echo "$vlink\\n"; 
   }
}


elseif(isset($v)) { 
	  $vhtml =  htmlspecialchars(json_encode($v));
	  $vhtml = str_replace('\/', '/', $vhtml);
	  $vhtml =  substr($vhtml,6,-6);
	  
	  echo "$k=$vhtml\\n"; 
	}

        else { 
	  echo "<th height='10' style='text-align:right'></th><td width='20'></td><td>$k</td>"; 
	}
        echo "</tr>";
}

echo "\"";

?>
</table>

</div>


</div>




</div></div>

</div>