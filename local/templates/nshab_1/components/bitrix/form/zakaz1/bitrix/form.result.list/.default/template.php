<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//echo "<pre>arParams: "; print_r($arParams); echo "</pre>";
//echo "<pre>arResult: "; print_r($arResult); echo "</pre>";

//echo "<pre>"; print_r($arResult["arrFORM_FILTER"]); echo "</pre>";
?><script>
<!--
function Form_Filter_Click_<?=$arResult["filter_id"]?>()
{
	var sName = "<?=$arResult["tf_name"]?>";
	var filter_id = "form_filter_<?=$arResult["filter_id"]?>";
	var form_handle = document.getElementById(filter_id);
	
	if (form_handle)
	{
		if (form_handle.className != "form-filter-none") 
		{
			form_handle.className = "form-filter-none";
			document.cookie = sName+"="+"none"+"; expires=Fri, 31 Dec 2030 23:59:59 GMT;";
		}
		else 
		{
			form_handle.className = "form-filter-inline";
			document.cookie = sName+"="+"inline"+"; expires=Fri, 31 Dec 2030 23:59:59 GMT;";
		}
	}
}
//-->
</script>
<p>
<?=($arResult["is_filtered"] ? "<span class='form-filteron'>".GetMessage("FORM_FILTER_ON") : "<span class='form-filteroff'>".GetMessage("FORM_FILTER_OFF"))?></span>   
[ <a href="javascript:void(0)" OnClick="Form_Filter_Click_<?=$arResult["filter_id"]?>()"><?=GetMessage("FORM_FILTER")?></a> ]
</p>
<?
/***********************************************
				  filter
************************************************/
?>
<form name="form1" method="GET" action="<?=$APPLICATION->GetCurPageParam("", array("sessid", "delete", "del_id", "action"), false)?>?" id="form_filter_<?=$arResult["filter_id"]?>" class="form-filter-<?=$arResult["tf"]?>">
<input type="hidden" name="WEB_FORM_ID" value="<?=$arParams["WEB_FORM_ID"]?>" />
<?if ($arParams["SEF_MODE"] == "N"):?><input type="hidden" name="action" value="list" /><?endif?>
<div>

	<div>
		<?
		if (strlen($arResult["str_error"]) > 0) 
		{
		?>
<div><?=$arResult["str_error"]?></div>

		<? 
		} // endif (strlen($str_error) > 0)
		?>
	<div><?=GetMessage("FORM_F_ID")?></div>
			<div><?=CForm::GetTextFilter("id", 45, "", "")?></div>

		<?
		if ($arParams["SHOW_STATUS"]=="Y") 
		{
		?>
		<div> 
			<div><?=GetMessage("FORM_F_STATUS")?></div>
			<div><select name="find_status" id="find_status">
				<option value="NOT_REF"><?=GetMessage("FORM_ALL")?></option>
				<?
				foreach ($arResult["arStatuses_VIEW"] as $arStatus)
				{
				?>
				<option value="<?=$arStatus["REFERENCE_ID"]?>"<?=($arStatus["REFERENCE_ID"]==$arResult["__find"]["find_status"] ? " SELECTED=\"1\"" : "")?>><?=$arStatus["REFERENCE"]?></option>
				<?
				}
				?>
			</select></div>
		</div>
		<div> 
			<div><?=GetMessage("FORM_F_STATUS_ID")?></div>
			<div><?echo CForm::GetTextFilter("status_id", 45, "", "");?></div>
		</div>
		<? 
		} //endif ($SHOW_STATUS=="Y");
		?>
		<div>
			<div><?=GetMessage("FORM_F_DATE_CREATE")." (".CSite::GetDateFormat("SHORT")."):"?></div>
			<div><?=CForm::GetDateFilter("date_create", "form1", "Y", "", "")?></div>
		</div>
		<div>
			<div><?=GetMessage("FORM_F_TIMESTAMP")." (".CSite::GetDateFormat("SHORT")."):"?></div>
			<div><?=CForm::GetDateFilter("timestamp", "form1", "Y", "", "")?></div>
		</div>
		<?
		if ($arParams["F_RIGHT"] >= 25) 
		{
		?>
		<div> 
			<div><?=GetMessage("FORM_F_REGISTERED")?></div>
			<div>
				<select name="find_registered" id="find_registered">
					<option value="NOT_REF"><?=GetMessage("FORM_ALL")?></option>
					<option value="Y"<?=($arResult["__find"]["find_registered"]=="Y" ? " SELECTED=\"1\"" : "")?>><?=GetMessage("FORM_YES")?></option>
					<option value="N"<?=($arResult["__find"]["find_registered"]=="N" ? " SELECTED=\"1\"" : "")?>><?=GetMessage("FORM_NO")?></option>
				</select>
			</div>
		</div>
		<div> 
			<div><?=GetMessage("FORM_F_AUTH")?></div>
			<div>
				<select name="find_user_auth" id="find_user_auth">
					<option value="NOT_REF"><?=GetMessage("FORM_ALL")?></option>
					<option value="Y"<?=($arResult["__find"]["find_user_auth"]=="Y" ? " SELECTED=\"1\"" : "")?>><?=GetMessage("FORM_YES")?></option>
					<option value="N"<?=($arResult["__find"]["find_user_auth"]=="N" ? " SELECTED=\"1\"" : "")?>><?=GetMessage("FORM_NO")?></option>
				</select></div>
		</div>
		<div> 
			<div><?=GetMessage("FORM_F_USER")?></div>
			<div><?=CForm::GetTextFilter("user_id", 45, "", "")?></div>
		</div>
		<?
			if (CModule::IncludeModule("statistic")) 
			{
		?>
		<div> 
			<div><?=GetMessage("FORM_F_GUEST")?></div>
			<div><?=CForm::GetTextFilter("guest_id", 45, "", "")?></div>
		</div>
		<div> 
			<div><?=GetMessage("FORM_F_SESSION")?></div>
			<div><?=CForm::GetTextFilter("session_id", 45, "", "")?></div>
		</div>
		<? 
			} // endif(CModule::IncludeModule("statistic"));
		?>
		<? 
		} // endif($F_RIGHT>=25);
		?>
		<?
		if (is_array($arResult["arrFORM_FILTER"]) && count($arResult["arrFORM_FILTER"])>0) 
		{
		?>
		<?
			if ($arParams["F_RIGHT"] >= 25) 
			{ 
		?>
		<div>
			<div><?=GetMessage("FORM_QA_FILTER_TITLE")?></div>
		</div>
		<? 
			} // endif ($F_RIGHT>=25);
		?><?
			foreach ($arResult["arrFORM_FILTER"] as $arrFILTER)
			{
				$prev_fname = "";
				
				foreach ($arrFILTER as $arrF)
				{
					if ($arParams["SHOW_ADDITIONAL"] == "Y" || $arrF["ADDITIONAL"] != "Y")
					{
						$i++;
						if ($arrF["SID"]!=$prev_fname) 
						{
							if ($i>1) 
							{
							?>
			</div>
		</div>
							<?
							} //endif($i>1);
							?>
		<div>
			<div>
				<?=$arrF["FILTER_TITLE"] ? $arrF['FILTER_TITLE'] : $arrF['TITLE']?>
				<?=($arrF["FILTER_TYPE"]=="date" ? " (".CSite::GetDateFormat("SHORT").")" : "")?>
			</div>
			<div>
			<?
						} //endif ($fname!=$prev_fname) ;
						?>
						<?
						switch($arrF["FILTER_TYPE"]){
							case "text":
								echo CForm::GetTextFilter($arrF["FID"]);
								break;
							case "date":
								echo CForm::GetDateFilter($arrF["FID"]);
								break;
							case "integer":
								echo CForm::GetNumberFilter($arrF["FID"]);
								break;
							case "dropdown":
								echo CForm::GetDropDownFilter($arrF["ID"], $arrF["PARAMETER_NAME"], $arrF["FID"]);
								break;
							case "exist":
							?>
								<?=CForm::GetExistFlagFilter($arrF["FID"])?>
								<?=GetMessage("FORM_F_EXISTS")?>
							<?
								break;
						} // endswitch
						?>
						<?
						if ($arrF["PARAMETER_NAME"]=="ANSWER_TEXT") 
						{
						?>
				 [<span class='form-anstext'>...</span>]
						<?
						}
						elseif ($arrF["PARAMETER_NAME"]=="ANSWER_VALUE") 
						{
						?>
				 (<span class='form-ansvalue'>...</span>)
						<?
						}
						?>
				<br />
						<?
						$prev_fname = $arrF["SID"];
					} //endif (($arrF["ADDITIONAL"]=="Y" && $SHOW_ADDITIONAL=="Y") || $arrF["ADDITIONAL"]!="Y");

				} // endwhile (list($key, $arrF) = each($arrFILTER));

			} // endwhile (list($key, $arrFILTER) = each($arrFORM_FILTER));
		} // endif(is_array($arrFORM_FILTER) && count($arrFORM_FILTER)>0);
		?></div>
		</div>
	
	<div>
		<div>
			<div>
				<input type="submit" name="set_filter" value="<?=GetMessage("FORM_F_SET_FILTER")?>" /><input type="hidden" name="set_filter" value="Y" />  <input type="submit" name="del_filter" value="<?=GetMessage("FORM_F_DEL_FILTER")?>" />
			</div>
		</div>
	</div>

