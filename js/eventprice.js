$(document).ready(function(){
  $('#priceBtn').click(function(){
    fightname = $("input[name='fightname']").val()
    regular = $("input[name='regular']").val()
    vip = $("input[name='vip']").val()
    vvip = $("input[name='vvip']").val()
    contestId = []
    $.each($("input[name='contestid']:checked"), function(){
      contestId.push($(this).val())
    })
  $("#priceBtn").prop('disabled', true);
  $("#priceBtn").val('Wait...');
  $.ajax({
      url: 'procedures/ticketprice.php',
      type: 'POST',
      dataType: 'text',
      data: JSON.stringify({ fightname: fightname, regular: regular, vip: vip, vvip: vvip, contestId : contestId }),
      success: function(response) {
          if(response.indexOf('success') !== -1) {
          swal({
            title: "Success",
            text: "Ticket successfully created!",
            icon: "success",
          });
        }
      }
   })
    $("#regular").val('')
    $("#vip").val('')
    $("#vvip").val('')
  })
})

$(document).ready(function(){
  $('#submit').click(function(){
    if(!$("input:radio[name='ticket']").is(':checked')) {
       swal({
        title: "Error",
        text: "You need to make a selection",
        icon: "error",
        }); 
        return false; 
        } 
    })      
})

$(document).ready(function(){
  $('#addContest').click(function(){
    eventId = $("#ftname").val()
    contestId = []
    $.each($("input[name='contestid']:checked"), function(){
      contestId.push($(this).val())
    })
  $("#addContest").prop('disabled', true);
  $("#addContest").val('Wait...');
  $.ajax({
      url: 'procedures/addEventoTicket.php',
      type: 'POST',
      dataType: 'text',
      data: JSON.stringify({ eventId: eventId, contestId : contestId }),
      success: function(response) {
          if(response.indexOf('success') !== -1) {
          swal({
            title: "Success",
            text: "Ticket successfully created!",
            icon: "success",
          });
        }
      }
   })
  })
})


$('#code').on('input', function(){
    promocode = $("#code").val()
    $("#pcode").val(promocode)
})      