@extends('frontend.master')
@section('content')
<div align="center" style="padding:70px;">
    <table id="myTable2">
        <tr style="background-color:teal;">
            <th onclick="sortTable(0)" style="padding:10px; font-size:20px; color:black; cursor: pointer;">Doctor Name</th>
            <th onclick="sortTable(1)" style="padding:10px; font-size:20px; color:black; cursor: pointer;">Date</th>
            <th onclick="sortTable(2)" style="padding:10px; font-size:20px; color:black; cursor: pointer;">Status</th>
            <th style="padding:10px; font-size:20px; color:darkred;">Cancel Appointment</th>
        </tr>

        @foreach($appoint as $appoints)
        <tr style="background-color:greenyellow;" align="center">
            <td style="padding:10px; color:black;">{{$appoints->doctor}}</td>
            <td style="padding:10px; color:black;">{{$appoints->date}}</td>
            <td style="padding:10px; color:black;">{{$appoints->status}}</td>
            <td><a href="{{url('cancel_appoint',$appoints->id)}}"onclick="return confirm('Are you sure you want to cancel this appointment')" class="btn btn-danger">Cancel</a></td>
        </tr>
        @endforeach
        <script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable2");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc";
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>
    </table>
</div>
@stop