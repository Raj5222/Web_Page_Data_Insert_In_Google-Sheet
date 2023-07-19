<?php
// Include the PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

// Create a new PHPMailer instanc

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'spcedevng@gmail.com        ';                     // SMTP username
    $mail->Password   = 'ybdnqbewxxgcnnel';                               // SMTP password
$mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
$mail->Port       = 587;                                    // TCP port to connect to 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $name = $_POST['Name'];
  if (empty($name)) {
    echo "Name is empty";
  } else {
    $Qr = "03";
$data =  $name . '#' . $Qr;
}
  }
// Set the QR code size
$size = 200;
$email = $_POST['Email'];
// Set the Google Charts API URL
$url = 'https://chart.googleapis.com/chart?cht=qr&chs=' . $size . 'x' . $size . '&chl=' . urlencode($data);
// Recipients
    $mail->setFrom('no-replay@gmail.com', 'SPCE Dev');
    $mail->addAddress($email);     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Test Email';
    $mail->Body    = '<p>This Is A Test Email.</p>
                      <p> Hi '. $name .'</p> 
                      <img src="' . $url . '" alt="QR Code">';

    $mail->send();
    echo 'Message has been sent<script>console.log("E-Mail Sended.");</script>';
    echo '<img src="' . $url . '" alt="QR Code">';
    echo '<button onclick="window.location.href=' . $url . ';">Download</button>';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {


      // collect value of input field
      $Qr = "03";
      date_default_timezone_set('Asia/Kolkata');
      $date = date("j F Y");
      $time = date('h:i:s,A');
 function visitorIP() {  
//Check if visitor is from shared network 
  if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
            $vIP = $_SERVER['HTTP_CLIENT_IP'];  
    }  
//Check if visitor is using a proxy 
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){  
            $vIP = $_SERVER['HTTP_X_FORWARDED_FOR'];  
  }  
//check for the remote address of visitor.  
else{  
          $vIP = $_SERVER['REMOTE_ADDR'];  
  }  
  return $vIP;  
}  
      $port = visitorIP() .':'. $_SERVER['REMOTE_PORT'];
      $name1 = $_POST['Name'];
      $name_removed = str_replace(' ', '_', $name1);
      $data =  $name_removed . '#' . $Qr;
      $email = $_POST['Email'];
      $phone = $_POST['Phone'];
      $url = '%3Dimage%28%22https://chart.googleapis.com/chart?cht=qr%26chs=' . $size . 'x' . $size . '%26chl=' . urlencode($data).'%22%29';
    ?>
    <script>
            const scriptURL = 'https://script.google.com/macros/s/AKfycbwRfEuQ2LT1oIzHqFAJ5C9vc8OffPftKZ4ZAVYBJCGpqTqi2symJqElzP_2kF6eVnuAWg/exec'

            window.onload = ( 'submit', e => {
              e.preventDefault()
              fetch(scriptURL, { method: 'POST',body: "Email=<?php echo $email?>&Date=<?php echo $date?>&Time=<?php echo $time?>&Name=<?php echo $name?>&Phone=<?php echo $phone?>&QR-Code=<?php echo  $url?>&IP=<?php echo $port?>",
    headers: {
        "Content-Type": "application/x-www-form-urlencoded",
    },})
                .then(response => alert("Registration Successful"), console.log("Data Inserted."))
                .catch(error => console.error('Error!', error.message))
           })
</script>
<?php
    }
} catch (Exception $e) {
    echo "Message could not be sent. Error: {$mail->ErrorInfo}";
}
?>