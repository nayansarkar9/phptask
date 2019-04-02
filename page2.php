<!-- <!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <title></title>
</head>
<body> -->
<?php
//header("https://api.github.com/search/repositories?q=stars:%3E=10000&sort=stars&order=desc; rel='next',
 // https://api.github.com/search/repositories?q=stars:%3E=10000&sort=stars&order=desc; rel='last'");
/*header("application/json; charset=utf-8");
 $token = 'f7d84412f205f13565a4ab70d1645bc2e6038cb3';
//curl -I "https://api.github.com/search/repositories?q=stars:%3E=10000&sort=stars&order=desc&per_page=10";
$curl_url= "https://api.github.com/search/repositories?q=stars:%3E=10000&sort=stars&order=desc&page=1&per_page=10&access_token=".$token;
//$Link= "<https://api.github.com/search/repositories?q=stars:%3E=10000&sort=stars&order=desc&page=1&per_page=10>; rel='next', <https://api.github.com/search/repositories?q=stars:%3E=10000&sort=stars&order=desc&page=3&per_page=10>; rel='last'";
  $ch = curl_init($curl_url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('User-Agent:PHP'));

 $output = curl_exec($ch);
$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$header = substr($response, 0, $header_size);
$body = substr($response, $header_size);
  // And we make sure we close the curl
 curl_close($ch);

$json_output=json_decode($output,true);
 //print_r($json_output->name);


   foreach ($json_output['items'] as $repo ){
    /*ECHO "<div class='wrapper'>";
    //echo "RepoName: ". $repo['name']."   ->Stars: ". $repo['stargazers_count']. "  ->RepoUrl -> ". $repo['html_url'] ."<br>";
     echo'<a id="x" href=' . $repo['html_url'] . '>' . $repo['name'] . '</a>';
     echo "   ->Stars: ". $repo['stargazers_count']."<br>";
     echo "<button>Click to find Contributors</button>";
     echo "</div>";
    echo "<br></br>";
*/



/* $curl_url = "https://api.github.com/repos/". $repo['full_name']."/contributors?access_token=".$token;
// We make the actuall curl initialization
$ch1 = curl_init($curl_url);
if (curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1) &&  curl_setopt($ch1, CURLOPT_HTTPHEADER, array('User-Agent:PHP')))
 //echo "<script>alert('if block working')</script>"; // We execute the curl

$output = curl_exec($ch1); // And we make sure we close the curl
curl_close($ch1); // Then we decode the output and we could do whatever we want with it
$output = json_decode($output,true);// now you could just foreach the repos and show them

  foreach ($output as $repo ) {
    //echo 'Contributor  ->'. $repo['login'] ."<br>";
     echo'<a class="b" id="x1" href=' . $repo['html_url'] . '>' . $repo['login'] . '</a>';
     echo "<br></br>";
  }
}
*/
$repo = ($_GET["repo"]);

$curl_url = "https://api.github.com/repos/". $repo."/contributors?per_page=100";
$ch1 = curl_init($curl_url);
if (curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1) &&  curl_setopt($ch1, CURLOPT_HTTPHEADER, array('User-Agent:PHP')))
$output = curl_exec($ch1);
curl_close($ch1);
$output = json_decode($output,true);
foreach ($output as $key ) {
    echo 'Contributor  ->'. $key['login'] ."<br>";
     //echo'<a class="b" id="x1" href=' . $repo['html_url'] . '>' . $repo['login'] . '</a>';
     echo "<br></br>";
  }
 ?>
 <!-- <script type="text/javascript">

   $(document).ready(function(){
     $(".wrapper button").click(function(){

       $(location).attr('href', 'page2.php');
         /*var a= $(this).siblings(".b").text();
         alert(a);*/
             });
  });











 </script>
</body>
</html>


 -->
