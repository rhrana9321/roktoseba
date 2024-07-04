<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $baseinformation->title; ?></title>
		<!-- Favicon Icon -->
		<link rel="shortcut icon" href="<?php echo base_url("frontend/css/favicon.ico"); ?>" type="image/x-icon">
        <link rel="icon" href="<?php echo base_url("frontend/css/favicon.ico"); ?>" type="image/x-icon">
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url("resource/css/bootstrap.min.css"); ?>" />
		<link rel="stylesheet" href="<?php echo base_url("resource/font-awesome/4.2.0/css/font-awesome.min.css"); ?>" />
		<!-- fonts -->
		<link rel="stylesheet" href="<?php echo base_url("resource/fonts/fonts.googleapis.com.css"); ?>" />
		<link rel="stylesheet" href="<?php echo base_url("resource/css/datepicker.css"); ?>" />
        <link rel="stylesheet" href="<?php echo base_url("resource/css/datepicker.min.css"); ?>" />
        <link rel="stylesheet" href="<?php echo base_url("resource/css/custom.css"); ?>" />
		<!-- ace styles -->
		
		
		
		<link rel="stylesheet" href="<?php echo base_url("resource/css/ace.min.css"); ?>" class="ace-main-stylesheet" id="main-ace-style" />
		<script src="<?php echo base_url("resource/js/jquery.2.1.1.min.js"); ?>"></script>
		<script src="<?php echo base_url("resource/js/ace-extra.min.js"); ?>"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
		<script src="<?php echo base_url('resource/jscripts/tiny_mce/tiny_mce.js'); ?>"></script>
		<script language="javascript" type="text/javascript">
		tinyMCE.init({
			mode : "exact",
			elements : "ajaxfilemanager",
			//full url
			relative_urls : "false",
		    remove_script_host : false,
            convert_urls : false,
			//end full url,
			theme : "advanced",
			setup : function(ed) {
			      ed.onKeyUp.add(function(ed, l) {
			         tinyMCE.triggerSave();	                    
			      });
			},
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
			theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",

			theme_advanced_buttons1_add_before : "newdocument,separator",
			theme_advanced_buttons1_add : "fontselect,fontsizeselect",
			theme_advanced_buttons2_add : "separator,forecolor,backcolor,liststyle",
			theme_advanced_buttons2_add_before: "cut,copy,separator,",
			theme_advanced_buttons3_add_before : "",
			theme_advanced_buttons3_add : "media",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			extended_valid_elements : "hr[class|width|size|noshade]",
			file_browser_callback : "ajaxfilemanager",
			paste_use_dialog : false,
			theme_advanced_resizing : true,
			theme_advanced_resize_horizontal : true,
			apply_source_formatting : true,
			force_br_newlines : true,
			force_p_newlines : false,	
			relative_urls : true
		});

		function ajaxfilemanager(field_name, url, type, win) {
			var ajaxfilemanagerurl = SAWEB.getBaseAction("resource/jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php");
			switch (type) {
				case "image":
					break;
				case "media":
					break;
				case "flash": 
					break;
				case "file":
					break;
				default:
					return false;
			}
            tinyMCE.activeEditor.windowManager.open({
                url: SAWEB.getBaseAction("resource/jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php"),
                width: 700,
                height: 440,
                inline : "yes",
                close_previous : "no"
            },{
                window : win,
                input : field_name
            });
            
		}
	

</script>
		<script language="javascript" type="text/javascript">
		tinyMCE.init({
			mode : "exact",
			elements : "ajaxfilemanager1",
			//full url
			relative_urls : "false",
		    remove_script_host : false,
            convert_urls : false,
			//end full url,
			theme : "advanced",
			setup : function(ed) {
			      ed.onKeyUp.add(function(ed, l) {
			         tinyMCE.triggerSave();	                    
			      });
			},
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
			theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",

			theme_advanced_buttons1_add_before : "newdocument,separator",
			theme_advanced_buttons1_add : "fontselect,fontsizeselect",
			theme_advanced_buttons2_add : "separator,forecolor,backcolor,liststyle",
			theme_advanced_buttons2_add_before: "cut,copy,separator,",
			theme_advanced_buttons3_add_before : "",
			theme_advanced_buttons3_add : "media",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			extended_valid_elements : "hr[class|width|size|noshade]",
			file_browser_callback : "ajaxfilemanager",
			paste_use_dialog : false,
			theme_advanced_resizing : true,
			theme_advanced_resize_horizontal : true,
			apply_source_formatting : true,
			force_br_newlines : true,
			force_p_newlines : false,	
			relative_urls : true
		});

		function ajaxfilemanager(field_name, url, type, win) {
			var ajaxfilemanagerurl = SAWEB.getBaseAction("resource/jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php");
			switch (type) {
				case "image":
					break;
				case "media":
					break;
				case "flash": 
					break;
				case "file":
					break;
				default:
					return false;
			}
            tinyMCE.activeEditor.windowManager.open({
                url: SAWEB.getBaseAction("resource/jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php"),
                width: 700,
                height: 440,
                inline : "yes",
                close_previous : "no"
            },{
                window : win,
                input : field_name
            });
            
		}
	

