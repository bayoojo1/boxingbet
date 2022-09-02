$(document).ready(function() {
    $(document).find("input:checked[type='radio']").addClass('bounce');  
    $("input[type='radio']").click(function() {
        $(this).prop('checked', false);
        $(this).toggleClass('bounce');
        
        if( $(this).hasClass('bounce') ) {
            $(this).prop('checked', true);
            $(document).find("input:not(:checked)[type='radio']").removeClass('bounce');
        }
        stakeid = []
        $.each($("input[type='radio']:checked"), function(){
          stakeid.push($(this).val())  
        })
        $("#clickedId").val(stakeid)
    });
});

$(document).ready(function() {
    $("#calculate").click(function(event){
        event.preventDefault()
        amount = $("#amount").val()
        stakeId = []
        if(amount == '') {
            swal({
            title: "Error",
            text: "You must enter a stake to continue!",
            icon: "error",
          })
            return false;
        }
        $.each($("input[type='radio']:checked"), function(){
          stakeId.push($(this).val())  
        })
        if(stakeId.length == 0) {
            swal({
            title: "Error",
            text: "You must select an odd to continue!",
            icon: "error",
          })
            return false;
        }
        $.ajax({
          url: 'procedures/calculateStakes.php',
          type: 'POST',
          dataType: 'text',
          data: JSON.stringify({ stakeId: stakeId, amount: amount }),
          success: function(response) {
            $("#stakelist").html(response)
          }
       })
    })
})