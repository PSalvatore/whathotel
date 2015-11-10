@extends('layouts.default')
@section('content')

    <div id="inputArea">
        <form name="updateDelete" action="users.jsp" method="get">
            <input type="hidden" name="deletePK"/>
        </form>
        <br/>
        <form name="updateForm" action="users.jsp" method="get">
            <input type="hidden"  name="webUserId" value="<%= webUserStringData.webUserId%>" />

            <table class="inputTable">
                <tr>
                    <td class="prompt">User Email:</td>
                    <td><input type="text" name="userEmail" size="45" value="<%= webUserStringData.userEmail%>" /></td>
                    <td class="error"><%=webUserValidate.getUserEmailMsg()%></td>
                </tr>
                <tr>
                    <td class="prompt">Password:</td>
                    <td><input type="password" name="userPw" size="45" value="<%= webUserStringData.userPw%>" /></td>
                    <td class="error"><%=webUserValidate.getUserPwMsg()%></td>
                </tr>
                <tr>
                    <td class="prompt">Retype Password:</td>
                    <td><input type="password" name="userPw2" size="45" value="<%= webUserStringData.userPw%>" /></td>
                    <td class="error"><%=webUserValidate.getUserPw2Msg()%></td>
                </tr>
                <tr>
                    <td class="prompt">Membership Fee:</td>
                    <td><input type="text" name="membershipFee" value="<%= webUserStringData.membershipFee%>" /></td>
                    <td class="error"><%=webUserValidate.getMembershipFeeMsg()%></td>
                <tr>
                    <td class="prompt">User Role:</td>
                    <td><input type="text" name="userRoleId" value="<%= webUserStringData.userRoleId%>" /></td>
                    <td class="error"><%=webUserValidate.getUserRoleMsg()%></td>
                </tr>
                <tr>
                    <td class="prompt">Birthday:</td>
                    <td><input type="text" name="birthday" value="<%= webUserStringData.birthday%>" /></td>
                    <td class="error"><%=webUserValidate.getBirthdayMsg()%></td>
                </tr>
                <tr>
                    <td class="prompt"><input type="submit" value="Update" /></td>
                    <td><input type="button" value="Clear Data" onclick="clearFields()"/></td>
                    <td id="message"><%=formMsg%></td>
                </tr>
            </table>
        </form>
    </div>

    <h1>Users 
        @if(Auth::check() && Auth::user()->username === 'admin')
            <a href="users/create" style="vertical-align: middle"><img src="{{ URL::to('/') }}/icons/Plus_sign.png"></a>
        @endif
    </h1>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @if(Auth::check() && Auth::user()->username === 'admin')
                    @foreach($users as $user)
                        <tr>
                            <td><a href={{ url('users/delete/'.$user->id) }}><img src="{{ URL::to('/') }}/icons/delete.png"></a>
                                {{$user->id}}
                            </td>
                            <td class="username_col">
                                {!! Form::open(array('url' => 'users/update/'.$user->id.'/username')) !!}
                                <img class="icon" id="icon{{$user->id}}" src="{{ URL::to('/') }}/icons/update.png">
                                <div class="text" id="text1">{{$user->username}}</div>
                                <div class="input-group edit" id="edit1">
                                    <input type="text" name="username" id="username" class="form-control" placeholder="{{$user->username}}">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default">Edit</button>
                                    </span>
                                </div>
                                {!! Form::close() !!}
                            </td>
                            <td class="username_col">
                                {!! Form::open(array('url' => 'users/update/'.$user->id.'/email')) !!}
                                <img class="icon" id="icon{{$user->id}}" src="{{ URL::to('/') }}/icons/update.png">
                                <div class="text" id="text2">{{$user->email}}</div>
                                <div class="input-group edit" id="edit2">
                                    <input type="text" name="email" id="email" class="form-control" placeholder="{{$user->email}}">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default">Edit</button>
                                    </span>
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @else
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <script language="Javascript" type="text/javascript">
        function setInputArea() {
            if (document.updateForm.webUserId.value !== null &&
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
