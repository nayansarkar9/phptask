<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <title></title>
</head>
<style type="text/css">
  .p1{
    display: none;
  }
</style>
<body>
<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : 0;

$per_page=10;
header("application/json; charset=utf-8");

//curl -I "https://api.github.com/search/repositories?q=stars:%3E=10000&sort=stars&order=desc&per_page=10";
$curl_url="https://api.github.com/search/repositories?q=stars:%3E=10000&sort=stars&order=desc&page=".($page+1)."&per_page=".$per_page."&rel=next";

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
$count= $json_output['total_count'];
 //print_r($json_output->name);


/*   foreach ($json_output['items'] as $repo ){
    ECHO "<div class='wrapper'>";
    //echo "RepoName: ". $repo['name']."   ->Stars: ". $repo['stargazers_count']. "  ->RepoUrl -> ". $repo['html_url'] ."<br>";
     echo'<a id="x" href=' . $repo['html_url'] . '>' . $repo['name'] . '</a>';
     echo '<span class="p1">'.$repo['full_name']."</span>";
     echo "   ->Stars: ". $repo['stargazers_count']."<br>";
     echo "<button>Click to find Contributors</button>";
     echo "</div>";
    echo "<br></br>";

  }*/
  foreach(array_chunk($json_output,10,true) as $pages){

/*echo $pages;*/
foreach($pages as $repo1)
{


      foreach($repo1 as $repo)
       {

        ECHO "<div class='wrapper'>";

        echo'<a id="x" href=' . $repo['html_url'] . '>' . $repo['name'] . '</a>';
        echo '<span class="p1">'.$repo['full_name']."</span>";
        echo "   ->Stars: ". $repo['stargazers_count']."<br>";
        echo "<button>Click to find Contributors</button>";
        echo "</div>";


        echo "<br></br>";






                   }




}

}
//echo implode('<br />', $pages[$page]).'<hr>';
$total_pages = ceil((1000 / $per_page));
$x = round($total_pages);

echo "<br>";

//echo $total_pages;
$prevpage = $page - 1;
$nextpage = $page + 1;
if ($page > 0)
{
  if($page < $total_pages)
  {
      $page_div = ' | ';
  }
  else
  {
      $page_div = '';
  }   echo "<a href=\"?page={$prevpage}\">Previous</a>{$page_div}";
}if ($nextpage < $total_pages)
{
echo "<a href=\"?page={$nextpage}\">Next</a>";
}



 ?>

 <script type="text/javascript">

   $(document).ready(function(){
     $(".wrapper button").click(function(){

       //$(location).attr('href', 'page2.php');
         var a= [$(this).siblings(".p1").text()];


             $.ajax

    ({

      type: 'get',

      url: 'page2.php',


      data:

      {

        repo:a,



      },

      success: function (response)

      {




        window.open("page2.php?repo="+a);



      }


    });

             });
  });











 </script>
</body>
</html>


