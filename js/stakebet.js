$(document).ready(function() {
    $("#mystake").change(function() {
        id = $("#mystake").val()
        odd = id.split('-')[0]
        contestId = id.split('-')[1]
        $.ajax({
          url: 'procedures/displayodd.php',
          type: 'POST',
          dataType: 'text',
          data: JSON.stringify({ contestId: contestId, odd : odd }),
          success: function(response) {
            $("#showOdd").html(response)
            $("#thisOdd").val(response)
          }
       })
    })
})


$(document).ready(function() {
    $("#amountStaked").keyup(function() {
        amount = $("#amountStaked").val()
        odd = $("#showOdd").html()
        $.ajax({
          url: 'procedures/displayAmount.php',
          type: 'POST',
          dataType: 'text',
          data: JSON.stringify({ amount: amount, odd : odd }),
          success: function(response) {
            $("#win").html(response)
          }
       })
    })
})

var i;
$(document).ready(function() {
    $('#plus').click(function(){
        i = parseInt($('#qty').val());
        i = i + 1;
        $('#qty').val(i);
    })
    $('#minus').click(function(){
        i = parseInt($('#qty').val());
        i = i - 1;
        if(i == 4) {
            i = 5;
        }
        $('#qty').val(i); 
    })
})

$(document).ready(function() {
    $('#plus').click(function(){
        currentCost = $("#qty").val()
        totalCost = currentCost * 100;
        $("#voteCost").html(totalCost);
    })
})

$(document).ready(function() {
    $('#minus').click(function(){
        currentCost = $("#qty").val()
        totalCost = currentCost * 100;
        $("#voteCost").html(totalCost);
    })
})