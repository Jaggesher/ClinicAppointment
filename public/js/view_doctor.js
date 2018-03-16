// Here Goes Javascript & jqury for view-doctor.blade.php 

  $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
      // $("#addDateBlock").hide();
      $('#addDateBtn').click(function(){
      	$("#addDateBlock").animate({
            height: 'toggle'
        });
      });  
  });