</form>
<br />

<?
if ($arParams["can_delete_some"])
{
?>
<SCRIPT LANGUAGE="JavaScript">
<!--
function OnDelete_<?=$arResult["filter_id"]?>()
{
	var show_conf;
	var arCheckbox = document.forms['rform_<?=$arResult["filter_id"]?>'].elements["ARR_RESULT[]"];
	if(!arCheckbox) return;
	if(arCheckbox.lengdiv>0 || arCheckbox.value>0)
	{
		show_conf = false;
		if (arCheckbox.value>0 && arCheckbox.checked) show_conf = true;
		else
		{
			for(i=0; i<arCheckbox.length; i++)
			{
				if (arCheckbox[i].checked) 
				{
					show_conf = true;
					break;
				}
			}
		}
		if (show_conf)
			return confirm("<?=GetMessage("FORM_DELETE_CONFIRMATION")?>");
		else
			alert('<?=GetMessage("FORM_SELECT_RESULTS")?>');
	}
	return false;
}

function OnSelectAll_<?=$arResult["filter_id"]?>(fl)
{
	var arCheckbox = document.forms['rform_<?=$arResult["filter_id"]?>'].elements["ARR_RESULT[]"];
	if(!arCheckbox) return;
	if(arCheckbox.lengdiv>0)
		for(i=0; i<arCheckbox.length; i++)
			arCheckbox[i].checked = fl;
	else
		arCheckbox.checked = fl;
}
//-->
</SCRIPT>
<? 
} //endif($can_delete_some);
?>