</script>
		<script language="javascript" type="text/javascript">
		tinyMCE.init({
			mode : "exact",
			elements : "ajaxfilemanager2",
			//full url
			relative_urls : "false",
		    remove_script_host : false,
            convert_urls : false,
			//end full url,
			theme : "advanced",
			setup : function(ed) {
			      ed.onKeyUp.add(function(ed, l) {
			         tinyMCE.triggerSave();	                    
			      });
			},
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
			theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",

			theme_advanced_buttons1_add_before : "newdocument,separator",
			theme_advanced_buttons1_add : "fontselect,fontsizeselect",
			theme_advanced_buttons2_add : "separator,forecolor,backcolor,liststyle",
			theme_advanced_buttons2_add_before: "cut,copy,separator,",
			theme_advanced_buttons3_add_before : "",
			theme_advanced_buttons3_add : "media",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			extended_valid_elements : "hr[class|width|size|noshade]",
			file_browser_callback : "ajaxfilemanager",
			paste_use_dialog : false,
			theme_advanced_resizing : true,
			theme_advanced_resize_horizontal : true,
			apply_source_formatting : true,
			force_br_newlines : true,
			force_p_newlines : false,	
			relative_urls : true
		});

		function ajaxfilemanager(field_name, url, type, win) {
			var ajaxfilemanagerurl = SAWEB.getBaseAction("resource/jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php");
			switch (type) {
				case "image":
					break;
				case "media":
					break;
				case "flash": 
					break;
				case "file":
					break;
				default:
					return false;
			}
            tinyMCE.activeEditor.windowManager.open({
                url: SAWEB.getBaseAction("resource/jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php"),
                width: 700,
                height: 440,
                inline : "yes",
                close_previous : "no"
            },{
                window : win,
                input : field_name
            });
            
		}
	

</script>
	</head>
<?php
	$auid  	 			  = $this->session->userdata('websiteloginid');
	$adminuserinfo	= $this->M_cloud->find('website_adminlogin', array('webadId' => $auid));
