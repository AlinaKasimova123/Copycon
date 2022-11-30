<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';
require_once __DIR__.DIRECTORY_SEPARATOR."../../DBConnClass.php";
require_once("../email_data.php");
try {
    $max_work_time_in_second = 60;
    $start_time = time();
        $stmt = DBConnClass::run()->query("SELECT id, theme, name, email, number, reason, message, vacancy FROM messages WHERE sent = 0 AND theme = 'Вакансия'");
        require '../phpmailer/src/Exception.php';
        require '../phpmailer/src/PHPMailer.php';
        require '../phpmailer/src/SMTP.php';
        while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {

            $mail = new PHPMailer(true);
            try {
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host = 'smtp.yandex.ru';                     //Set the SMTP server to send through
                $mail->SMTPAuth = true;                                   //Enable SMTP authentication
                $mail->Username = MAILSENDER;                     //SMTP username
                $mail->Password = MAILPASSWORD;                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                $mail->setFrom(MAILUSERNAME, MAILFROM);
                $mail->addAddress(MAILUSERNAME, 'User');     //Add a recipient
                $mail->addReplyTo(MAILUSERNAME, 'Information');
                $mail->isHTML(true);                                  //Set email format to HTML
                if($row['vacancy'] != "") {
                    $mail->Subject = 'Вакансия';
                    $body = '<h1>Новое письмо(вакансия)</h1>
                             <p><strong>Имя: </strong>' . $row['name'] . '</p>'
                            . '<p><strong>Email: </strong>' . $row['email'] . '</p>'
                            . '<p><strong>Номер телефона: </strong>' . $row['number'] . '</p>'
                            . '<p><strong>Вакансия: </strong>' . $row['vacancy'] . '</p>';

                    $mail->Body = $body;
                    $mail->send();
                    $mail->ClearAllRecipients();
                    $new_id = $row['id'];
                    $logs = "Отправлено: " . date('Y.m.d H:i:s');
                    $stmt = DBConnClass::run()->prepare("UPDATE messages SET logs=:logs WHERE id = :id");
                    $stmt->bindParam(":id", $new_id);
                    $stmt->bindParam(":logs", $logs);
                    $stmt->execute();
                    $stmt = DBConnClass::run()->prepare("UPDATE messages SET sent = 1 WHERE id = :id");
                    $stmt->bindParam(":id", $new_id);
                    $query = $stmt->execute();
                } else {
                    $mail->Subject = 'Новая заявка';
                    $body = '<h1>Новая заявка</h1>
                             <p><strong>Имя: </strong>' . $row['name'] . '</p>'
                        . '<p><strong>Email: </strong>' . $row['email'] . '</p>'
                        . '<p><strong>Номер телефона: </strong>' . $row['number'] . '</p>'
                        . '<p><strong>Причина обращения: </strong>' . $row['reason'] . '</p>'
                        . '<p><strong>Сообщение: </strong>' . $row['message'] . '</p>';

                    $mail->Body = $body;
                    $mail->send();
                    $mail->ClearAllRecipients();
                    $new_id = $row['id'];
                    $logs = "Отправлено: " . date('Y.m.d H:i:s');
                    $stmt = DBConnClass::run()->prepare("UPDATE messages SET logs=:logs WHERE id = :id");
                    $stmt->bindParam(":id", $new_id);
                    $stmt->bindParam(":logs", $logs);
                    $stmt->execute();
                    $stmt = DBConnClass::run()->prepare("UPDATE messages SET sent = 1 WHERE id = :id");
                    $stmt->bindParam(":id", $new_id);
                    $query = $stmt->execute();
                }
            } catch (Exception $e) {
                $logs = "Не отправлено: " . date('Y.m.d H:i:s');
                $stmt = DBConnClass::run()->prepare("INSERT INTO messages (logs) VALUES (:logs)");
                $stmt->bindParam(":logs", $logs);
                $stmt->execute();
            }
            if ((time() - $max_work_time_in_second) > $start_time) {
                break;
            }
        }
} catch(PDOException $e) {
    $error = "Сообщение не было отправлено на почту.Ошибка: " . $e;
    $stmt = DBConnClass::run()->prepare("UPDATE messages SET error=:error WHERE id = :id");
    $stmt->bindParam(":id", $new_id);
    $stmt->bindParam(":error", $error);
    $stmt->execute();
    $logs = "Не отправлено: " . date('Y.m.d H:i:s');
    $stmt = DBConnClass::run()->prepare("INSERT INTO messages (logs) VALUES (:logs)");
    $stmt->bindParam(":logs", $logs);
    $stmt->execute();
    header('Location: ../index.php');
}


