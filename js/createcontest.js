$(document).ready(function() {
  $('#updateContest').click(function(event) {
    event.preventDefault()
    contester_a = $("#contester_a").val()
    contester_b = $("#contester_b").val()
    awins = $("#a_wins_odd").val()
    awinstko = $("#a_wins_tko_odd").val()
    awinsplit = $("#a_wins_split_odd").val()
    awinsunanimous = $("#a_wins_unanimous_odd").val()
    ar1tko = $("#a_r1_tko_odd").val()
    ar2tko = $("#a_r2_tko_odd").val()
    ar3tko = $("#a_r3_tko_odd").val()
    ar4tko = $("#a_r4_tko_odd").val()
    ar5tko = $("#a_r5_tko_odd").val()
    ar6tko = $("#a_r6_tko_odd").val()
    ar7tko = $("#a_r7_tko_odd").val()
    ar8tko = $("#a_r8_tko_odd").val()
    ar9tko = $("#a_r9_tko_odd").val()
    ar10tko = $("#a_r10_tko_odd").val()
    ar11tko = $("#a_r11_tko_odd").val()
    ar12tko = $("#a_r12_tko_odd").val()
    draw = $("#draw_odd").val()
    bwins = $("#b_wins_odd").val()
    bwinstko = $("#b_wins_tko_odd").val()
    bwinsplit = $("#b_wins_split_odd").val()
    bwinsunanimous = $("#b_wins_unanimous_odd").val()
    br1tko = $("#b_r1_tko_odd").val()
    br2tko = $("#b_r2_tko_odd").val()
    br3tko = $("#b_r3_tko_odd").val()
    br4tko = $("#b_r4_tko_odd").val()
    br5tko = $("#b_r5_tko_odd").val()
    br6tko = $("#b_r6_tko_odd").val()
    br7tko = $("#b_r7_tko_odd").val()
    br8tko = $("#b_r8_tko_odd").val()
    br9tko = $("#b_r9_tko_odd").val()
    br10tko = $("#b_r10_tko_odd").val()
    br11tko = $("#b_r11_tko_odd").val()
    br12tko = $("#b_r12_tko_odd").val()
    event_date = $("#event_date").val()
    event_location = $("#event_location").val()
    $("#updateContest").prop('disabled', true);
    $("#updateContest").val('Wait...');
    $.ajax({
      url: 'procedures/createContest.php',
      type: 'POST',
      dataType: 'text',
      data: JSON.stringify({ contester_a: contester_a, contester_b: contester_b, awins : awins, awinstko: awinstko, awinsplit: awinsplit, awinsunanimous: awinsunanimous, ar1tko: ar1tko, ar2tko: ar2tko, ar3tko: ar3tko, ar4tko: ar4tko, ar5tko: ar5tko, ar6tko: ar6tko, ar7tko: ar7tko, ar8tko: ar8tko, ar9tko: ar9tko, ar10tko: ar10tko, ar11tko: ar11tko, ar12tko: ar12tko, draw: draw, bwins: bwins, bwinstko: bwinstko, bwinsplit: bwinsplit, bwinsunanimous: bwinsunanimous, br1tko: br1tko, br2tko: br2tko, br3tko: br3tko, br4tko: br4tko, br5tko: br5tko, br6tko: br6tko, br7tko: br7tko, br8tko: br8tko, br9tko: br9tko, br10tko: br10tko, br11tko: br11tko, br12tko: br12tko, event_date: event_date, event_location: event_location }),
      success: function(response) {
        if(response.indexOf('success') !== -1) {
            window.location = 'listcontests.php'
        }
      }
   }) 
  })
});