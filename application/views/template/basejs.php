<script>
	var ARNY = (function(){
		var _baseUrl = "<?php echo base_url(); ?>";
		return{
			"language": "<?php echo $this->config->item('language'); ?>",
			"baseUrl": _baseUrl,
			"uri_segment_1":"<?php if(isset($uri_segment_1)) echo $uri_segment_1; ?>",
			"uri_segment_2":"<?php if(isset($uri_segment_2)) echo $uri_segment_2; ?>"
		}
	})();
</script>
