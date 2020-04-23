<?php
include_once 'header.php';
?>

<h1 class="h3 mb-2 text-gray-800" id="agentTitle">Room</h1>
<div id="error" style="display:none;" class="alert alert-danger"></div>

<div class="row">
    <div class="col-lg-5">
        <div class="p-5">

            <form class="user">

                <div class="form-group">
                    <label for="roomName"><h6>Room ID:</h6></label>
                    <input type="text" class="form-control" id="roomName" aria-describedby="roomName">
                </div>
                <div class="form-group">
                    <label for="names"><h6>Agent Name:</h6></label>
                    <input type="text" class="form-control" id="names" aria-describedby="names">
                </div>
                <div class="form-group">
                    <label for="visitorName"><h6>Visitor Name:</h6></label>
                    <input type="text" class="form-control" id="visitorName" aria-describedby="visitorName">
                </div>
                <div class="form-group">
                    <label for="shortagent"><h6>Agent Short URL:</h6></label>
                    <input type="text" class="form-control" id="shortagent" aria-describedby="shortagent">
                </div>
                <div class="form-group">
                    <label for="shortvisitor"><h6>Visitor Short URL:</h6></label>
                    <input type="text" class="form-control" id="shortvisitor" aria-describedby="shortvisitor" >
                </div>
                <div class="form-group">
                    <label for="roomPass"><h6>Password:</h6></label>
                    <input type="text" class="form-control" id="roomPass" aria-describedby="roomPass" autocomplete="new-password">
                </div>
                <div class="form-group">
                    <label for="config"><h6>Config File:</h6></label>
                    <input type="text" class="form-control" id="config" aria-describedby="config" >
                </div>
                <div class="form-group">
                    <label for="datetime"><h6>Date/Time:</h6></label>
                    <input type="text" class="form-control" id="datetime" aria-describedby="datetime">
                </div>


                <div class="form-group">
                    <label for="last_name"><h6>Duration:</h6></label>
                    <select class="form-control" name="duration" id="duration"><option value="">-</option><option value="15">15</option><option value="30">30</option><option value="45">45</option></select>
                </div>

                <div class="form-group">
                    <h6>Disable</h6>

                    <div class="custom-control custom-checkbox">

                        <input type="checkbox" class="custom-control-input" id="disableVideo">
                        <label class="custom-control-label" for="disableVideo">Video</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="disableAudio">
                        <label class="custom-control-label" for="disableAudio">Audio</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="disableScreenShare">
                        <label class="custom-control-label" for="disableScreenShare">Screen Share</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="disableWhiteboard">
                        <label class="custom-control-label" for="disableWhiteboard">Whiteboard</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="disableTransfer">
                        <label class="custom-control-label" for="disableTransfer">File Transfer</label>
                    </div>
                </div>
                <div class="form-group">
                    <h6>Auto accept with</h6>

                    <div class="custom-control custom-checkbox">

                        <input type="checkbox" class="custom-control-input" id="autoAcceptVideo">
                        <label class="custom-control-label" for="autoAcceptVideo">Video</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="autoAcceptAudio">
                        <label class="custom-control-label" for="autoAcceptAudio">Audio</label>
                    </div>
                </div>


                <a href="javascript:void(0);" id="saveRoom" class="btn btn-primary btn-user btn-block">
                    Save
                </a>
                <hr>
                <a href="javascript:void(0);" id="generateLink" class="btn btn-primary btn-user btn-block">
                    Start New Video
                </a>
                <hr>
                <a href="javascript:void(0);" id="generateBroadcastLink" class="btn btn-primary btn-user btn-block">
                    Start New Broadcast
                </a>
                <hr>

            </form>

        </div>
    </div>

</div>

<?php
include_once 'footer.php';
