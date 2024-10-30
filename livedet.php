<? 
error_reporting(0); 
if ($_REQUEST['cmd']=="update") {
    ob_start();
	include("livedat.php");
    $page = ob_get_clean();
    echo $page;
    exit;
}
include_once "styles.php";
$plugin_url = plugins_url();
$_REQUEST['url']=$plugin_url;
?>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script language="javascript">
function update_live() {
	$.ajax({
	type: 'POST',
	url: '<?=$plugin_url?>/live-score/livedet.php',
	data: 'cmd=update&url=<?=$plugin_url?>',
	success: function(result) {
			$('#live_score_table').html(result);
		}
	});	
	return false;
	
}
setInterval("update_live()",60000);	
</script>

<div id="live_score_plog" align=center>
<div id="live_score_table">
<? include("livedat.php"); ?>
</div>

</div>