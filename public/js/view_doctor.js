// Here Goes Javascript & jqury for view-doctor.blade.php 

  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
      // $("#addDateBlock").hide();
    $('#addDateBtn').click(function(){
      	$("#addDateBlock").animate({
            height: 'toggle'
        });
    });  

      $("#serial_date").flatpickr(
			{
				altInput: true,
				altFormat: "F j, Y",
				dateFormat: "Y-m-d",
				minDate: "today"
			}
		);
		
		$("#start_time,#end_time").flatpickr(
			{
				enableTime: true,
				noCalendar: true,
				dateFormat: "H:i",
			}
        );
  });