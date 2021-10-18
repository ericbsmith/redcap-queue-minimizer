<?php
// Set the namespace defined in your config file
namespace QueueMinimizerNamespace\QueueMinimizerClass;
// The next 2 lines should always be included and be the same in every module
use ExternalModules\AbstractExternalModule;
use ExternalModules\ExternalModules;
// Declare your module class, which must extend AbstractExternalModule 
class QueueMinimizerClass extends AbstractExternalModule {
    
	static function hide_completed_surveys()
	{
		?>
        <script type="text/javascript">
				
		//get the URL of the current page
		$url = window.location.href;
		//get the rough index of the survey queue url part
		$sq_index = $url.indexOf("redcap/surveys/?sq=");
	    
		//-1 if not found so anything else is a survey queue page
		if ($sq_index > -1) {
		
                $(document).ready(function() {
			//search for the Completed status and hide
			$linktext = "Completed";
			$("tr").each(function(){
				if ($("td:contains('" + $linktext + "')", this).length != 0) {
					$(this).hide();
                }	
			})
						
			// show the hidden rows
			$('table#table-survey_queue .hidden').removeClass('hidden').hide().show('fade');
        });
		
		}
        </script>
        <?php
	}
	
	static function show_repeat_rows()
	{
		?>
        <script type="text/javascript">
		
		//get the URL of the current page
		$url = window.location.href;
		//get the rough index of the survey queue url part
		$sq_index = $url.indexOf("redcap/surveys/?sq=");
	    
		//-1 if not found so anything else is a survey queue page
		if ($sq_index > -1) {
		
                $(document).ready(function() {
			//search for the link displayed when table collapsed, it may not exist
			$linktext = "Submit";
			$("tr").each(function(){
				if ($("td:contains('" + $linktext + "')", this).length != 0) {
					$(this).show();
                }	
			})
						
			// show the hidden rows
			$('table#table-survey_queue .hidden').removeClass('hidden').hide().show('fade');
        });
		
		}
        </script>
        <?php
	}
	
	function redcap_every_page_top($project_id) 
    {
        self::hide_completed_surveys();
	self::show_repeat_rows();
	} 

    // when a survey is complete the survey queue may be displayed so hide completed surveys there as well
	function redcap_survey_complete($project_id, $record, $instrument, $event_id, $group_id, $repeat_instance) 
    {
        self::hide_completed_surveys();
	self::show_repeat_rows();
    }	
}
