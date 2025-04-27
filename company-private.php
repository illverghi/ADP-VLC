<?php
    session_start();
    include_once "db.php";

    /*
    if (isset($_SESSION['codice'])) {
        $codice = htmlspecialchars($_SESSION['codice'], ENT_QUOTES, 'UTF-8');
        echo "<h1>Welcome, company n. $codice!</h1>";
    } else {
        echo "<h1>Cod not found in session.</h1>";
    }
        */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Company Private Area</title>
    <link rel="stylesheet" href="/ADP-VLC/style/private-company.css">
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
</head>
<body>
    <header>
        <div id="toolbar">
            <div id="toolbar-logo">
                <img src="/ADP-VLC/style/drawable/logoBeeEfficient(2).png" alt="Logo" width="80" height="30">
            </div>
            |
            <a href="">
                <div class="toolbar-item">
                    Aggiungi Dipendente
                </div>
            </a>
            |
            <a href="">
                <div class="toolbar-item">
                    Chi Siamo?
                </div>
            </a>
            
        </div>
    </header>
    <div id="containerCompanyName">
        <h1><?php echo $_SESSION["nome"] ?></h1>
    </div>
    <table id="employeeTable">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Codice Fiscale</th>
                <th>Data di Nascita</th>
                <th>Data di Assunzione</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT * FROM dipendenti WHERE codAzienda = $_SESSION[codice]";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("s", $_SESSION["codice"]);
                $stmt->execute();
                $result = $stmt->get_result();

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['nome'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>" . htmlspecialchars($row['cognome'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>" . htmlspecialchars($row['codFiscale'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>" . htmlspecialchars($row['dataNascita'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>" . htmlspecialchars($row['dataAssunzione'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "</tr>";
                }

                $stmt->close();
            ?>
        </tbody>

    </table>
</body>
</html>