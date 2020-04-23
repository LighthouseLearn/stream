<div id="chats-lsv-admin"></div>
<script>

    var deleteItem = function (itemid, type) {
        if (type === 'room') {
            $.ajax({
                type: 'POST',
                url: '../server/script.php',
                data: {'type': 'deleteroom', 'agentId': agentId, 'roomId': itemid}
            })
                    .done(function (data) {
                        location.reload();
                    })
                    .fail(function () {
                        console.log(false);
                    });
        } else if (type === 'agent') {
            $.ajax({
                type: 'POST',
                url: '../server/script.php',
                data: {'type': 'deleteagent', 'agentId': itemid}
            })
                    .done(function (data) {
                        location.reload();
                    })
                    .fail(function () {
                        console.log(false);
                    });
        } else if (type === 'user') {
            $.ajax({
                type: 'POST',
                url: '../server/script.php',
                data: {'type': 'deleteuser', 'userId': itemid}
            })
                    .done(function (data) {
                        location.reload();
                    })
                    .fail(function () {
                        console.log(false);
                    });
        }
    };
    var isAdmin = true;
    var roomId = false;
<?php if ($_SESSION["tenant"] == 'lsv_mastertenant') { ?>
        var agentId = false;
<?php } else { ?>
        var agentId = "<?php echo $_SESSION["tenant"]; ?>";
<?php } ?>
</script>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; LiveSmart Video Chat 2019-<?php echo date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<script src="js/detect.js"></script>

