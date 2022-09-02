function confirmPayment(id) {
    $(document).ready(function() {
        requesterId = id.split('-')[0]
        amount = id.split('-')[1]
        swal("Please, ensure you have already credited this person before this confirmation. Enter the bank payment reference:",{
          content: "input",
        })
        .then((value) => {
          updateWithdrawPayment(requesterId, amount, value);
        });
        
    });
}
   
function updateWithdrawPayment(requesterId, amount, paymentRef) {   
    $(document).ready(function() {
        $.ajax({
            url: 'procedures/confirmWithdrawPayment.php',
            type: 'POST',
            data: { requesterId: requesterId, amount: amount, paymentRef: paymentRef },
        })
    })
}