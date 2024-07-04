var SAWEB = {
	baseUrl: function(){
		return '<?php echo base_url(); ?>';
	},
	siteUrl: function(){
		return '<?php echo site_url(); ?>';
	},
	getBaseAction: function(action){
		return '<?php echo base_url(); ?>' + action;
	},
	getSiteAction: function(action){
		return '<?php echo site_url(); ?>' + action;
	},
	propup: function(action, height, width){
		var url 	= SAWEB.getSiteAction(action),
		properties 	= 'height = '+height + ', width = ' + width + ', toolbar = No, scrollbars = true';
		window.open(url, '_blank', properties);
		return false;
	}
}