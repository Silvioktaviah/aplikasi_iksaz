<?php
function http_request($url){
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
     'Accept: application/json',
    'x-token : eyJhcHBOYW1lIjoic2tyaXBzaSB1bnlpbCIsInNjb3BlIjpbInVzZXItbWFjaGluZSIsIndpbGF5YWgtZGFsYmFyIl19.SSaI6PBmZyf9gDEiPJMCYBjmR6+N0i4flEHtDgnP,
    ));
    $output = curl_exec($ch); 
    curl_close($ch);      
    return $output;
}

$profile = http_request("https://api-pedatren.nuruljadid.dev/santri");
$profile = json_decode($profile, TRUE);
?>


<html>
  <head>
    <title>TEST API</title>
     </head>
  <body>
    <h1>TEST API MENGAMBIL DATA SANTRI PADA API PP NURUL JADID</h1>
    <table width='100%' border='1'>
      <tr>
        <th>NO</th>
         <th>NAMA SANTRI</th>
         <th>KAMAR</th>
      </tr>
      <?php 
	        foreach ($profile as $key => $value) {
       ?>
      <tr>
        <td>1</td>
        <td><?php echo $value->message ?></td>
        <td>KAMAR SI A</td>        
      </tr>
      <?php } ?>
    </table>
  </body>
</html>
