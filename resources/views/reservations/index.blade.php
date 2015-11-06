@extends('layouts.default')
@section('content')


        <form name="updateDelete" action="assoc.jsp" method="get">
            <input type="hidden" name="deletePK">
        </form>

        <a href="reservations/create"><h3>Make Reservation</h3></a>

        <h1>Reservations</h1>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                      <th>ID</th>
                      <th>Hotel ID</th>
                      <th>Nights</th>
                      <th>Start Date</th>
                      <th>Room #</th>
                      <th>Suite</th>
                    </tr>
                </thead>
              @foreach($reservations as $reservation)
              <tbody>
                    <tr>
                      <td>{{$reservation->reservation_id}}</td>
                      <td>{{$reservation->hotel_id}}</td>
                      <td>{{$reservation->nights_qty}}</td>
                      <td>{{$reservation->start_date}}</td>
                      <td>{{$reservation->room_number}}</td>
                      <td>{{$reservation->suite}}</td>
                    </tr>
                </tbody>
              @endforeach
            </table>
        </div>

        <script language="Javascript" type="text/javascript">

            function setInputArea() {
                if (document.updateForm.webUserId.value != null &&
                        document.updateForm.webUserId.value.length > 0) {
                    document.getElementById("inputArea").style.display = "block";
                }
            }

            function deleteRow(primaryKey) {
                if (confirm("Do you really want to delete web user " + primaryKey + "?")) {
                    document.updateDelete.deletePK.value = primaryKey;
                    document.updateDelete.submit();
                }
            }

            function assocAdd(primaryKey) {
                document.otherIDtextbox.otherID.value = primaryKey;
                document.otherIDtextbox.submit();
            }

            // Note: These next 9 lines of javascript are global (not in any funtion).
            // This is needed for asynchronous calls.
            //
            // Make the XMLHttpRequest Object
            var httpReq;
            if (window.XMLHttpRequest) {
                httpReq = new XMLHttpRequest();  //For Firefox, Safari, Opera
            }
            else if (window.ActiveXObject) {
                httpReq = new ActiveXObject("Microsoft.XMLHTTP");         //For IE 5+
            } else {
                alert('ajax not supported');
            }

            // this is ajax call to server,
            // asking for all the data associated with a particular primary key
            function sendRequest(primaryKey) {
                alert('sending request for web user ' + primaryKey);
                httpReq.open("GET", "get_webUser_JSON.jsp?primaryKey=" + primaryKey);
                httpReq.onreadystatechange = handleResponse;
                httpReq.send(null);
            }

            function handleResponse() {
                document.getElementById("inputArea").style.display = "block";
                //alert('handling response');
                if (httpReq.readyState == 4 && httpReq.status == 200) {
                    //alert('handling response ready 4 status 200');
                    var response = httpReq.responseText;
                    alert("response is " + response);

                    // be careful -- field names on the document are case sensative
                    // field names extracted from the JSON response are also case sensative.
                    var webUserObj = eval(response);

                    //alert ("webUserId is "+webUserObj.webUserId);
                    document.updateForm.webUserId.value = webUserObj.webUserId;

                    //alert ("userEmail is "+webUserObj.userEmail);
                    document.updateForm.userEmail.value = webUserObj.userEmail;

                    //alert ("userPw is "+webUserObj.userPw);
                    document.updateForm.userPw.value = webUserObj.userPw;

                    //alert ("userPw2 is "+webUserObj.userPw2);
                    document.updateForm.userPw2.value = webUserObj.userPw2;

                    //alert ("membershipFee is "+webUserObj.membershipFee);
                    document.updateForm.membershipFee.value = webUserObj.membershipFee;

                    //alert ("userRoleId is "+webUserObj.userRoleId);
                    document.updateForm.userRoleId.value = webUserObj.userRoleId;

                    //alert ("birthday is "+webUserObj.birthday);
                    document.updateForm.birthday.value = webUserObj.birthday;

                    // alert ("record status is "+webUserObj.recordStatus);
                }
            }

            function clearFields() {
                //alert("clearing...")
                document.getElementById("inputArea").style.display = "none";

                document.updateForm.webUserId.value = "";
                document.updateForm.userEmail.value = "";
                document.updateForm.userPw.value = "";
                document.updateForm.userPw2.value = "";
                document.updateForm.membershipFee.value = "";
                document.updateForm.userRoleId.value = "";
                document.updateForm.birthday.value = "";
            }
        </script>
@stop