<?php if ($basename == 'agent.php') { ?>


    <script>

    <?php
    if (isset($_GET['id'])) {
        ?>
        $('#usernameDiv').hide();
        <?php
    } else {
        ?>
        $('#usernameDiv').show();
        <?php
    }
    ?>
    jQuery(document).ready(function ($) {
        $('#error').hide();
        $('#saveAgent').click(function (event) {
    <?php
    if (isset($_GET['id'])) {
        ?>
                var dataObj = {'type': 'editagent', 'agentId': <?php echo $_GET['id']; ?>, 'firstName': $('#first_name').val(), 'lastName': $('#last_name').val(), 'tenant': $('#tenant').val(), 'email': $('#email').val(), 'password': $('#password').val(), 'usernamehidden': $('#usernamehidden').val()};
        <?php
    } else {
        ?>
                var dataObj = {'type': 'addagent', 'username': $('#username').val(), 'firstName': $('#first_name').val(), 'lastName': $('#last_name').val(), 'tenant': $('#tenant').val(), 'email': $('#email').val(), 'password': $('#password').val()};
        <?php
    }
    ?>
            $.ajax({
                type: 'POST',
                url: '../server/script.php',
                data: dataObj
            })
                    .done(function (data) {
                        if (data) {
                            location.href = 'agents.php';
                        } else {
                            $('#error').show();
                            $('#error').html('Error while saving the agent.');
                        }
                    })
                    .fail(function () {
                    });
        });


        $.ajax({
            type: 'POST',
            url: '../server/script.php',
            data: {'type': 'getadmin', 'id': <?php echo (int) @$_GET['id'] ?>}
        })
                .done(function (data) {
                    if (data) {
                        data = JSON.parse(data);
                        $('#agentTitle').html(data.first_name + ' ' + data.last_name);
                        $('#usernamehidden').val(data.username);
                        $('#username').val(data.username);
                        if (data.password) {
                            $('#leftblank').html(' (If left blank will not be changed)');
                        }
                        //$('#password').val(data.password);
                        $('#first_name').val(data.first_name);
                        $('#last_name').val(data.last_name);
                        $('#tenant').val(data.tenant);
                        $('#email').val(data.email);
                    }
                })
                .fail(function (e) {
                    console.log(e);
                });


    });
    </script>

    <?php
}
if ($basename == 'user.php') {
    ?>


    <script>


        jQuery(document).ready(function ($) {
            $('#error').hide();
            $('#saveUser').click(function (event) {
    <?php
    if (isset($_GET['id'])) {
        ?>
                    var name = $('#first_name').val() + ' ' + $('#last_name').val();
                    var dataObj = {'type': 'edituser', 'userId': <?php echo $_GET['id']; ?>, 'name': name, 'firstName': $('#first_name').val(), 'lastName': $('#last_name').val(), 'username': $('#email').val(), 'password': $('#password').val()};
        <?php
    } else {
        ?>
                    var dataObj = {'type': 'adduser', 'username': $('#email').val(), 'firstName': $('#first_name').val(), 'lastName': $('#last_name').val(), 'name': $('#first_name').val() + ' ' + $('#last_name').val(), 'password': $('#password').val()};
        <?php
    }
    ?>
                $.ajax({
                    type: 'POST',
                    url: '../server/script.php',
                    data: dataObj
                })
                        .done(function (data) {
                            if (data) {
                                location.href = 'users.php';
                            } else {
                                $('#error').show();
                                $('#error').html('Error while saving the user.');
                            }
                        })
                        .fail(function () {
                        });
            });


            $.ajax({
                type: 'POST',
                url: '../server/script.php',
                data: {'type': 'getuser', 'id': <?php echo (int) @$_GET['id'] ?>}
            })
                    .done(function (data) {
                        if (data) {
                            data = JSON.parse(data);
                            $('#userTitle').html(data.name);
                            $('#username').val(data.username);
                            if (data.password) {
                                $('#leftblank').html(' (If left blank will not be changed)');
                            }
                            //$('#password').val(data.password);
                            if (!data.first_name && !data.last_name) {
                                var name = data.name.split(' ');
                                data.first_name = name[0];
                                data.last_name = name[1];
                            }
                            $('#first_name').val(data.first_name);
                            $('#last_name').val(data.last_name);
                            $('#email').val(data.username);
                        }
                    })
                    .fail(function (e) {
                        console.log(e);
                    });


        });
    </script>

    <?php
}
if ($basename == 'agents.php') {
    ?>
    <script>

        jQuery(document).ready(function ($) {

            $.ajax({
                type: 'POST',
                url: '../server/script.php',
                data: {'type': 'getagents'}
            })
                    .done(function (data) {
                        if (data) {
                            var result = JSON.parse(data);
                            $.each(result, function (i, item) {

                                if (item.is_master == 1) {
                                    var deleteEditLink = '<a href="agent.php?id=' + item.agent_id + '">Edit</a>';
                                } else {
                                    deleteEditLink = '<a href="agent.php?id=' + item.agent_id + '">Edit</a> | <a href="javascript:void(0);" id="deleteagent' + item.agent_id + '">Delete</a>';
                                }
                                $('<tr>').append(
                                        $('<td>').text(item.username),
                                        $('<td>').text(item.first_name + ' ' + item.last_name),
                                        $('<td>').text(item.tenant),
                                        $('<td>').text(item.email),
                                        $('<td>').html(deleteEditLink)
                                        ).appendTo('#agents_table');
                                $('#deleteagent' + item.agent_id).on('click', function () {
                                    deleteItem(item.agent_id, 'agent');
                                });

                            });
                            $('#agents_table').DataTable();
                        }
                    })
                    .fail(function (e) {
                        console.log(e);
                    });


        });

    </script>

    <?php
}
if ($basename == 'users.php') {
    ?>
    <script>

        jQuery(document).ready(function ($) {

            $.ajax({
                type: 'POST',
                url: '../server/script.php',
                data: {'type': 'getusers'}
            })
                    .done(function (data) {
                        if (data) {
                            var result = JSON.parse(data);
                            $.each(result, function (i, item) {
                                var deleteEditLink = '<a href="user.php?id=' + item.user_id + '">Edit</a> | <a href="javascript:void(0);" id="deleteuser' + item.user_id + '">Delete</a>';

                                $('<tr>').append(
                                        $('<td>').text(item.name),
                                        $('<td>').text(item.username),
                                        $('<td>').html(deleteEditLink)
                                        ).appendTo('#users_table');
                                $('#deleteuser' + item.user_id).on('click', function () {
                                    deleteItem(item.user_id, 'user');
                                });

                            });
                            $('#users_table').DataTable();

                        }
                    })
                    .fail(function (e) {
                        console.log(e);
                    });

        });
    </script>

    <?php
}
if ($basename == 'rooms.php') {
    ?>
    <script>

        jQuery(document).ready(function ($) {

            $.ajax({
                type: 'POST',
                url: '../server/script.php',
                data: {'type': 'getrooms', 'agentId': agentId}
            })
                    .done(function (data) {
                        if (data) {
                            var result = JSON.parse(data);
                            var getCurrentDateFormatted = function (date) {
                                var currentdate = new Date(date);
                                if (currentdate.getDate()) {
                                    return ('0' + currentdate.getDate()).slice(-2) + "/"
                                            + ('0' + (currentdate.getMonth() + 1)).slice(-2) + "/"
                                            + currentdate.getFullYear() + " "
                                            + ('0' + currentdate.getHours()).slice(-2) + '.' + ('0' + currentdate.getMinutes()).slice(-2);
                                } else {
                                    return '';
                                }
                            };

                            $.each(result, function (i, item) {
                                var datetimest = '';
                                if (item.datetime) {
                                    datetimest = getCurrentDateFormatted(item.datetime) + ' / ' + item.duration;
                                }
                                $('<tr>').append(
                                        $('<td>').text(item.roomId),
                                        $('<td>').text(item.agent),
                                        $('<td>').text(item.visitor),
                                        $('<td>').html('<a target="_blank" title="Conference agent URL" href="' + item.agenturl + '"><?php echo $actual_link; ?>' + item.shortagenturl + '</a><br/><a title="Broadcast agent URL" target="_blank" href="' + item.agenturl_broadcast + '"><?php echo $actual_link; ?>' + item.shortagenturl_broadcast + '</a>'),
                                        $('<td>').html('<a target="_blank" title="Conference visitor URL" href="' + item.visitorurl + '"><?php echo $actual_link; ?>' + item.shortvisitorurl + '</a><br/><a title="Broadcast visitor URL" target="_blank" href="' + item.visitorurl_broadcast + '"><?php echo $actual_link; ?>' + item.shortvisitorurl_broadcast + '</a>'),
                                        $('<td>').text(datetimest),
                                        $('<td>').html('<a href="javacript:void(0);" id="deleteroom' + item.room_id + '">Delete</a>')
                                        ).appendTo('#rooms_table');
                                $('#deleteroom' + item.room_id).on('click', function () {
                                    deleteItem(item.room_id, 'room');
                                });
                            });
                            $('#rooms_table').DataTable();

                        }
                    })
                    .fail(function () {
                        console.log(false);
                    });

        });

    </script>

    <?php
}
if ($basename == 'chats.php') {
    ?>
    <script>

        jQuery(document).ready(function ($) {

            $.ajax({
                type: 'POST',
                url: '../server/script.php',
                data: {'type': 'getchats', 'agentId': agentId}
            })
                    .done(function (data) {
                        if (data) {
                            var result = JSON.parse(data);


                            $.each(result, function (i, item) {
                                var openModal = '<div class="modal fade" id="ex' + item.room_id + '" tabindex="-1" role="dialog" aria-labelledby="ex' + item.room_id + '" aria-hidden="true"><div class="modal-dialog modal-lgr" role="document"><button type="button" data-toggle="modal" class="closeDocumentModal" data-target="#ex' + item.room_id + '" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button><div class="modal-content">' + item.messages + '</div>     </div> </div><a href="" class="btn fa fa-comments" data-toggle="modal" data-target="#ex' + item.room_id + '"></a>';
                                $('<tr>').append(
                                        $('<td>').text(item.date_created),
                                        $('<td>').text(item.room_id),
                                        $('<td>').html(openModal),
                                        $('<td>').text(item.agent),
                                        ).appendTo('#chats_table');

                            });
                            $('#chats_table').DataTable({
                                "pagingType": "full_numbers",
                                "order": [[0, 'desc']],
                            });

                        }
                    })
                    .fail(function (e) {
                        console.log(e);
                    });

        });

    </script>

    <?php
}
if ($basename == 'dash.php') {
    ?>
    <script>

        jQuery(document).ready(function ($) {

            $.ajax({
                type: 'POST',
                url: '../server/script.php',
                data: {'type': 'getrooms', 'agentId': agentId}
            })
                    .done(function (data) {
                        if (data) {
                            var result = JSON.parse(data);
                            $('#roomsCount').html(result.length);

                        }
                    })
                    .fail(function () {
                        console.log(false);
                    });
            $.ajax({
                type: 'POST',
                url: '../server/script.php',
                data: {'type': 'getagents', 'agentId': agentId}
            })
                    .done(function (data) {
                        if (data) {
                            var result = JSON.parse(data);
                            $('#agentsCount').html(result.length);

                        }
                    })
                    .fail(function () {
                        console.log(false);
                    });
            $.ajax({
                type: 'POST',
                url: '../server/script.php',
                data: {'type': 'getusers', 'agentId': agentId}
            })
                    .done(function (data) {
                        if (data) {
                            var result = JSON.parse(data);
                            $('#usersCount').html(result.length);

                        }
                    })
                    .fail(function () {
                        console.log(false);
                    });

            $.ajaxSetup({cache: false});
            $.getJSON('https://www.new-dev.com/version/version.json', function (data) {
                if (data) {
                    var currentVersion = '<?php echo $currentVersion; ?>';
                    var newNumber = data.version.split('.');
                    var curNumber = currentVersion.split('.');

                    var isNew = false;

                    if (curNumber[0] < newNumber[0]) {
                        isNew = true;
                    }
                    if (curNumber[0] == newNumber[0] && curNumber[1] < newNumber[1]) {
                        isNew = true;
                    }
                    if (curNumber[0] == newNumber[0] && curNumber[1] == newNumber[1] && curNumber[2] < newNumber[2]) {
                        isNew = true;
                    }

                    if (isNew) {

                        $('#remoteVersion').html('There is a new version of LiveSmart Video Chat: ' + data.version + '<br/><br/>New things: <br/>' + data.text);
                    } else {
                        $('#remoteVersion').html('Your version is up-to-date.');
                    }

                } else {
                    $('#remoteVersion').html('Cannot connect to LiveSmart!');
                }
            });

        });

    </script>

    <?php
}
if ($basename == 'room.php') {
    ?>
    <script>


        var agentUrl, visitorUrl, sessionId, shortAgentUrl, shortVisitorUrl, agentBroadcastUrl, viewerBroadcastLink, shortAgentUrl_broadcast, shortVisitorUrl_broadcast;

        jQuery(document).ready(function ($) {
            $('#error').hide();
            $('#saveRoom').on('click', function () {
                generateLink();
                var datetime = ($('#datetime').val()) ? new Date($('#datetime').val()).toISOString() : '';
                $.ajax({
                    type: 'POST',
                    url: '../server/script.php',
                    data: {'type': 'scheduling', 'agentId': agentId, 'agent': $('#names').val(), 'agenturl': agentUrl, 'visitor': $('#visitorName').val(), 'visitorurl': visitorUrl,
                        'password': $('#roomPass').val(), 'session': sessionId, 'datetime': datetime, 'duration': $('#duration').val(), 'shortVisitorUrl': shortVisitorUrl, 'shortAgentUrl': shortAgentUrl,
                        'agenturl_broadcast': agentBroadcastUrl, 'visitorurl_broadcast': viewerBroadcastLink, 'shortVisitorUrl_broadcast': shortVisitorUrl_broadcast, 'shortAgentUrl_broadcast': shortAgentUrl_broadcast}
                })
                        .done(function (data) {
                            if (data == 200) {
                                location.href = 'rooms.php';
                            } else {
                                $('#error').show();
                                $('#error').html('Error while saving the room.');
                            }
                        })
                        .fail(function () {
                            $('#error').show();
                            $('#error').html('Error while saving the room.');
                        });
            });



            $('#generateLink').on('click', function () {
                generateLink(false);
                window.open(agentUrl);
                var text = $('#generateLinkModal').html();
                $('#generateLinkModal').html(text.replace('[generateLink]', visitorUrl));
                $('#generateLinkModal').modal('toggle');
            });

            //            $('#generateLinkModal').on($.modal.CLOSE, function () {
            //                var text = $('#generateLinkModal').html();
            //                $('#generateLinkModal').html(text.replace(visitorUrl, '[generateLink]'));
            //            });

            $('#generateBroadcastLink').on('click', function () {
                generateLink(true);
                window.open(agentUrl);
                var text = $('#generateBroadcastLinkModal').html();
                $('#generateBroadcastLinkModal').html(text.replace('[generateBroadcastLink]', viewerBroadcastLink));
                $('#generateBroadcastLinkModal').modal('toggle');
            });

            //            $('#generateBroadcastLinkModal').on($.modal.CLOSE, function () {
            //                var text = $('#generateBroadcastLinkModal').html();
            //                $('#generateBroadcastLinkModal').html(text.replace(viewerBroadcastLink, '[generateBroadcastLink]'));
            //            });

            var d = new Date();
            //            $('#datetime').datetimepicker({
            //                timeFormat: 'h:mm TT',
            //                stepHour: 1,
            //    //                        stepMinute: 15,
            //                controlType: 'select',
            //                hourMin: 8,
            //                hourMax: 21,
            //                minDate: new Date(d.getFullYear(), d.getMonth(), d.getDate(), d.getHours(), 0),
            //                oneLine: true
            //            });
            $('#datetime').datetimepicker({

                format: 'MM/DD/YYYY HH:mm',
                minDate: new Date(d.getFullYear(), d.getMonth(), d.getDate(), d.getHours(), 0),

                icons: {
                    time: 'fa fa-clock',
                    date: 'fa fa-calendar',
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down',
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-check',
                    clear: 'fa fa-trash',
                    close: 'fa fa-times'
                }
            });

        });

    </script>

<?php } ?>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/bootstrap-datetimepicker.js"></script>
<script src="<?php echo $actual_link; ?>js/loader.v2.js" data-source_path="<?php echo $actual_link; ?>" ></script>
</body>

</html>