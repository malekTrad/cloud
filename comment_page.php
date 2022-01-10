<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("header.php");
    include("dbconnect.php"); ?>
</head>
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <!-- End of Sidebar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php
            include("topbar.php");
            ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="card shadow ">
                    <!-- Page Heading -->
                    <!-- Page Heading -->

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-12 col-lg-12">

                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Ajouter votre avis sur le site</h6>

                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <form method="post" onsubmit="return add_comment()" id="prospects_form">
                                
                                    <div class="form-group row">
                                        <div class="col-sm-2 mb-3 mb-sm-0">
                                            <lable>Nom</lable>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" id="NAME" class="form-control "
                                                
                                                   required>
                                            <br/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-2 mb-3 mb-sm-0">
                                            <lable> Message </lable>
                                        </div>
                                        <div class="col-sm-9">
                                        <textarea id="txtArea" class="form-control" required></textarea>
                                            <br/>
            
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-3 mb-3 mb-sm-0">
                                        </div>
                                        <div class="col-sm-2 mb-3 mb-sm-0">
                                            <button type="submit"

                                                    id="submit"
                                                    class="btn btn-primary btn-user btn-block">
                                                Ajouter
                                            </button>
                                        </div>
                                        <div class="col-sm-2 mb-3 mb-sm-0">
                                            <button type="reset" class="btn btn-google btn-user btn-block">
                                                Annuler
                                            </button>
                                        </div>


                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Area Chart -->

                    </div>
                    <div class="row">
                        <div class="col-sm-3 mb-3 mb-sm-3"></div>
                        <div class="col-sm-9 mb-9 mb-sm-9">
                            <table id="stream_table" class="display table" style="border:1" width="100%" >
                                <thead>
                                <tr>
                                    <th style="width:20%  !important;">Nom</th>
                                    <th>Message </th>
                                </tr>
                                </thead>
                                <tbody id="tbody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pie Chart -->
        </div>
        <!-- End of Main Content -->
        <?php
        include("footer.php");
        ?>
    </div>
    <!-- End of Content Wrapper -->
    <div id="script"></div>
    <div id="popup"></div>

    <script>
        $(document).ready(function () {
            refresh_table()
        });
        function refresh_table() {
            var dataString = 'op=refresh_table'  ;
            $.ajax({
                type: "post",
                url: "test2.php",
                data: dataString,
                cache: false,
                success: function (html) {
                    $('#tbody').html(html);
                  
                }
            });
        }
        function add_comment() {
            var name = document.getElementById('NAME').value;
            var message = $("#txtArea").val();
            var dataString = '&name=' + name + '&message=' + message + '&op=add_comment'  ;
            $.ajax({
                type: "post",
                url: "test2.php",
                data: dataString,
                cache: false,
                success: function (html) {
                    $('#popup').html(html);
                    refresh_table()
                    document.getElementById('NAME').value = "";
                    $("#txtArea").val('');
                }
            });
        }
        $("#prospects_form").submit(function (e) {
            e.preventDefault();
        });


    </script>
</body>

</html>