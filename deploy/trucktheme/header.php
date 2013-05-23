<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<head>
<title><?php bloginfo( 'name' );  wp_title(); ?></title>
<link rel='stylesheet' href='<?php bloginfo('template_url'); ?>/style.css' type='text/css' media='all' />
<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="css/style-ie.css" />
<![endif]-->
	
	<?php wp_enqueue_script('jquery'); ?>
	<?php wp_head(); ?>
	<script>
		jQuery(function() {
			var pull 		= jQuery('#pull');
				menu 		= jQuery('#topMenu ul');
				menuHeight	= menu.height();

			jQuery(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});

			jQuery(window).resize(function(){
        		var w = $(window).width();
        		if(w > 320 && menu.is(':hidden')) {
        			menu.removeAttr('style');
        		}
    		});
		});

		
	</script>
</head>
<div class="mainWrapper"> <!-- Main Wrapper -->
	
	<div class="headTop">
		<table cellpadding="0" cellspacing="0" border="0" width="100%">
		<tr>
			<td><img src="<?php bloginfo('template_url'); ?>/images/logo.png" class="logo" /></td>
			<td><div class="phoneNo">OFFICE: <span>800-809-6301</span></div></td>
		</tr>
		</table>
		
		
	</div>
	<?php
		$pageId = get_the_ID();
		if($pageId == '4')
		{	$activeCss2 = 'class="active";';
			$topHeaderClass ="headerAbout";
		}
		elseif($pageId == '8'){
			$activeCss3 = 'class="active";';
			$topHeaderClass ="headerRate";
		}
		elseif($pageId == '10'){
			$activeCss4 = 'class="active";';
			$topHeaderClass ="headerContact";
		}
		elseif($pageId == '12'){
			$activeCss5 = 'class="active";';
			$topHeaderClass ="headerLinks";
		}
		else
		{   $activeCss1 = 'class="active";';
			$topHeaderClass ="header";
		}
	?>
	<div class="<?php echo $topHeaderClass ;?>"> <!-- Header Wrapper -->
			<div id="topMenu" class="clearfix">
						<a href="#" id="pull"></a>
						<ul>
						<li <?php echo$activeCss1; ?>><a href="<?php echo get_home_url(); ?>">Home</a></li>
						<li <?php echo$activeCss2; ?>><a href="<?php echo get_permalink(4); ?>"><?php echo get_the_title(4); ?></a></li>
						<li <?php echo$activeCss3; ?>><a href="<?php echo get_permalink(8); ?>"><?php echo get_the_title(8); ?></a></li>
						<li <?php echo$activeCss4; ?>><a href="<?php echo get_permalink(10); ?>"><?php echo get_the_title(10); ?></a></li>
						<li id="lastLiSet" <?php echo$activeCss5; ?>><a href="<?php echo get_permalink(12); ?>"><?php echo get_the_title(12); ?></a></li>
						</ul>
			</div>
			<div class="headerLeft">
				
				<?php if($pageId == '4'){ ?>
				<h1 class="topHeadTilte"><span>About</span> Truck Accident Experts</h1>
				<div style="clear:both;"></div>
				<div class="topHeadTxt2">
					When choosing Mr. Fetrow as your expert witness, you get over fifteen (15) years hands on experience in the commercial motor vehicle (CMV) industry.  Mr. Fetrow can present the complex state and federal laws regarding commercial motor vehicles (CMV) in a simplified manner so that layman jurors will be able to understand.
					<!-- Casey Fetrow is retained by many prominent<br />
			    nationwide trucking companies' attorneys to present<br />
			    and deliver his compelling expert witness testimony.<br />
			    His commitment to excellence brings him respect<br />
			    in the field of accident investigation and reporting,<br />
			    providing a renowned record of repeat business <br />
			    from satisfied clients who have come to depend <br />
			    on his professional expert services. --> </div>
				<?php } elseif($pageId == '8'){ ?>
				<h1 class="topHeadTilte"><span>Rate</span> Schedule</h1>
				<div style="clear:both;"></div>
				<div class="topHeadTxt3">
					Casey Fetrow offers a unique combination of <br />
				  Commercial Motor Vehicle / CMV experience that <br />
				  makes him a consistently credible accident expert, <br />
				  due diligence investigator, and expert witness: <br /><br />
					<span>
					<div>An Hourly Rate Schedule is outlined below.<br />
			      Please view or print a Detailed Fee Schedule<br />
			      and CV by clicking the link below.</div></span>
				</div>
				<?php } elseif($pageId == '10'){ ?>
				<h1 class="topHeadTilte">  Contact <span>Us</span> </h1>
				<div style="clear:both;"></div>
				<div class="topHeadTxt3">
					We provide consulting, due diligence, <br />
				  subject matter expertise, litigation support, <br />
				  and testimony on topics related to truck accidents, <br />
				  truck safety, DOT regulations, accident reconstruction, <br />
				  and hazardous materials management. <br /><br />
					<span><div>Expert knowledge of equipment failure, <br />
				  equipment maintenance, operator error, <br />
				  load securement, and driver neglect.</div></span>
				</div>
				<?php } elseif($pageId == '12'){ ?>
				<h1 class="topHeadTilte">  Resource  <span>Links</span> </h1>
				<div style="clear:both;"></div>
				<div class="topHeadTxt3">
					Below are recommended links to transportation <br />
				  safety resources.  We will be adding to this bank of <br />
				  in-depth information regularly, as we find more resource <br />
				  sites related to transportation safety, regulations, <br />
				  agencies, hazerdous materials, and trade associations. <br /><br />
					<span><div>Please contact us for further resource information <br />
				  pertaining to your case, we will be happy to help. </div></span>
				</div>
				<?php } else{ ?>
				<h1 class="topHeadTilte">Expert Witness Services</h1>
				<div class="topHeadSubTilte">When You Want The Best</div>
				<div style="clear:both;"></div>
				<div class="topHeadTxt" style="margin-top:3px;font-size: 13pt;"><p>When selecting an expert witness, you expect your expert witness to present testimony that is authoritative, credible and accurate.  In fact, the outcome of the case depends on it and the choice of an expert witness can sometimes make or break your case.</p>
					<span style="margin-top:10px;font-size: 13pt;">Casey Fetrow's background and experience in the trucking industry allows him to provide his clients with a full range of expertise and knowledge in trucking accident cases nationwide.</span>
				</div>
				<?php } ?>
			</div>
			<div class="headerRight">
				<div class="headerRightTxtWrap">
					<p>- Commercial Motor &nbsp;&nbsp;&nbsp;Vehicle Expert</p>
					<p>- Accident Investigator</p>
					<p>- Consistent, Credible &nbsp;&nbsp;&nbsp;Expert Testimony</p>
					<!-- <p>- Failure Analysis</p>
					<p>- Regulatory<br />&nbsp;&nbsp;&nbsp;Compliance</p> -->
				</div>
			</div>
	</div><!-- Header Wrapper end -->