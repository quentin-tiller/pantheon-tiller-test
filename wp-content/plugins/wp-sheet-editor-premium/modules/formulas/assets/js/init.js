function vgseGetSelectedRowsCount(){var e=window.beFoundRows;"selected"===jQuery(".modal-formula .wpse-select-rows-options").val()&&(e=vgseGetSelectedIds().length);return e}function vgseGetSelectedIds(){var e=hot.getDataAtCol(0),a=[];return e.forEach(function(e,t){e&&a.push(hot.getDataAtRowProp(t,"ID"))}),a}function vgseAddField(e,t){return e.append('<div class="vg-field"><'+t.tag+" /></div>"),$field=e.find(".vg-field").last(),"select"===t.tag&&t.options&&$field.find(t.tag).append(t.options),$field.find(t.tag).attr(t.html_attrs),t.label&&"a"!==t.tag&&$field.prepend("<label>"+t.label+"</label>"),t.label&&"a"===t.tag&&$field.find(t.tag).text(t.label),t.description&&$field.append("<p>"+t.description+"</p>"),"a"===t.tag&&$field.append('<input type="hidden" />'),$field}function vgseGenerateMathFormula(e){return!!e.firstFieldValue&&'=MATH("'+e.firstFieldValue+'")'}function vgseGenerateDecreasePercentageFormula(e){return!!e.firstFieldValue&&'=MATH("$current_value$ * 0.'+("0"+(100-parseFloat(e.firstFieldValue))).slice(-2)+'")'}function vgseGenerateIncreasePercentageFormula(e){return!!e.firstFieldValue&&'=MATH("$current_value$ * 1.'+("0"+e.firstFieldValue).slice(-2)+'")'}function vgseGenerateDecreaseFormula(e){return!!e.firstFieldValue&&'=MATH("$current_value$ - '+e.firstFieldValue+'")'}function vgseGenerateIncreaseFormula(e){return!!e.firstFieldValue&&'=MATH("$current_value$ + '+e.firstFieldValue+'")'}function vgseGenerateSetValueFormula(e){if(e.actionSettings.fields_relationship||(e.actionSettings.fields_relationship="AND"),"or"===e.actionSettings.fields_relationship.toLowerCase()&&1<e.actionFields.length){var t="";e.actionFields.each(function(){jQuery(this).val()&&(t=jQuery(this).val())}),e.firstFieldValue=t}return!!e.firstFieldValue&&'=REPLACE(""$current_value$"",""'+e.firstFieldValue+'"")'}function vgseGenerateAppendFormula(e){if(e.actionSettings.fields_relationship||(e.actionSettings.fields_relationship="AND"),"or"===e.actionSettings.fields_relationship.toLowerCase()&&1<e.actionFields.length){var t="";e.actionFields.each(function(){jQuery(this).val()&&(t=jQuery(this).val())}),e.firstFieldValue=t}if(!e.firstFieldValue)return!1;var a=jQuery(".column-selector select"),l="";return"post_terms"!==a.find("option:selected").data("value-type")&&"boton_gallery_multiple"!==a.find("option:selected").data("value-type")||(l=vgse_editor_settings.taxonomy_terms_separator),e.columnSettings.list_separation_character&&"string"==typeof e.columnSettings.list_separation_character&&(l=e.columnSettings.list_separation_character),'=REPLACE(""$current_value$"",""$current_value$'+l+e.firstFieldValue+'"")'}function vgseGenerateClearValueFormula(e){return'=REPLACE(""$current_value$"","""")'}function vgseGenerateCapitalizeWordsFormula(e){return'=REPLACE(""$current_value$"",""$current_value_capitalize_each_word$"")'}function vgseGenerateExcerptFormula(e){return!!e.firstFieldValue&&'=REPLACE(""$current_value$"",""$current_value_excerpt'+e.firstFieldValue+'$"")'}function vgseGenerateCustomFormula(e){return!!e.firstFieldValue&&(e.firstFieldValue.indexOf("=REPLACE")<0&&e.firstFieldValue.indexOf("=MATH")<0?(alert(vgse_formulas_data.texts.wrong_formula),""):e.firstFieldValue)}function vgseGeneratePrependFormula(e){if(e.actionSettings.fields_relationship||(e.actionSettings.fields_relationship="AND"),"or"===e.actionSettings.fields_relationship.toLowerCase()&&1<e.actionFields.length){var t="";e.actionFields.each(function(){jQuery(this).val()&&(t=jQuery(this).val())}),e.firstFieldValue=t}if(!e.firstFieldValue)return!1;var a=jQuery(".column-selector select"),l="";return"post_terms"!==a.find("option:selected").data("value-type")&&"boton_gallery_multiple"!==a.find("option:selected").data("value-type")||(l=vgse_editor_settings.taxonomy_terms_separator),e.columnSettings.list_separation_character&&"string"==typeof e.columnSettings.list_separation_character&&(l=e.columnSettings.list_separation_character),'=REPLACE(""$current_value$"",""'+e.firstFieldValue+l+'$current_value$"")'}function vgseGenerateReplaceFormula(e){"post_terms"===jQuery(".column-selector select").find("option:selected").data("value-type")&&(e.actionFields=e.actionFields.filter("select"));var t=[];return e.actionFields.each(function(){var e=jQuery(this).val()||"";t.push('""'+e+'""')}),!(t.length<2)&&"=REPLACE("+t.join(",")+")"}function vgseGenerateMergeFormula(e){var t="";return e.actionFields.each(function(){var e=jQuery(this).val();e&&!t&&(t=e)}),!!t&&'=REPLACE(""$current_value$"",""'+t+'"")'}jQuery(document).ready(function(){var _=jQuery(".modal-formula form"),g=jQuery(".vgse-execute-formula"),v=_.find(".formula-field textarea");_.find(".wpse-formula-post-query").click(function(e){e.preventDefault(),window.vgseBackToFormula=!0,jQuery('[name="run_filters"]').first().click()}),_.find(".wpse-select-rows-options").change(function(e){"new_search"===jQuery(this).val()?(window.vgseBackToFormula=!0,jQuery('[name="run_filters"]').first().click(),_.find(".wpse-formula-post-query").show()):_.find(".wpse-formula-post-query").hide(),jQuery(".modal-formula .rows-to-be-updated-total span").text(vgseGetSelectedRowsCount())}),_.find(".wpse-select-rows-options").trigger("change"),jQuery(document).on("closed",'[data-remodal-id="modal-filters"]',function(){void 0!==window.vgseBackToFormula&&window.vgseBackToFormula&&(window.vgseBackToFormula=!1,jQuery('[data-remodal-target="modal-formula"]').first().click())}),jQuery(document).on("closing",'[data-remodal-id="modal-formula"]',function(){var e=jQuery(".modal-formula"),t=e.find(".go-back-formula-execution");t.is(":visible")&&t.first().click(),e.find(".formula-builder, .use-slower-execution-field, .multiple-column-selector").show()}),_.find(".multiple-column-selector > select").change(function(e){var t=jQuery(this).val(),a=_.find(".column-selector select"),l=!1;t&&"object"==typeof t&&t.forEach(function(e){if(e&&!l)return l=e,!0}),l?a.val(l):a.val(""),a.trigger("change")}),jQuery(".modal-formula form").submit(function(){if(!_.find(".wpse-select-rows-options").val())return!1;var e=vgseGetSelectedRowsCount();if("selected"===_.find(".wpse-select-rows-options").val()){var t=vgseGetSelectedIds();if(e=t.length){var o=beGetRowsFilters();beAddRowsFilter("post__in="+t.join(","))}}if(!vgseGetSelectedRowsCount())return alert(vgse_editor_settings.texts.no_rows_for_formula),!1;if(beGetModifiedItems().length&&!confirm(vgse_editor_settings.texts.save_changes_before_we_reload))return!1;if("function"==typeof beGetRowsFilters&&_.find('input[name="filters_found_rows"]').val(e),!v.val())return alert(vgse_formulas_data.texts.formula_required),!1;_.hide(),g.show();var a=_.find('[name="nonce"]').val(),r=_.find('[name="filters_found_rows"]').val(),l=v.val(),s=_.find('[name="post_type"]').val(),i=jQuery(".be-response");g.find(".speed-tip").hide(),g.find(".edit-running").show(),g.find(".pause-formula-execution").show(),g.find("#be-formulas-nanobar-container").remove(),i.before('<div id="be-formulas-nanobar-container" />');var n={classname:"be-progress-bar",target:document.getElementById("be-formulas-nanobar-container")},u=0,d=_.find(".multiple-column-selector > select option:selected"),c=[];d.each(function(){jQuery(this).val()&&c.push({label:jQuery(this).text(),key:jQuery(this).val()})});c[0].key;1<c.length?i.addClass("multiple-edits"):i.addClass("single-edit");var f=new Nanobar(n);f.go(1),g.find(".remodal-cancel").hide();var p={total:0,processed:0,updated:0},m=vgseGuidGenerator();return window.beFormulaLoop=beAjaxLoop({totalCalls:Math.ceil(r/vgse_editor_settings.save_posts_per_page),url:ajaxurl,dataType:"json",method:"POST",data:{action:"vgse_bulk_edit_formula_big",total:r,column:c[u].key,apply_to:"all",formula:l,nonce:a,post_type:s,filters:beGetRowsFilters(),raw_form_data:_.serialize(),wpse_source_suffix:vgse_editor_settings.wpse_source_suffix||"",bulk_edit_id:m},onSuccess:function(e,t){if(!e.success)return i.append("<p>"+e.data.message+"</p>"),i.scrollTop(i[0].scrollHeight),f.go(100),g.find(".remodal-cancel").show(),!1;p.processed+=e.data.processed,p.updated+=e.data.updated,p.total||(p.total+=e.data.total);var a=e.data.force_complete?100:parseInt(t.current/t.totalCalls*100);if(a<1&&(a=1),e.data.message=e.data.message.replace("{total}",p.total),e.data.message=e.data.message.replace("{progress_percentage}",a),e.data.message=e.data.message.replace("{edited}",p.updated),e.data.message=e.data.message.replace("{column_label}",c[u].label),"delete"!==_.find(".formula-parameter-field").val()&&(t.totalCalls=Math.ceil(parseInt(e.data.total)/vgse_editor_settings.save_posts_per_page)),i.find(".success-message").each(function(){jQuery(this).data("column-key")===t.data.column&&jQuery(this).remove()}),i.find(".complete-message").remove(),i.append(e.data.message),i.scrollTop(i[0].scrollHeight),e.data.force_complete){if(1<c.length&&u<c.length-1)return u++,t.data.column=c[u].key,t.current=0,t.totalCalls=Math.ceil(r/vgse_editor_settings.save_posts_per_page),f.go(1),p.processed=p.updated=p.total=0,!0;var l=vgse_editor_settings.texts.formula_execution_complete;return vgse_editor_settings.texts.ask_review&&(l+="<br>"+vgse_editor_settings.texts.ask_review),i.append(l),g.find(".edit-running").hide(),g.find(".pause-formula-execution").hide(),f.go(100),g.find(".remodal-cancel").show(),void 0!==o&&beAddRowsFilter("post__in="),vgseReloadSpreadsheet(),!1}if(t.current!==t.totalCalls)return g.find(".speed-tip").show(),f.go(a),g.find(".remodal-cancel").hide(),!0;if(1<c.length&&u<c.length-1)return u++,t.data.column=c[u].key,t.current=0,t.totalCalls=Math.ceil(r/vgse_editor_settings.save_posts_per_page),f.go(1),p.processed=p.updated=p.total=0,!0;g.find(".edit-running").hide(),g.find(".pause-formula-execution").hide();l=vgse_editor_settings.texts.formula_execution_complete;return vgse_editor_settings.texts.ask_review&&(l+="<br>"+vgse_editor_settings.texts.ask_review),i.append(l),i.scrollTop(i[0].scrollHeight),f.go(100),g.find(".remodal-cancel").show(),void 0!==o&&beAddRowsFilter("post__in="),vgseReloadSpreadsheet(),!1},onError:function(e,t,a){return confirm(vgse_editor_settings.texts.formula_retry_batch)?(window.vgseDontNotifyServerError=!0,a.current--,f.go(a.current/a.totalCalls*100),g.find(".remodal-cancel").hide(),!0):(i.append(vgse_editor_settings.texts.formula_execution_failed),i.scrollTop(i[0].scrollHeight),f.go(100),g.find(".remodal-cancel").show(),!1)}}),jQuery(".pause-formula-execution").data("action","pause").addClass("button-secondary").removeClass("button-primary").html('<i class="fa fa-pause"></i> Pause'),g.find(".be-response").empty(),!1}),jQuery(".pause-formula-execution").click(function(e){e.preventDefault();var t=jQuery(this);"pause"===t.data("action")?(t.data("action","play").addClass("button-primary").removeClass("button-secondary").html('<i class="fa fa-play"></i> Resume'),window.beFormulaLoop.pause()):(t.data("action","pause").addClass("button-secondary").removeClass("button-primary").html('<i class="fa fa-pause"></i> Pause'),window.beFormulaLoop.resume())}),jQuery(".go-back-formula-execution").click(function(e){e.preventDefault(),_.show(),g.hide(),jQuery(".pause-formula-execution").data("action","play").addClass("button-primary").removeClass("button-secondary").html('<i class="fa fa-play"></i> Resume'),window.beFormulaLoop.pause()});var e=jQuery(".formula-builder"),n=jQuery(".column-selector select"),r=vgseAddField(e,{tag:"select",label:vgse_formulas_data.texts.action_select_label,html_attrs:{name:"action_name",class:"action_name",id:"action_name"},options:'<option value="" class="placeholder">'+vgse_formulas_data.texts.action_select_placeholder+"</option>"});e.append('<div class="builder-fields"></div>');var u=e.find(".builder-fields");jQuery.each(vgse_formulas_data.columns_actions,function(e,t){if("default"===t)t=vgse_formulas_data.default_actions;else{var a={};jQuery.each(t,function(e,t){t="default"===t?vgse_formulas_data.default_actions[e]:jQuery.extend({},vgse_formulas_data.default_actions[e],t),a[e]=t}),t=a}vgse_formulas_data.columns_actions[e]=t}),n.change(function(e){var t=jQuery(this),l=t.val(),a=t.find("option:selected").data("value-type"),o=vgse_editor_settings.final_spreadsheet_columns_settings[l];columnFields=vgse_formulas_data.columns_actions[a],columnFields||(n.find("option:selected").data("value-type","text"),columnFields=vgse_formulas_data.columns_actions.text),r.find("select option:not(.placeholder)").remove(),u.empty(),jQuery.each(columnFields,function(e,t){if(o&&o.supported_formula_types&&o.supported_formula_types.length&&o.supported_formula_types.indexOf(e)<0)return!0;var a=void 0===t.allowed_column_keys||!t.allowed_column_keys||-1<t.allowed_column_keys.indexOf(l);void 0!==t.disallowed_column_keys&&-1<t.disallowed_column_keys.indexOf(l)&&(a=!1),a&&r.find("select").append('<option value="'+e+'">'+t.label+"</option>")})}),r.find("select").change(function(e){var t=jQuery(this).val();if(!t)return!0;var a=n.find("option:selected").data("value-type"),o=vgse_formulas_data.columns_actions[a][t],l=o.input_fields;u.empty(),u.attr("data-column-key",n.val()),o.description&&(o.description=o.description.replace("%target_column%",n.val()),u.append('<p class="action-description">'+o.description+"</p>")),u.append('<div class="action-fields"></div>');var r=u.find(".action-fields"),s={tag:"",label:"",description:"",html_attrs:{class:"formula-parameter-field"}};jQuery.each(l,function(e,t){t=jQuery.extend(s,t),o.fields_relationship||(o.fields_relationship="AND"),void 0!==t.html_attrs&&void 0!==t.html_attrs.name&&t.html_attrs.name||(t.html_attrs.name="formula_data[]"),r.append('<span class="relationship-'+o.fields_relationship.toLowerCase()+' relationship">'+o.fields_relationship+"</span>"),vgseAddField(r,t)}),r.find(".select2")&&"function"==typeof vgseInitSelect2&&vgseInitSelect2(),r.find("input,textarea").each(function(){vgseInputToFormattedColumnField(n.val(),$field.parent(),".formula-parameter-field")});var i=r.find("input,select,textarea");i.change(function(e){var t=n.val(),a=vgse_editor_settings.final_spreadsheet_columns_settings[t],l=vgseExecuteFunctionByName(o.jsCallback,window,{changedField:jQuery(this),actionFields:i,actionSettings:o,firstField:i.first(),firstFieldValue:i.first().val(),columnSettings:a});l=l||"",v.val(l)}),i.first().trigger("change"),jQuery(".modal-formula .rows-to-be-updated-total span").text(vgseGetSelectedRowsCount())}),jQuery("body").on("click",".wp-media.button",function(e){loading_ajax({estado:!0});var t=jQuery(this),o=t.parent().find("input"),a=t.data("multiple"),r=jQuery("body").scrollLeft(),s=[],l=jQuery(document).scrollTop(),i=jQuery("#infinito").prop("checked");jQuery("#infinito").prop("checked",!1),media_uploader=wp.media({frame:"post",state:"insert",multiple:a}),media_uploader.state("embed").on("select",function(){var e=media_uploader.state(),t=e.get("type"),a=e.props.toJSON();a.url=a.url||"","image"===t&&a.url&&(o.val(a.url).trigger("change"),o.after('<div class="selected-files"></div>'),o.next(".selected-files").append('<img src="'+a.url+'" width="80" height="80"/>'))}),media_uploader.on("close",function(){jQuery("body").scrollLeft(r),jQuery(window).scrollTop(l),jQuery("#infinito").prop("checked",i)}),media_uploader.on("insert",function(){jQuery("body").scrollLeft(r);var e=media_uploader.state().get("selection"),t=e.length,a=e.models;if(!a.length)return!0;o.after('<div class="selected-files"></div>');for(var l=0;l<t;l++)file=a[l].toJSON(),s.push(a[l].id),o.next(".selected-files").append('<img src="'+file.sizes.thumbnail.url+'" width="80" height="80"/>');o.val(s).trigger("change")}),media_uploader.open(),loading_ajax({estado:!1})})}),jQuery(document).ready(function(){jQuery(".vgse-simple-tabs").each(function(){var a=jQuery(this);a.find("a").first().trigger("click"),a.find("a").click(function(e){e.preventDefault();var t=jQuery(this).attr("href");a.find("a").removeClass("active"),jQuery(this).addClass("active"),jQuery(".vgse-simple-tab-content").removeClass("active"),jQuery(t).addClass("active")})})}),jQuery(document).ready(function(){jQuery("body").on("click",".save-formula",function(e){e.preventDefault(),loading_ajax({estado:!0});jQuery(this);var t=jQuery(".apply-to-future-posts-field input:checkbox");t.is(":checked")||t.prop("checked",!0);var a=jQuery("#vgse-create-formula").serializeArray();a.push({name:"action",value:"vgse_save_formula"}),jQuery.post(ajaxurl,a,function(e){e.success&&jQuery('[data-remodal-id="modal-formula"]').remodal().close();loading_ajax({estado:!1})})}),jQuery("body").on("click",".delete-saved-formula",function(e){e.preventDefault(),loading_ajax({estado:!0});var t=jQuery(this);jQuery.post(ajaxurl,{action:"vgse_delete_saved_formula",nonce:jQuery("#vgse-wrapper").data("nonce"),post_type:vgse_editor_settings.post_type,formula_index:t.data("formula-index")},function(e){e.success&&(t.parents("li").slideUp(),t.parents("li").remove()),loading_ajax({estado:!1})})})}),jQuery(document).ready(function(){jQuery("body").on("mousedown","th .bulk-selector",function(e){jQuery("th .bulk-selector").data("value-before-click",jQuery(this).prop("checked"))}),jQuery("body").on("click","th .bulk-selector",function(e){for(var t=jQuery(this),a=jQuery("th .bulk-selector"),l=!t.data("value-before-click"),o=hot.countRows(),r=0;r<o;r++)hot.setDataAtCell(r,0,l);if(jQuery("th .bulk-selector").prop("checked",l),a.data("value-before-click",l),l){jQuery('[data-remodal-id="modal-formula"]').remodal().open();var s=vgse_editor_settings.enable_pagination?"selected":"current_search";jQuery(".modal-formula .wpse-select-rows-options").val(s).trigger("change")}}),jQuery(document).on("opened",".modal-formula",function(){vgseGetSelectedIds().length&&!jQuery("th .bulk-selector").prop("checked")&&jQuery(".modal-formula .wpse-select-rows-options").val("selected").trigger("change"),jQuery(".modal-formula .rows-to-be-updated-total span").text(vgseGetSelectedRowsCount())})}),jQuery(document).ready(function(){jQuery(".quick-bulk-action").click(function(){var t=jQuery(this).data("action"),e=jQuery(".modal-formula");t.allow_to_select_column||e.find(".multiple-column-selector").hide(),t.columns&&(e.find(".multiple-column-selector select").val(""),e.find(".multiple-column-selector select option").filter(function(){return-1<t.columns.indexOf(jQuery(this).val())}).prop("selected",!0),e.find(".multiple-column-selector select").trigger("change")),t.type_of_edit&&e.find("select.action_name").val(t.type_of_edit).trigger("change"),t.values&&e.find(".action-fields").each(function(e){t.values[e]&&jQuery(this).find("input,textarea,select").first().val(t.values[e]).trigger("change")}),t.type_of_edit&&t.values&&e.find(".formula-builder, .use-slower-execution-field").hide(),e.remodal().open()})}),jQuery(document).ready(function(){if("undefined"==typeof hot||!jQuery(".modal-formula").length)return!0;var e=hot.getSettings().contextMenu;void 0===e.items&&(e.items={}),e.items.wpse_bulk_edit_column={name:vgse_editor_settings.texts.bulk_edit_column,hidden:function(){if(!hot.getSelected())return!0;var e=hot.colToProp(hot.getSelected()[0][1]),t=vgse_editor_settings.final_spreadsheet_columns_settings[e];return t&&!t.supports_formulas},callback:function(e,t,a){var l=jQuery(".modal-formula");jQuery('[data-remodal-target="modal-formula"]').first().click();var o=hot.colToProp(t[0].start.col);l.find(".multiple-column-selector select").val(""),l.find(".multiple-column-selector select option").filter(function(){return jQuery(this).val()===o}).prop("selected",!0),l.find(".multiple-column-selector select").trigger("change")}},hot.updateSettings({contextMenu:e})});