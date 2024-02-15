# REDCap Queue Minimizer
This REDCap external module hides completed surveys from the survey queue. Note that when repeatable surveys are used the final repeat is always shown to allow further surveys to be submitted.
The logic relies on the text which has been specified in the "Repeat the survey" field in the Survey Settings page within REDCap.  For example, if the text is "Submit another" the Button Keyword can be specified as "Submit". You should consider using the dame keyword within the button text for any repeatable surveys which you want to minimize within the Survey Queue.

## Author 
Eric Smith, Frontier Science Scotland Ltd

## How it Works
Queue Minimizer works by injecting JavaScript into the redcap_every_page_top and redcap_survey_complete hooks.  The code checks that the current page is a Survey Queue, hides all Completed rows then displays any rows with a Submit button.

### Before Queue Minimizer
Completed rows are displayed in the survey queue.

### After Queue Minimizer
Completed surveys are hidden from the queue, except where the Submit button is required.

## Version History
v1.0.0 -- initial release