?>
	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default" style="background:#515151;">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container" style="background:#515151;">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left" style="background:#515151;">
					<a href="<?php echo site_url("websiteloginControler/dashboard"); ?>" class="navbar-brand">
						<small>
				<img class="nav-user-photo" src="<?php echo base_url("uploads/".$baseinformation->proimage); ?>" alt="<?php echo $baseinformation->companyName; ?>" style="max-height:30px;"/> 
							
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						

						<li class="light-blue" style="background:#515151;">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle" style="background:#515151;">
								<!--<img class="nav-user-photo" src="<?php echo base_url("uploads/".$baseinformation->proimage); ?>" alt="Company Logo" />-->
								
								<span class="user-info">
								
									<small>Welcome,
									<?php echo $adminuserinfo->username; ?></small>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="<?php echo site_url("websiteloginControler/Admin_profileUpdate"); ?>"><i class="ace-icon fa fa-user"></i>Profile Update</a>
								</li>

								<li class="divider"></li>

								<li><a href="<?php echo site_url("websitelogin/logout"); ?>"><i class="ace-icon fa fa-power-off"></i>লগ-আউট </a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>
		
		

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>
				

				<?php  $filename = $this->uri->uri_string(); ?>
				
				
				
				
				<ul class="nav nav-list">
				    <?php 
    				    $auid  	 			  = $this->session->userdata('websiteloginid');
    		            $adminuserinfo	= $this->M_cloud->find('website_adminlogin', array('webadId' => $auid));
				    ?>
				    
					<li class="<?php if($filename == 'websiteloginControler/dashboard'){echo 'active'; }?>">
							<a href="<?php echo base_url("websiteloginControler/dashboard"); ?>">
								<i class="menu-icon fa fa-tachometer"></i>
								<span class="menu-text"> ড্যাশবোর্ড </span>
							</a>
							<b class="arrow"></b>
						</li>
						
						
						
					<?php if($adminuserinfo->Basic==1){ ?>	
					<li class="<?php if($filename == 'websiteloginControler/webbasic_manage'){echo 'active'; }?>">
							<a href="<?php echo site_url("websiteloginControler/webbasic_manage"); ?>">
								<i class="menu-icon fa fa-home"></i>
								<span class="menu-text">সেটিংস</span>
							</a>
					</li>
					<?php } ?>
					
					
					<?php if($adminuserinfo->Slider==1){ ?>		
					<li class="<?php if($filename == 'websiteloginControler/slider_manage'){echo 'active'; }?>">
							<a href="<?php echo site_url("websiteloginControler/slider_manage"); ?>">
								<i class="menu-icon fa fa-desktop"></i>
								<span class="menu-text">সহযোগী সংগঠন</span>
							</a>
					</li>
					<?php } ?>
					<?php if($adminuserinfo->How_to_order==1){ ?>	
					<li class="<?php if($filename == 'websiteloginControler/Webproduct_manage'){echo 'active'; }?>">
							<a href="<?php echo site_url("websiteloginControler/Webproduct_manage"); ?>">
								<i class="menu-icon fa fa-laptop"></i>
								<span class="menu-text">সংগঠন সদস্যগণ</span>
							</a>
					</li>
					<?php } ?>
					
					
					
					
					
					
					<?php if($adminuserinfo->Register==1){ ?>
					<li class="<?php if($filename == 'websiteloginControler/Registation_View'){echo 'active'; }?>">
							<a href="<?php echo site_url("websiteloginControler/Registation_View"); ?>">
								<i class="menu-icon fa fa-users"></i>
								<span class="menu-text">ডোনার লিস্ট </span>
							</a>
					</li>
					<?php } ?>
					
					
					
					<li class="<?php if($filename == 'websiteloginControler/Blog_category'){echo 'active'; }?>">
							<a href="<?php echo site_url("websiteloginControler/Blog_category"); ?>">
								<i class="menu-icon fa fa-users"></i>
								<span class="menu-text">ব্লগ ক্যাটাগরি </span>
							</a>
					</li>
					
					
					<li class="<?php if($filename == 'websiteloginControler/Blog'){echo 'active'; }?>">
							<a href="<?php echo site_url("websiteloginControler/Blog"); ?>">
								<i class="menu-icon fa fa-users"></i>
								<span class="menu-text">ব্লগ </span>
							</a>
					</li>
					
					
					
					
					
					

					<li class="<?php if($filename == 'websiteloginControler/Joma'){echo 'active'; }?>">
							<a href="<?php echo site_url("websiteloginControler/Joma"); ?>">
								<i class="menu-icon fa fa-users"></i>
								<span class="menu-text">জমা</span>
							</a>
					</li>
					
					<li class="<?php if($filename == 'websiteloginControler/Khoroc'){echo 'active'; }?>">
							<a href="<?php echo site_url("websiteloginControler/Khoroc"); ?>">
								<i class="menu-icon fa fa-users"></i>
								<span class="menu-text">খরচ </span>
							</a>
					</li>
					
					<li class="<?php if($filename == 'websiteloginControler/Report'){echo 'active'; }?>">
							<a href="<?php echo site_url("websiteloginControler/Report"); ?>">
								<i class="menu-icon fa fa-users"></i>
								<span class="menu-text">রিপোর্ট  </span>
							</a>
					</li>
					

					
					
					
					<?php if($adminuserinfo->Content==1){ ?>
					<!--<li class="<?php //if($filename == 'websiteloginControler/WebContent_manage'){echo 'active'; }?>">
							<a href="<?php //echo site_url("websiteloginControler/WebContent_manage"); ?>">
								<i class="menu-icon fa fa-file-text"></i>
								<span class="menu-text">Content  Manage</span>
							</a>
					</li>-->
					<?php } ?>
					
					
					
					
					
					
					<li class="">
							<a href="<?php echo site_url('websitelogin/logout'); ?>">
								<i class="menu-icon fa fa-sign-out"></i>
								<span class="menu-text">লগ-আউট  </span>
							</a>
						</li>
				</ul>

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

			

	