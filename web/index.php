<?php
include("config.php");
$mensaje = "";

if (isset($_POST['username']) && isset($_POST['password'])) {

    $user = $_POST['username'];
    $pass = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {

        echo "<img src='assets/logo.png' width='120'><h1>SASNO</h1>";
        echo "<h3>Sistema de Alerta Sísmica SASNO</h3><hr>";

        echo "<p><b>Usuario:</b> {$row['username']}</p>";
        echo "<p><b>Rol:</b> {$row['role']}</p>";

        $f1 = mysqli_query($conn, "SELECT flag FROM flags WHERE id=1");
        echo "<p><b>".$f1->fetch_assoc()['flag']."</b></p>";

        if ($row['role'] === 'admin') {

            $f2 = mysqli_query($conn, "SELECT flag FROM flags WHERE id=2");
            $f3 = mysqli_query($conn, "SELECT flag FROM flags WHERE id=3");

            echo "<p><b>".$f2->fetch_assoc()['flag']."</b></p>";
            echo "<p><b>".$f3->fetch_assoc()['flag']."</b></p>";

            echo "<hr><h2>Panel de Control - Emisión de Alerta</h2>";

            echo "
            <form onsubmit='emitirAlerta(); return false;'>
                Magnitud: <input type='text' id='magnitud'><br><br>
                Epicentro: <input type='text' id='epicentro'><br><br>
                Profundidad (km): <input type='text' id='profundidad'><br><br>
                Región afectada: <input type='text' id='region'><br><br>
                <button style='background:red;color:white;padding:10px;'>
                    🚨 Emitir Alerta Sísmica
                </button>
            </form>

            <audio id='alarma' src='assets/alerta.mp3'></audio>

            <h3>Registro del servidor</h3>
            <pre id='log' style='background:black;color:lime;padding:10px;height:200px;overflow:auto;'></pre>

            <script>
            function emitirAlerta() {

                document.getElementById('alarma').play();

                let log = document.getElementById('log');
                log.innerHTML = '';

                let eventos = [
                    '[INFO] Conectando con red sísmica...',
                    '[OK] Sensores sincronizados',
                    '[INFO] Magnitud: ' + magnitud.value,
                    '[INFO] Epicentro: ' + epicentro.value,
                    '[INFO] Profundidad: ' + profundidad.value + ' km',
                    '[INFO] Región: ' + region.value,
                    '[OK] Aplicación móvil notificada',
                    '[OK] Sistema de altavoces activado',
                    '[SUCCESS] ALERTA SÍSMICA EMITIDA'
                ];

                let i = 0;
                let intervalo = setInterval(() => {
                    log.innerHTML += eventos[i] + '\\n';
                    log.scrollTop = log.scrollHeight;
                    i++;
                    if (i >= eventos.length) clearInterval(intervalo);
                }, 600);
            }
            </script>
            ";
        }
        exit;
    } else {
        $mensaje = "Credenciales incorrectas";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>SASNO</title>
</head>
<body>
    <h1>SASNO</h1>
    <h3>Sistema de Alerta Sísmica</h3>

    <form method="POST">
        Usuario:<br>
        <input name="username"><br><br>
        Contraseña:<br>
        <input type="password" name="password"><br><br>
        <input type="submit" value="Ingresar">
    </form>

    <p style="color:red;"><?php echo $mensaje; ?></p>
</body>
</html>
