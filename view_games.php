<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>All Games</title>
    <link rel="stylesheet" href="style.css" />
    <style>
        /* Table styling consistent with previous design */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #16213e;
            border-radius: 10px;
            overflow: hidden;
            color: #f0f0f0;
        }
        th, td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #0f3460;
        }
        th {
            background: #e94560;
            font-weight: 700;
        }
        tr:hover {
            background-color: #0f3460;
        }
        p.header {
            background-color: #444;
            color: #ccc;
            text-align: center;
            padding: 15px 20px;
            font-weight: 700;
            border-radius: 8px;
            max-width: 1000px;
            margin: 30px auto 10px auto;
        }
        .container {
            background: #1a1a2e;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.4);
            padding: 30px 40px;
            max-width: 1000px;
            margin: 20px auto 60px auto;
            color: #f0f0f0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        footer {
            margin-top: 40px;
            text-align: center;
            font-size: 14px;
            color: #aaa;
            padding: 20px;
            border-top: 1px solid #222;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        footer a {
            color: #ff6f61;
            text-decoration: none;
            font-weight: 600;
        }
        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <p class="header">All Games Information</p>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "game_management";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("<p style='color:#ff7777;text-align:center;'>Connection failed: " . $conn->connect_error . "</p>");
        }

        $sql = "SELECT * FROM games";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Genre</th>
                        <th>Platform</th>
                        <th>Release Year</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row["id"]) . "</td>
                        <td>" . htmlspecialchars($row["title"]) . "</td>
                        <td>" . htmlspecialchars($row["genre"]) . "</td>
                        <td>" . htmlspecialchars($row["platform"]) . "</td>
                        <td>" . htmlspecialchars($row["release_year"]) . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p style='text-align:center;'>No games found.</p>";
        }

        $conn->close();
        ?>
    </div>

    <footer>
    <div style="display: flex; align-items: center; justify-content: center; gap: 15px; flex-wrap: wrap;">
        <img src="1000025856.png" alt="anonto deb" style="height: 40px; border-radius: 5px;">
        <div>
            This is developed by Anonto Deb Swopno, Student of Computer Science & Engineering of IUBAT.<br>
            © Copyright 2025, All Rights Reserved by Anonto Deb Swopno.<br>
            Contact on Facebook: 
            <a href="https://www.facebook.com/jeams.ad.71" target="_blank" rel="noopener noreferrer">Anonto Deb Swopno</a><br><br>
            Do not forget to subscribe to my YouTube channel: 
            <a href="https://youtube.com/@aimusicanonto?si=-zey6QvEyfwfjoFM" target="_blank" rel="noopener noreferrer">Ai Music</a>
        </div>
    </div>
</footer>

</body>
</html>
