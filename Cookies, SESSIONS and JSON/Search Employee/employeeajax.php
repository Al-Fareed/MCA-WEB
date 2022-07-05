<!DOCTYPE HTML>
<html>

<head>
    <title>Read Records</title>
</head>

<body>
    <?php
    include("conn.php");
    ?>
    <?php
    $query = "select * from tb_text_book";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    //$result = $mysqli->query( $query );
    $num_results = $result->num_rows;
    $result->free();
    $mysqli->close();
    ?>
    <script type='text/javascript'>
        function user_suggestion() {
            var user = document.getElementById("user").value;
            var xhr;
            if (window.XMLHttpRequest) { // Mozilla, Safari, ...
                xhr = new XMLHttpRequest();
            } else if (window.ActiveXObject) { // IE 8 and older
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
            var data = "id=" + user;
            xhr.open("POST", "search.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send(data);
            xhr.onreadystatechange = display_data;

            function display_data() {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        //alert(xhr.responseText);
                        document.getElementById("suggestion").innerHTML = xhr.responseText;
                    } else {
                        alert('There was a problem with the request.');
                    }
                }
            }
        }
    </script>
    <h1>Search User Record</h1>
    <div>
        <form>
            <br /><br />
            <label for="book">Search User </label>
            <div>
                <input type="text" id="user" onKeyUp="user_suggestion()">
                <div id="suggestion"></div>
            </div>
            <!--<input name="submit" type="submit" value="Submit" />-->
        </form>
    </div>
</body>

</html>