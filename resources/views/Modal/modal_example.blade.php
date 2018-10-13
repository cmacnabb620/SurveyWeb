<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        /* Full-width input fields */
        /* Set a style for all buttons */
        button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        }
        button:hover {
        opacity: 0.8;
        }
        /* Extra styles for the cancel button */
        .cancelbtn {
        width: auto;
        padding: 8px 16px;
        background-color: #f44336;
        border-radius: 5px;
        }
        /* The Modal (background) */
        .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        padding-top: 40px;
        }
        /* Modal Content/Box */
        .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 50%; /* Could be more or less, depending on screen size */
        }
        /* The Close Button (x) */
        .close {
        position: absolute;
        right: 25px;
        top: 0;
        color: #000;
        font-size: 35px;
        font-weight: bold;
        }
        .close:hover,
        .close:focus {
        color: red;
        cursor: pointer;
        }
        /* Add Zoom Animation */
        .animate {
        -webkit-animation: animatezoom 0.6s;
        animation: animatezoom 0.6s
        }
        @-webkit-keyframes animatezoom {
        from {-webkit-transform: scale(0)}
        to {-webkit-transform: scale(1)}
        }
        
        @keyframes animatezoom {
        from {transform: scale(0)}
        to {transform: scale(1)}
        }
        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
        span.psw {
        display: block;
        float: none;
        }
        .cancelbtn {
        width: 100%;
        }
        }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Modal Login Form</h2>
            <button onclick="document.getElementById('my-modal').style.display='block'" style="width:auto;">Login</button>

            <a href="#" data-toggle="modal" data-target="#my-modal"><i onclick="document.getElementById('my-modal')" clbuttonss="icon-plus-sign"></i>&nbsp;Add new survey type</a>

            <div id="my-modal" class="modal">
                <div class="modal-content animate">
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                              <label class="control-label col-sm-3" for="name">Name:</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-3" for="email">Email:</label>
                              <div class="col-sm-8">
                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-3" for="pwd">Password:</label>
                              <div class="col-sm-8">          
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-3" for="select">Select:</label>
                              <div class="col-sm-8">          
                                    <select class="form-control" id="sel1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                              </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="comment">Address:</label>
                                <div class="col-sm-8">  
                                    <textarea class="form-control" rows="4" id="comment"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row col-sm-offset-3">        
                                    <div class="col-sm-3">
                                      <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    <div class="col-sm-3">
                                     <button type="button" onclick="document.getElementById('my-modal').style.display='none'" class="btn btn-danger">Cancel</button>
                                  </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <p>footer</p>
                    </div>
                </div>
            </div>
        </div>
        <script>
        // Get the modal
        var modal = document.getElementById('my-modal');
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == modal) {
        modal.style.display = "none";
        }
        }
        </script>
    </body>
</html>