<?
if (strlen($arResult["FORM_ERROR"]) > 0) ShowError($arResult["FORM_ERROR"]);
if (strlen($arResult["FORM_NOTE"]) > 0) ShowNote($arResult["FORM_NOTE"]);
?>
<p>

</p>
<form name="rform_<?=$arResult["filter_id"]?>" method="post" action="<?=POST_FORM_ACTION_URI?>#nav_start">
	<input type="hidden" name="WEB_FORM_ID" value="<?=$arParams["WEB_FORM_ID"]?>" />
	<?=bitrix_sessid_post()?>

	<?
	if ($arParams["can_delete_some"]) 
	{
	?>
	<p></p>
	<? 
	} // endif($can_delete_some);
	?>

	<?
	if ($arResult["res_counter"] > 0 && $arParams["SHOW_STATUS"] == "Y" && $arParams["F_RIGHT"] >= 15) 
	{
	?>
	<p></p>
	<? 
	} //endif(intval($res_counter)>0 && $SHOW_STATUS=="Y" && $F_RIGHT>=15);
	?>
	<p>
	<?=$arResult["pager"]?>
	</p>

	<div class="form-table data-table">
		<?
		/***********************************************
					  table header
		************************************************/
		?>
							<?
							if ($arParams["SHOW_STATUS"]=="Y") 
							{
							?>
							<td><?=SortingEx("s_id")?></td>
							<?
							} //endif($SHOW_STATUS=="Y");
							?>
		<?
		/***********************************************
					  table body
		************************************************/
		?>

		<?
		if(count($arResult["arrResults"]) > 0)
		{
			?>

		<div class="col-3">

			<?
			$j=0;
			foreach ($arResult["arrResults"] as $arRes)
			{ 
				$j++;

			if ($arParams["SHOW_STATUS"]=="Y" || $arParams["can_delete_some"] && $arRes["can_delete"])
			{
				if ($j>1) 
				{
			?>


			<?
				} //endif ($j>1);
			?>

			<div class="col-3-div" style="height:450px;border:1px solid #ccc;overflow:hidden;">
						<?
						if ($arRes["can_edit"]) 
						{ 
						?>
						<?
							if (strlen(trim($arParams["EDIT_URL"]))>0) 
							{
								$href = $arParams["SEF_MODE"] == "Y" ? str_replace("#RESULT_ID#", $arRes["ID"], $arParams["EDIT_URL"]) : $arParams["EDIT_URL"].(strpos($arParams["EDIT_URL"], "?") === false ? "?" : "&")."RESULT_ID=".$arRes["ID"]."&WEB_FORM_ID=".$arParams["WEB_FORM_ID"];
						?>
<a title="<?=GetMessage("FORM_EDIT_ALT")?>" href="<?=$href?>">
<div style="width: 104%;text-align: center;font-size: 17px;background-color: white;height: 45px;padding-top: 5px;">
<div>ЗАКАЗ №<?=$arResult["arrAnswersSID"][$arRes["ID"]]["SIMPLE_QUESTION_520"]["0"]["USER_TEXT"]?></div>
<?if(empty($arResult["arrAnswersSID"][$arRes["ID"]]["SIMPLE_QUESTION_320"]["0"]["USER_TEXT"])):?><?else:?>
<strong>|ПОКРАСКА|</strong><?endif;?>
<?if(empty($arResult["arrAnswersSID"][$arRes["ID"]]["SIMPLE_QUESTION_881"]["0"]["USER_TEXT"])):?><?else:?>
<strong>|ПОЛИРОВКА|</strong><?endif;?>
<?if(empty($arResult["arrAnswersSID"][$arRes["ID"]]["SIMPLE_QUESTION_394"]["0"]["USER_TEXT"])):?><?else:?>
<strong>|РЕМОНТ|</strong><?endif;?>
<?if(empty($arResult["arrAnswersSID"][$arRes["ID"]]["SIMPLE_QUESTION_879"]["0"]["USER_TEXT"])):?><?else:?>
<strong>|ШИНОМОНТАЖ|</strong><br><?endif;?>
</div>
</a> 
						<? 
							}// endif(strlen(trim($EDIT_URL))>0);
						?>
						<? 
						}// endif($can_edit);
						?>

				
			<? 
			} //endif ($SHOW_STATUS=="Y");
			?>
				
				<div style="position: absolute;bottom: 0;text-align: center;width: 100%;height:25px;font-size:20px;color:red;font-weight:800;z-index:200;background-color:rgba(255, 255, 255, 0.73);">
										<? 
					if ($arParams["SHOW_STATUS"] == "Y") 
					{
					?>
					<?if($arRes["STATUS_TITLE"] == "Выдан"):?><span style="font-size:20px;color:green;"><?=$arRes["STATUS_TITLE"]?></span><br><?else:?><?endif;?>
					<? 
						} // endif (in_array("EDIT",$arrRESULT_PERMISSION) && $F_RIGHT>=15);
					?>
				ДАТА ВЫДАЧИ: <?=$arResult["arrAnswersSID"][$arRes["ID"]]["SIMPLE_QUESTION_473"]["0"]["USER_TEXT"]?>
				</div>

				<div><?=$arRes["TSX_0"]?><br /><?=$arRes["TSX_1"]?></div>
				<?
				if ($arParams["F_RIGHT"] >= 25) 
				{ 
				?>
				<div><?
					if ($arRes["USER_ID"]>0) 
					{
					?>

						<?if($arRes["USER_AUTH"]=="N") { ?><?=GetMessage("FORM_NOT_AUTH")?><?}?>
					<?
					}
					else 
					{
					?>
						<?=GetMessage("FORM_NOT_REGISTERED")?>
					<?
					} // endif ($GLOBALS["f_USER_ID"]>0);
					?>
					<?
					if ($arParams["isStatisticIncluded"]) 
					{
						if (intval($arRes["STAT_GUEST_ID"])>0) 
						{
						?>
							[<a title="<?=GetMessage("FORM_GUEST")?>" href="/bitrix/admin/guest_list.php?lang=<?=LANGUAGE_ID?>&find_id=<?=$arRes["STAT_GUEST_ID"]?>&set_filter=Y"><?=$arRes["STAT_GUEST_ID"]?></a>]
						<?
						} //endif ((intval($GLOBALS["f_STAT_GUEST_ID"])>0));
						?>
						<?
						if (intval($arRes["STAT_SESSION_ID"])>0) 
						{
						?>
							(<a title="<?=GetMessage("FORM_SESSION")?>" href="/bitrix/admin/session_list.php?lang=<?=LANGUAGE_ID?>&find_id=<?=$arRes["STAT_SESSION_ID"]?>&set_filter=Y"><?=$arRes["STAT_SESSION_ID"]?></a>)
						<?
						} //endif ((intval($GLOBALS["f_STAT_SESSION_ID"])>0));
					} //endif (isStatisitcIncluded);
				?></div>
				<? 
				} //endif ($F_RIGHT>=25);
				?>
<div style="z-index:100;position:relative;">
	Сделаны фото ДО:<?if($arResult["arrAnswersSID"][$arRes["ID"]]["SIMPLE_QUESTION_10"]["0"]["ANSWER_TEXT"] == "ДА"):?><?=$arResult["arrAnswersSID"][$arRes["ID"]]["SIMPLE_QUESTION_10"]["0"]["ANSWER_TEXT"]?><?else:?><span style="color:red;">НЕТ</span><?endif;?>:<?=$arResult["arrAnswersSID"][$arRes["ID"]]["SIMPLE_QUESTION_24"]["0"]["USER_TEXT"]?>
<br>Сделаны фото ПОСЛЕ:<?if($arResult["arrAnswersSID"][$arRes["ID"]]["SIMPLE_QUESTION_11"]["0"]["ANSWER_TEXT"] == "ДА"):?><?=$arResult["arrAnswersSID"][$arRes["ID"]]["SIMPLE_QUESTION_11"]["0"]["ANSWER_TEXT"]?><?else:?><span style="color:red;">НЕТ</span><?endif;?>
<?if(!empty($arResult["arrAnswersSID"][$arRes["ID"]]["SIMPLE_QUESTION_320"]["0"]["USER_TEXT"])):?><br>Покраска выполнена:
<?if($arResult["arrAnswersSID"][$arRes["ID"]]["SIMPLE_QUESTION_19"]["0"]["ANSWER_TEXT"] == "ДА"):?><?=$arResult["arrAnswersSID"][$arRes["ID"]]["SIMPLE_QUESTION_19"]["0"]["ANSWER_TEXT"]?><?else:?><span style="color:red;">НЕТ</span><?endif;?><?else:?><?endif;?>
<?if(!empty($arResult["arrAnswersSID"][$arRes["ID"]]["SIMPLE_QUESTION_881"]["0"]["USER_TEXT"])):?><br>Полировка выполнена:
<?if($arResult["arrAnswersSID"][$arRes["ID"]]["SIMPLE_QUESTION_20"]["0"]["ANSWER_TEXT"] == "ДА"):?><?=$arResult["arrAnswersSID"][$arRes["ID"]]["SIMPLE_QUESTION_20"]["0"]["ANSWER_TEXT"]?><?else:?><span style="color:red;">НЕТ</span><?endif;?><?else:?><?endif;?>
<?if(!empty($arResult["arrAnswersSID"][$arRes["ID"]]["SIMPLE_QUESTION_394"]["0"]["USER_TEXT"])):?><br>Ремонт выполнен:
<?if($arResult["arrAnswersSID"][$arRes["ID"]]["SIMPLE_QUESTION_12"]["0"]["ANSWER_TEXT"] == "ДА"):?><?=$arResult["arrAnswersSID"][$arRes["ID"]]["SIMPLE_QUESTION_12"]["0"]["ANSWER_TEXT"]?><?else:?><span style="color:red;">НЕТ</span><?endif;?><?else:?><?endif;?>
<?if(!empty($arResult["arrAnswersSID"][$arRes["ID"]]["SIMPLE_QUESTION_879"]["0"]["USER_TEXT"])):?><br>Шиномонтаж выполнен:
<?if($arResult["arrAnswersSID"][$arRes["ID"]]["SIMPLE_QUESTION_21"]["0"]["ANSWER_TEXT"] == "ДА"):?><?=$arResult["arrAnswersSID"][$arRes["ID"]]["SIMPLE_QUESTION_21"]["0"]["ANSWER_TEXT"]?><?else:?><span style="color:red;">НЕТ</span><?endif;?><?else:?><?endif;?>
				</div>
				<div style="position:absolute;z-index:1;">
					<img class="aars" src="<?=CFile::GetPath($arResult["arrAnswers"][$arRes["ID"]]["61"]["108"]["USER_FILE_ID"])?>" width="400px">

</div>
				<?
				foreach ($arResult["arrColumns"] as $FIELD_ID => $arrC)
				{
					if (!is_array($arParams["arrNOT_SHOW_TABLE"]) || !in_array($arrC["SID"], $arParams["arrNOT_SHOW_TABLE"])) 
					{
						if (($arrC["ADDITIONAL"]=="Y" && $arParams["SHOW_ADDITIONAL"]=="Y") || $arrC["ADDITIONAL"]!="Y") 
						{						
				?>
				<div class="3">

					<?
					$arrAnswer = $arResult["arrAnswers"][$arRes["ID"]][$FIELD_ID];
					if (is_array($arrAnswer)) 
					{
						foreach ($arrAnswer as $key => $arrA)
						{
						?>
							<?if (strlen(trim($arrA["USER_TEXT"])) > 0) {?><?=$arrA["USER_TEXT"]?><br /><?}?>
							<?if (strlen(trim($arrA["ANSWER_TEXT"])) > 0) {?>[<span class='form-anstext'><?=$arrA["ANSWER_TEXT"]?></span>] <?}?>
							<?if (strlen(trim($arrA["ANSWER_VALUE"])) > 0 && $arParams["SHOW_ANSWER_VALUE"]=="Y") {?>(<span class='form-ansvalue'><?=$arrA["ANSWER_VALUE"]?></span>)<?}?>
									<br />
									<?
									if (intval($arrA["USER_FILE_ID"])>0) 
									{
										if ($arrA["USER_FILE_IS_IMAGE"]=="Y") 
										{
										?>
											<?=$arrA["USER_FILE_IMAGE_CODE"]?>
										<?
										}
										else 
										{
										?>
										<a title="<?=GetMessage("FORM_VIEW_FILE")?>" target="_blank" href="/bitrix/tools/form_show_file.php?rid=<?=$arRes["ID"]?>&hash=<?=$arrA["USER_FILE_HASH"]?>&lang=<?=LANGUAGE_ID?>"><?=$arrA["USER_FILE_NAME"]?></a><br />
										(<?=$arrA["USER_FILE_SIZE_TEXT"]?>)<br />
										[ <a title="<?=str_replace("#FILE_NAME#", $arrA["USER_FILE_NAME"], GetMessage("FORM_DOWNLOAD_FILE"))?>" href="/bitrix/tools/form_show_file.php?rid=<?=$arRes["ID"]?>&hash=<?=$arrA["USER_FILE_HASH"]?>&lang=<?=LANGUAGE_ID?>&action=download"><?=GetMessage("FORM_DOWNLOAD")?></a> ]
										<?
										}
									}
									?>

						<? 
						} //foreach
					} // endif (is_array($arrAnswer));
					?>

				</div>

				<?
					} //endif (($arrC["ADDITIONAL"]=="Y" && $SHOW_ADDITIONAL=="Y") || $arrC["ADDITIONAL"]!="Y") ;
					} // endif (!is_array($arrNOT_SHOW_TABLE) || !in_array($arrC["SID"],$arrNOT_SHOW_TABLE));
				} //foreach
				?>

			</div>

			<? 
			} //foreach
			?>

			</div>

		<?
		}
		?>

		<?
		if ($arParams["HIDE_TOTAL"]!="Y") 
		{ 
		?>

		<div>
			<div>
				<th colspan="<?=$colspan?>"><?=GetMessage("FORM_TOTAL")?> <?=$arResult["res_counter"]?></div>
			</div>
		</div>
		<? 
		} //endif ($HIDE_TOTAL!="Y");
		?>
	</div>
<?=$arResult["arrAnswersSID"][$arRes["ID"]]["SIMPLE_QUESTION_320"]["0"]["USER_TEXT"]?>
	<p><?=$arResult["pager"]?></p>
	<?
	if (intval($arResult["res_counter"])>0 && $arParams["SHOW_STATUS"]=="Y" && $arParams["F_RIGHT"] >= 15) 
	{ 
	?>
	<p>
	<input type="submit" name="save" value="<?=GetMessage("FORM_SAVE")?>" /><input type="hidden" name="save" value="Y" /> <input type="reset" value="<?=GetMessage("FORM_RESET")?>" />
	</p>
	<? 
	} //endif (intval($res_counter)>0 && $SHOW_STATUS=="Y" && $F_RIGHT>=15);
	?>

	<?
	if ($arParams["can_delete_some"]) 
	{ 
	?>
	<p><input type="submit" name="delete" value="<?=GetMessage("FORM_DELETE_SELECTED")?>" onClick="return OnDelete_<?=$arResult["filter_id"]?>()" /></p>
	<? 
	} //endif ($can_delete_some);
	?>
</form>
<?

$arGroupAvalaible = array(1);
$arGroups = CUser::GetUserGroup($USER->GetID());
$result_intersect = array_intersect($arGroupAvalaible, $arGroups);
if(!empty($result_intersect)):

echo "<pre>";
   print_r($arResult);
echo "</pre>";

endif;

?>