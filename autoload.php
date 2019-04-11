<?php
	if (isset($_POST['search'])) {
		$response = "<ul><li>No data found!</li></ul>";

		include 'dbconnect.php';
		$q = $conn->real_escape_string($_POST['q']);

		$sql = $conn->query("SELECT name FROM customers WHERE name LIKE '%$q%'");
		if ($sql->num_rows > 0) {
			$response = "<ul>";

			while ($data = $sql->fetch_array())
				$response .= "<li>" . $data['name'] . "</li>";

			$response .= "</ul>";
		}


        exit($response);
        $conn->close();
	}
?>
<html>
    <head>
        <title>jQuery Autocomplete</title>
        <style type="text/css">
             ul {
               position:relative;
                list-style: none;
                padding: 0px;
                margin-bottom: 10px;
               
            }

             ul {
               
            }
             li{
                padding:5px;
                overflow:hidden;
            }

             li:hover {
                 padding:7px;
                color: silver;
                background: #0088cc;
            }
        </style>
    </head>
    <body>
        <div id="response"></div>
        <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#name").keyup(function () {
                    var query = $("#name").val();

                    if (query.length > 0) {
                        $.ajax(
                            {
                                url: 'autoload.php',
                                method: 'POST',
                                data: {
                                    search: 1,
                                    q: query
                                },
                                success: function (data) {
                                    $("#response").html(data);
                                },
                                dataType: 'text'
                            }
                        );
                    }
                });

                $(document).on('click', 'li', function () {
                    var name = $(this).text();
                    $("#name").val(name);
                    $("#response").html("");
                });
            });
            
        </script>
    </body>
</html>