@extends('layouts.default')
@section('content')

    <div id="inputArea">
        <form name="otherIDtextbox" action="other.jsp">
            <input type="hidden" name="otherID"/>
        </form>
        <form name="updateDelete" action="other.jsp" method="get">
            <input type="hidden"  name="deletePK"/>
        </form>
        <br/>
        <form name="updateForm" action="other.jsp" method="get">
            <input type="hidden"  name="hotelId" value="<%= hotelStringData.hotelId%>" />
            <br/>
            <table class="inputTable">
                <tr>
                    <td class="prompt">Hotel Name:</td>
                    <td><input type="text" name="hotelname" size="45" value="<%= hotelStringData.hotelname%>" /></td>
                    <td class="error"><%=hotelValidate.gethotelnameMsg()%></td>
                </tr>
                <tr>
                    <td class="prompt">Nightly Price:</td>
                    <td><input type="text" name="nightlyprice" size="45" value="<%= hotelStringData.nightlyprice%>" /></td>
                    <td class="error"><%=hotelValidate.getnightlypriceMsg()%></td>
                </tr>
                <tr>
                    <td class="prompt">Valet:</td>
                    <td><input type="text" name="valet" size="45" value="<%= hotelStringData.valet%>" /></td>
                    <td class="error"><%=hotelValidate.getvaletMsg()%></td>
                </tr>
                <tr>
                    <td class="prompt">Image Name:</td>
                    <td><input type="text" name="imagename" value="<%= hotelStringData.imagename%>" /></td>
                    <td class="error"><%=hotelValidate.getimagenameMsg()%></td>
                </tr>
                <tr>
                    <td class="prompt"><input type="submit" value="Update" /></td>
                    <td><input type="button" value="Clear Data" onclick="clearFields()"/></td>
                    <td id="message"><%=formMsg%></td>
                </tr>
            </table>
        </form>
    </div>

    <a href="hotels/create"><h3>Add Hotel</h3></a>

    <h1>Hotels</h1>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Nightly Price</th>
                    <th>Valet</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
            @if(Auth::check() && Auth::user()->username === 'admin')
                @foreach($hotels as $hotel)
                    <tr>
                        <td><a href={{ url('hotels/delete/'.$hotel->hotel_id) }}><img src="{{ URL::to('/') }}/icons/delete.png"></a>
                            {{$hotel->hotel_id}}
                        </td>
                        <td class="name_col">
                            {!! Form::open(array('url' => 'hotels/update/'.$hotel->hotel_id.'/hotel_name')) !!}
                            <img class="icon" id="icon{{$hotel->hotel_id}}" src="{{ URL::to('/') }}/icons/update.png">
                            <div class="text" id="text1">{{$hotel->hotel_name}}</div>
                            <div class="input-group edit" id="edit1">
                                <input type="text" name="hotel_name" id="hotel_name" class="form-control" placeholder="{{$hotel->hotel_name}}">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">Edit</button>
                                </span>
                            </div>
                            {!! Form::close() !!}
                        </td>
                        <td class="price_col">
                            {!! Form::open(array('url' => 'hotels/update/'.$hotel->hotel_id.'/nightly_price')) !!}
                            <img class="icon" id="icon{{$hotel->hotel_id}}" src="{{ URL::to('/') }}/icons/update.png">
                            <div class="text" id="text2">{{$hotel->nightly_price}}</div>
                            <div class="input-group edit" id="edit2">
                                <input type="text" name="nightly_price" id="nightly_price" class="form-control" placeholder="{{$hotel->nightly_price}}" >
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">Edit</button>
                                </span>
                            </div>
                            {!! Form::close() !!}
                        </td>
                        <td class="valet_col">
                            {!! Form::open(array('url' => 'hotels/update/'.$hotel->hotel_id.'/valet')) !!}
                            <img class="icon" id="icon{{$hotel->hotel_id}}" src="{{ URL::to('/') }}/icons/update.png">
                            <div class="text" id="text3">{{$hotel->valet}}</div>
                            <div class="input-group edit" id="edit3">
                                <input type="text" name="valet" id="valet" class="form-control" placeholder="{{$hotel->valet}}">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">Edit</button>
                                </span>
                            </div>
                            {!! Form::close() !!}
                        </td>
                        <td class="img_col">
                            {!! Form::open(array('url' => 'hotels/update/'.$hotel->hotel_id.'/image_name')) !!}
                            <img class="icon" id="icon{{$hotel->hotel_id}}" src="{{ URL::to('/') }}/icons/update.png">
                            <div class="text" id="text4">{{$hotel->image_name}}</div>
                            <div class="input-group edit" id="edit4">
                                <input type="text" name="image_name" id="image_name" class="form-control" placeholder="{{$hotel->image_name}}">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">Edit</button>
                                </span>
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            @else
                @foreach($hotels as $hotel)
                    <tr>
                        <td>{{$hotel->hotel_id}}</td>
                        <td>{{$hotel->hotel_name}}</td>
                        <td>{{$hotel->nightly_price}}</td>
                        <td>{{$hotel->valet}}</td>
                        <td>{{$hotel->image_name}}</td>
                    </tr>
                @endforeach
            @endif
          </tbody>
        </table>
    </div>

    <script language="Javascript" type="text/javascript">

        function setInputArea() {
            if (document.updateForm.hotelId.value !== null &&
                    document.updateForm.hotelId.value.length > 0) {
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
            alert('sending request for hotel ' + primaryKey);
            httpReq.open("GET", "get_hotel_JSON.jsp?primaryKey=" + primaryKey);
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
                var hotelObj = eval(response);

                //alert ("webUserId is "+webUserObj.webUserId);
                document.updateForm.hotelId.value = hotelObj.hotelId;

                //alert ("userEmail is "+webUserObj.userEmail);
                document.updateForm.hotelname.value = hotelObj.hotelname;

                //alert ("userPw is "+webUserObj.userPw);
                document.updateForm.nightlyprice.value = hotelObj.nightlyprice;

                //alert ("userPw2 is "+webUserObj.userPw2);
                document.updateForm.valet.value = hotelObj.valet;

                //alert ("membershipFee is "+webUserObj.membershipFee);
                document.updateForm.imagename.value = hotelObj.imagename;

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
