jQuery(function($){$(window).bind('resize',function(event){if($(event.target).hasClass('ui-resizable'))return;$('#panels-container .grid-container').panelsResizeCells();});$('#panels-container').sortable({items:'> .grid-container',handle:'.grid-handle',tolerance:'pointer',stop:function(){$(this).find('.cell').each(function(){$(this).find('input[name$="[grid]"]').val($('#panels-container .grid-container').index($(this).closest('.grid-container')));});$('#panels-container .panels-container').trigger('refreshcells');}});var gridAddDialogButtons={};gridAddDialogButtons[panels.i10n.buttons.add]=function(){var num=Number($('#grid-add-dialog').find('input').val());if(num==NaN){alert('Invalid Number');return false;}
num=Math.round(num);num=Math.max(1,num);num=Math.min(10,num);var gridContainer=window.panels.createGrid(num);gridContainer.hide().slideDown();$('#grid-add-dialog').dialog('close');};$('#grid-add-dialog').show().dialog({dialogClass:'panels-admin-dialog',autoOpen:false,modal:true,title:$('#grid-add-dialog').attr('data-title'),open:function(){$(this).find('input').val(2).select();},buttons:gridAddDialogButtons}).on('keydown',function(e){if(e.keyCode==$.ui.keyCode.ENTER){$(this).closest('.ui-dialog').find('.ui-dialog-buttonpane .ui-button:eq(0)').click();}
else if(e.keyCode===$.ui.keyCode.ESCAPE){$(this).dialog('close');}});;$('#panels-dialog').show().dialog({dialogClass:'panels-admin-dialog',autoOpen:false,resizable:false,draggable:false,modal:true,title:$('#panels-dialog').attr('data-title'),minWidth:960,maxHeight:Math.round($(window).height()*0.925),close:function(){$('#panels-container .panel.new-panel').hide().slideDown(1000).removeClass('new-panel');}}).on('keydown',function(e){if(e.keyCode===$.ui.keyCode.ESCAPE){$(this).dialog('close');}}).find('.panel-type').disableSelection();$('#so-panels-panels .handlediv').click(function(){setTimeout(function(){$(window).resize();},150);})
$('#panels .panels-add').button({icons:{primary:'ui-icon-add'},text:false}).click(function(){$('#panels-text-filter-input').val('').keyup();$('#panels-dialog').dialog('open');return false;});$('#panels .grid-add').button({icons:{primary:'ui-icon-columns'},text:false}).click(function(){$('#grid-add-dialog').dialog('open');return false;});$('#siteorigin-widgets-link').data('text',$('#siteorigin-widgets-link').html());$('#panels-text-filter-input').keyup(function(e){if(e.keyCode==13){var p=$('#panels-dialog .panel-type-list .panel-type:visible');if(p.length==1)p.click();return;}
var value=$(this).val();$('#panels-dialog .panel-type-list .panel-type').show().each(function(){if(value=='')return;if($(this).find('h3').html().toLowerCase().indexOf(value)==-1){$(this).hide();}})}).click(function(){$(this).keyup()});$('#panels-dialog .panel-type').click(function(){var panel=$('#panels-dialog').panelsCreatePanel($(this).attr('data-class'));panels.addPanel(panel,null,null,true);$('#panels-dialog').dialog('close');});if(typeof panelsData!='undefined')panels.loadPanels(panelsData);else panels.createGrid(1);$(window).resize(function(){$('.panels-admin-dialog').filter(':data(dialog)').dialog('option','position','center');});$('#wp-content-editor-tools').find('.wp-switch-editor').click(function(){var $$=$(this);$('#wp-content-editor-container, #post-status-info').show();$('#so-panels-panels').hide();$('#wp-content-wrap').removeClass('panels-active');$('#content-resize-handle').show();}).end().prepend($('<a id="content-panels" class="hide-if-no-js wp-switch-editor switch-panels">'+$('#so-panels-panels h3.hndle span').html()+'</a>').click(function(){var $$=$(this);$('#wp-content-wrap').removeClass('tmce-active html-active');$('#wp-content-editor-container, #post-status-info').hide();$('#so-panels-panels').show();$('#wp-content-wrap').addClass('panels-active');$(window).resize();$('#content-resize-handle').hide();return false;}));$('#wp-content-editor-tools .wp-switch-editor').click(function(){var $$=$(this);var p=$$.attr('id').split('-');$('#wp-content-wrap').addClass(p[1]+'-active');});$('#panels-home-page #post-body').show();$('#panels-home-page #post-body-wrapper').css('background','none');$('#so-panels-panels').insertAfter('#wp-content-editor-container').addClass('wp-editor-container').hide().find('.handlediv').remove().end().find('.hndle').html('').append($('#add-to-panels'));$('#content-panels').click(function(){$(window).resize();});if(typeof panelsData!='undefined'||$('#panels-home-page').length)$('#content-panels').click();setTimeout(function(){if(typeof panelsData!='undefined'||$('#panels-home-page').length)$('#content-panels').click();$('#so-panels-panels .hndle').unbind('click');$('#so-panels-panels .cell').eq(0).click();},150);if($('#panels-home-page').length){$('#content-tmce, #content-html').remove();$('#content-panels').hide();$('#panels-toggle-switch').mouseenter(function(){$(this).addClass('subtle-move');}).click(function(){$(this).toggleClass('state-off').toggleClass('state-on').removeClass('subtle-move');$('#panels-home-enabled').val($(this).hasClass('state-off')?'false':'true');}).add('#panels-toggle-switch *').disableSelection();$('#post-preview').click(function(event){if($('#wp-content-wrap').hasClass('panels-active')){var form=$('#panels-container').closest('form');var originalAction=form.attr('action');form.attr('action',panels.previewUrl).attr('target','_blank').submit().attr('action',originalAction).attr('target','_self');event.preventDefault();}});}});